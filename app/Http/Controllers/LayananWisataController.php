<?php

namespace App\Http\Controllers;

use App\JenisLayanan;
use App\Kabupaten;
use App\LayananWisata;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananWisataController extends Controller
{

    public function index()
    {
        $member = Member::where('user_id',Auth::id())->first();
        $data_layanan_wisata = LayananWisata::where('member_id',$member->id)->get();
        $kabupaten = Kabupaten::all();
        $jenis = JenisLayanan::all();

        return view('cbt.layanan.index',compact('data_layanan_wisata','kabupaten','jenis'));
    }
    public function create(Request $request)
    {
        $member = Member::where('user_id',Auth::id())->first();

        LayananWisata::create([
            'nama_layanan'=>$request->nama_layanan,
            'jenisLayanan_id'=>$request->jenisLayanan_id,
            'kabupaten_id'=>$request->kabupaten_id,
            'member_id'=>$member->id,
            'deskripsi_layanan'=>$request->deskripsi_layanan
        ]);
        return redirect (route('anggotacbt.layanan'))->with('sukses','data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan_wisata = LayananWisata::find($id);
        $jenis_layanan = JenisLayanan::all();
        $kabupaten = Kabupaten::all();
        return view('cbt.layanan.edit',compact('layanan_wisata','jenis_layanan','kabupaten'));
    }

    public function update(Request $request,$id)
    {
        $layanan_wisata = LayananWisata::find($id);
        $layanan_wisata -> update($request->all());
        return redirect(route('anggotacbt.layanan'))->with('sukses','Data berhasil di update');
    }

    public function delete($id)
    {
        $layanan_wisata = LayananWisata::find($id);
        $layanan_wisata->delete($layanan_wisata);
        return redirect(route('anggotacbt.layanan'))->with('sukses','Data Berhasil dihapus');

    }
}
