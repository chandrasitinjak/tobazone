<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mail\TerkonfirmasiEmail;
use App\Mail\DitolakEmail;
use App\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo("hallo");
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
    public function detailMember($id)
    {
        //

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
