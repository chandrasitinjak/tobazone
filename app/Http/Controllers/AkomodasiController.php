<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\Akomodasi;
use App\CategoryAkomodasi;
use App\Member;
use Illuminate\Support\Facades\Auth;

class AkomodasiController extends Controller
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
        $gambar = $file->getClientOriginalName();
        $gambar = "asd1.jpg";
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

    public function destroy($id){
        $objekWisata = ObjekWisata::findOrFail($id);
        $objekWisata->delete();
        //Alert::success('Success', 'Objek Wisata berhasil dihapus');
        return redirect()->back();
    }

    public function displayDetailAkomodasi($id){
        $akomodasi = Akomodasi::findOrFail($id);
        return view('users.informasi.akomodasi.detail.akomodasi',compact('akomodasi'));
    }

    public function displayAkomodasi(){
        $akomodasis = Akomodasi::inRandomOrder()->get();
        return view('users.informasi.akomodasi.index', compact('akomodasis'));
    }
}
