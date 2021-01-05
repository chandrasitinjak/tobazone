<?php

namespace App\Http\Controllers;

use App\Mail\DitolakEmail;
use App\Mail\TerkonfirmasiEmail;
use Illuminate\Http\Request;
use App\Komunitas;
use App\Member;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = [];
        $member = $this->defineMember(null, "verifiedByAdmin");
        $req = $this->defineMember(null, "-");
        $komunitas = Komunitas::all();
        $status = "verifiedByAdmin";
        $status_req = "-";
        return view('admin.member-cbt.index',  compact('req', 'status_req', 'member', 'komunitas', 'status'));
    }

    public function defineMember($id_komut, $status)
    {
        $member = [];
        $members = Member::all();
        if ($id_komut === null || $id_komut == 'semua') {
            if (($status === null || $status === 'semua')) {
                foreach ($members as $row) {
                    if (($row->getUser->status == "verifiedByAdmin") || ($row->getUser->status == "deactiveByAdmin"))
                        array_push($member, $row);
                }
            } else {
                foreach ($members as $row) {
                    if ($row->getUser->status == $status) {
                        array_push($member, $row);
                    }
                }
            }
        } else {
            if ($status === null || $status === 'semua') {
                foreach ($members as $row) {
                    $s = 0;
                    foreach ($row->getKomunitasMember as $rows) {
                        if ($rows->id == $id_komut) {
                            $s = 1;
                        }
                    }
                    if ($s == 1) {
                        if (($row->getUser->status == "verifiedByAdmin") || ($row->getUser->status == "deactiveByAdmin"))
                            array_push($member, $row);
                    }
                }
            } else {
                foreach ($members as $row) {
                    if ($row->getUser->status == $status) {
                        $s = 0;
                        foreach ($row->getKomunitasMember as $rows) {
                            if ($rows->id == $id_komut) {
                                $s = 1;
                            }
                        }
                        if ($s == 1) {
                            array_push($member, $row);
                        }
                    }
                }
            }
        }

        return $member;
    }

    public function nonAktif($id_member)
    {
        $member = Member::find($id_member);
        $member->getUser->status = "deactiveByAdmin";
        $member->getUser->save();

        return redirect(route('member'));
    }

    public function aktifkanStatus($id_member)
    {
        $member = Member::find($id_member);
        $member->getUser->status = "verifiedByAdmin";
        $member->getUser->save();

        return redirect(route('member'));
    }

    public function indexFilterM(Request $request)
    {
        $id_komut = $request->komunitas;
        $status = $request->status;
        $member = $this->defineMember($id_komut, $status);
        $req = $this->defineMember(null, "-");

        $komunitas = Komunitas::all();
        $status_req = 0;

        return view('admin.member-cbt.index', compact('req', 'status_req', 'member', 'komunitas', 'id_komut', 'status'));
    }
    public function tolak($id_member)
    {
        $member = User::find($id_member);
        $member->email_verified_at = now();
        $member->status = 4;
        $member->token = NULL;
        $member->save();

        Mail::to($member->email)->send(new DitolakEmail());

        return redirect(route('member.request'));
    }
    public function terima($id_member)
    {
        $users = User::find($id_member);
        $users->email_verified_at = now();
        $users->status = 'verifiedByAdmin';
        $users->token = NULL;
        $users->save();
        $users = User::find($users->id);

        Mail::to($users['email'])->send(new TerkonfirmasiEmail());

        return redirect(route('member.request'));
    }

    public function hapus($id_member)
    {
        $member = Member::find($id_member);
        $id_user = $member->user_id;
        $member->delete();
        $user = User::find($id_user)->delete();

        return redirect(route('member.request'));
    }

    public function indexFilterR(Request $request)
    {
        $id_komut_req = $request->komunitas_r;
        $status_req = $request->status_r;
        $member = $this->defineMemberR(null, "verifiedByAdmin");
        $req = $this->defineMemberR($id_komut_req, $status_req);

        $komunitas = Komunitas::all();
        $status = 1;
//        return $status_req;
        return view('admin.member-cbt.index', compact('req', 'status_req', 'member', 'komunitas', 'id_komut_req', 'status'));
    }

    public function defineMemberR($id_komut, $status)
    {
        $member = [];
        $members = Member::all();
        if ($id_komut === null || $id_komut == 'semua') {
            if (($status === null || $status === 'semua')) {
//                echo $status.' ';
                foreach ($members as $row) {
                    if (($row->getUser->status == "-") || ($row->getUser->status == 4))
                        array_push($member, $row);
                }
            } else {
                foreach ($members as $row) {
                    if ($row->getUser->status == $status) {
                        array_push($member, $row);
                    }
                }
            }
        } else {
            if ($status === null || $status == 'semua') {
                foreach ($members as $row) {
                    $s = 0;
                    foreach ($row->getKomunitasMember as $rows) {
                        if ($rows->id == $id_komut) {
                            $s = 1;
                        }
                    }
                    if ($s == 1) {
                        if (($row->getUser->status == "-") || ($row->getUser->status == "deactiveByAdmin"))
                            array_push($member, $row);
                    }
                }
            } else {
                foreach ($members as $row) {
                    if ($row->getUser->status == $status) {
                        $s = 0;
                        foreach ($row->getKomunitasMember as $rows) {
                            if ($rows->id == $id_komut) {
                                $s = 1;
                            }
                        }
                        if ($s == 1) {
                            array_push($member, $row);
                        }
                    }
                }
            }
        }

        return $member;
    }

    public function keluarkan($id_komunitas,$id_member)
    {
        $member = Member::find($id_member);
        $member->getKomunitasMember()->detach($id_komunitas);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listRequest()
    {
        // $users = DB::table('users')->get();
        $users = User::where('status','-')->get();
        return view('admin/cbt/request-member',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function terimaMember(Request $request,$id)
    {
        $users = User::find($id);
        $users->email_verified_at = now();
        $users->status = 'verifiedByAdmin';
        $users->token = NULL;
        $users->save();
        $users = User::find($users->id);

        Mail::to($users['email'])->send(new TerkonfirmasiEmail());

        return redirect(route('admin/cbt/request-member'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRequest($id_member)
    {
        $member = Member::where('user_id',$id_member)->first();
        return view('admin.member-cbt.detail-member', compact('member'));
    }

    public function detailMember($id_member)
    {
        $member = Member::find($id_member);

        return view('admin.member-cbt.detail-member1', compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/images/ktp-cbt/');
        $image->move($destinationPath, $imageName);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'no_WA' => $request->nomor_wa,
            'no_HP' => $request->nomor_hp,
            'email' => $request->email,
            'password' => Hash::make($request->kata_sandi),
            'email_verified_at'=>Carbon::now(),
            'status' => "verifiedByAdmin",
            'username'=> $request->email,
        ]);

        $member = Member::create([
            'user_id' => $user->id,
            'photo' => $imageName,
            'no_KTP' => $request->nomor_ktp,
        ]);

        $user->assignRole('member_cbt');

    return redirect(route('member'));
    }

    public function tolakMember($id)
    {
        $users = User::find($id);
        $users->email_verified_at = now();
        // $users->status = '-';
        $users->token = NULL;
        $users->save();
        $users = User::find($users->id);
        Mail::to($users['email'])->send(new DitolakEmail());


        // delete member
        // $users = User::find($id);
        $id = $users->id;
        $users->delete();
        $users = User::find($id)->delete();
        return redirect(route('admin/cbt/request-member'));
        //delete member close

        return redirect(route('admin/cbt/request-member'));
    }
}
