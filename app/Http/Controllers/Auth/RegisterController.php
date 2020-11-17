<?php

namespace App\Http\Controllers\Auth;

use App\Mail\VerifyMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Profile;
use App\roles;
use App\VerifyUser;
use Illuminate\Auth\Events\Registered;

use App\Mail\RegisterCbt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */

    public function registerCbt(Request $request){
        
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/images/ktp-cbt');
        $image->move($destinationPath, $imageName);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'no_WA' => $request->nomor_wa,
            'no_HP' => $request->nomor_hp,
            'email' => $request->email,
            'password' => Hash::make($request->kata_sandi),
            'status' => "-",
            'username'=> $request->email,
        ]);
        
        $user->assignRole('member_cbt');

        $email_cbt = $request->email;

        Mail::to($email_cbt)->send(new RegisterCbt());        
    }

    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['role'] === 'customer' ? 'verifiedByAdmin' : "-"
        ]);

        $address = [];

        array_push($address, json_encode([
            'name' => $data['addressName'],
            'province_id' => $data['provinceId'],
            'city_id' => $data['cityId'],
            'subdistrict_id' => $data['subdistrictId'],
            'province_name' => $data['provinceName'],
            'city_name' => $data['cityName'],
            'subdistrict_name' => $data['subdistrictName'],
            'postal_code' => $data['postalCode'],
            'detail' => $data['addressDetail']
        ]));

        $user->profile()->save(Profile::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'address' => json_encode($address),
            'phone' => $data['phone'],
            'photo' => 'profile.png',
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
        ]));

        if ($data['role'] === 'merchant') {
            $user->assignRole('merchant');
        } else {
            $user->assignRole('customer');
        }

        return $user;
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        $status = "";
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
//            Auth::attempt(["email" => $user->email, "password" => $user->password]);
            if (!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/')->with('status', $status);
    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user) {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::message('You have successfully verified your account.');

        return Redirect::route('login_path');
    }
    
    
}
