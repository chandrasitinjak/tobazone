<?php

namespace App\Http\Controllers;

use App\Kuliner;
use Illuminate\Http\Request;
use App\Kabupaten;
use App\CategoryWisata;
use App\ObjekWisata;
use App\Member;
use Illuminate\Support\Facades\Auth;

class ObjekWisataController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::all();
        $categorys = CategoryWisata::all();
        $objekWisatas = ObjekWisata::paginate(5);

        return view('cbt.informasi.objekwisata.index',compact('objekWisatas','categorys','kabupatens'));
    }

    public function store(Request $request){
        $member = Member::where('user_id', Auth::id())->get();

        $objekWisata = new ObjekWisata;
        $objekWisata->nama_objek_wisata = $request->nama_objek_wisata;
        $objekWisata->lokasi = $request->lokasi;
        $objekWisata->longitude = $request->longitude;
        $objekWisata->latitude = $request->latitude;
        $objekWisata->category_id = $request->category_id;
        $objekWisata->kabupaten_id = $request->kabupaten_id;
        $objekWisata->deskripsi = $request->deskripsi;
        $objekWisata->member_id = $member[0]->id;
        $objekWisata->status = "ready";

        //foto
        $file = $request->file('foto');
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $gambar = $randomString.".jpg";
        $objekWisata->foto = $gambar;
        if($objekWisata->save()){

            $file->move(\base_path() ."/public/Kab/information/ObjekWisata", $gambar);
            //Alert::success('Success', $request->nama_objek_wisata. ' berhasil ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id){
        $objekWisata = ObjekWisata::findOrFail($id);
        $categorys = CategoryWisata::all();
        return view('cbt.informasi.objekwisata.edit',compact('objekWisata','categorys'));
    }

    public function update(Request $request,$id){
        try {
            //select data berdasarkan id
            $objekWisata = ObjekWisata::findOrFail($id);
            //update data

            $objekWisata->nama_objek_wisata = $request->nama_objek_wisata;
            $objekWisata->lokasi = $request->lokasi;
            $objekWisata->longitude = $request->longitude;
            $objekWisata->latitude = $request->latitude;
            $objekWisata->category_id = $request->category_id;
            $objekWisata->deskripsi = $request->deskripsi;

            $objekWisata->save();

            //redirect ke route kategori.index
            //Alert::success('Success', $request->nama_objek_wisata. ' berhasil diedit');

            return redirect(route('objekwisata.index'))->with(['success' => 'Objek Wisata: ' . $objekWisata->nama_objek_wisata . ' Diedit']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back();
        }
    }

    public function show($id){
        $objekWisata = ObjekWisata::findOrFail($id);
        return view('cbt.informasi.objekwisata.view',compact('objekWisata'));
    }

    public function destroy($id){
        $objekWisata = ObjekWisata::findOrFail($id);
        $objekWisata->delete();
        //Alert::success('Success', 'Objek Wisata berhasil dihapus');
        return redirect()->back();
    }


    public function displayDetailObjekWisata($id){
        $objekWisata = ObjekWisata::findOrFail($id);
        $randObjekWisatas = ObjekWisata::inRandomOrder()->limit(3)->get();
        return view('users.informasi.objekWisata.detail.objekWisata',compact('objekWisata','randObjekWisatas'));
    }

    public function displayObjekWisata(){
        $objekWisatas = ObjekWisata::inRandomOrder()->get();
        return view('users.informasi.objekWisata.index', compact('objekWisatas'));
    }
}
