<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Komunitas;
use App\Kabupaten;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    public function index()
    {
        $anggota = Member::all();
        $data_pendaftar = [];
        foreach ($anggota as $row){
            if(($row->getUser->register_status==1)&&($row->getKomunitasMember->count()>0)){
                array_push($data_pendaftar,$row);
            }
        }
        $komunitas = Komunitas::all();
        $kabupaten = Kabupaten::all();
        return view('cbt.komunitas.anggota_komunitas',compact('data_pendaftar','komunitas', 'kabupaten'));
    }
    public function daftar(Request $request)
    {
        $member = Member::where('user_id',Auth::id())->first();
        $member->getKomunitasMember()->attach($request->komunitas_id);
        return redirect('/anggotacbt/komunitas/pendaftar')->with('sukses', 'Data berhasil didaftar!');
    }
}
