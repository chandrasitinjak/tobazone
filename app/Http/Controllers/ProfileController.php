<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function getProfile($id) {
        return response(Profile::where('user_id', $id)->first());
    }

    public function myProfile($id) {
        $profile = Profile::all()->where('user_id', $id)->first();        
        
        $data = json_decode($profile->address);

        $data_real = json_decode($data[0]);

        // echo "hello world";
        return view('users.profiles.index')->with('profiles', $profile)->with('data', $data_real);
    }

    public function merchantProfile($id) {
        $profile = Profile::all()->where('user_id', $id)->first();        
        
        $data = json_decode($profile->address);

        $data_real = json_decode($data[0]);

        // echo "hello world";
        return view('users.merchants.profiles.index')->with('profiles', $profile)->with('data', $data_real);
    }

    public function merchantEditProfile($id) {
        $profile = Profile::all()->where('user_id', $id)->first();        
        
        $data = json_decode($profile->address);

        $data_real = json_decode($data[0]);

        // echo "hello world";
        return view('users.merchants.profiles.edit')->with('profiles', $profile)->with('data', $data_real);
    }

    public function editProfile($id) {
        $profile = Profile::all()->where('user_id', $id)->first();        
        
        $data = json_decode($profile->address);

        $data_real = json_decode($data[0]);

        // echo "hello world";
        return view('users.profiles.edit')->with('profiles', $profile)->with('data', $data_real);
    }

    public function getMerchantProfile($id) {

        $data = Profile::all()->where('user_id', $id)->first();
        // var_dump($data);        
        return view('users.merchants.profiles.index');
    }
    
    public function storeUpdate(Request $request, $id) {


        $profile = Profile::all()->where('user_id', $id)->first();
        
        $image = $request->file('profile_picture');
        if($image == NULL) {            
            $profile->name = $request->profile_name;
            $profile->phone = $request->profile_phone;
        } else {                            
            $imageName = time(). $image->getClientOriginalName();
            $destinationPath = public_path('/images/user_profiles');
            $image->move($destinationPath, $imageName);

            $profile->name = $request->profile_name;
            $profile->phone = $request->profile_phone;
            $profile->photo = $imageName;
        }
        
        $profile->update();

        return redirect('/customer/'.$id.'/myProfil');
    }

    public function storeUpdateMerchant(Request $request, $id) {


        $profile = Profile::all()->where('user_id', $id)->first();
        
        $image = $request->file('profile_picture');
        if($image == NULL) {            
            $profile->name = $request->profile_name;
            $profile->phone = $request->profile_phone;
        } else {                            
            $imageName = time(). $image->getClientOriginalName();
            $destinationPath = public_path('/images/user_profiles');
            $image->move($destinationPath, $imageName);

            $profile->name = $request->profile_name;
            $profile->phone = $request->profile_phone;
            $profile->photo = $imageName;
        }
        
        $profile->update();

        return redirect('/merchant/'.$id.'/myProfile');
    }



    public function updateAddress(Request $request, $id) {
        $profile = Profile::where('user_id', $id)->first();

        $address = json_decode($profile->address);
   
        array_push($address, json_encode([
            'name' => $request->addressName,
            'province_id' => $request->provinceId,
            'city_id' => $request->cityId,
            'subdistrict_id' => $request->subdistrictId,
            'province_name' => $request->provinceName,
            'city_name' => $request->cityName,
            'subdistrict_name' => $request->subdistrictName,
            'postal_code' => $request->postalCode,
            'detail' => $request->addressDetail,
        ]));

        $profile->address = json_encode($address);
        $profile->update();
    }
}
