<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findAll()
    {
        $homestays = Homestay::All();
        $data = [
            'code' => 200,
            'status' => 'OK',
            'data' => [
                $homestays
            ]
        ];
        return view('users.merchants.homestays.index')->with('homestays', $homestays);
    }

    public function findById($id){
        $detail = Homestay::find($id);
        return view('users.merchants.homestays.detail')->with('homestays', $detail);
    }

    public function store(Request $request){
        $this->validate($request, [
            'job' => 'required',
            'machine' => 'required'
        ]);
    }

    public function createDataPage(){
     return view('users.merchants.homestays.create_homestay');
    }


}
