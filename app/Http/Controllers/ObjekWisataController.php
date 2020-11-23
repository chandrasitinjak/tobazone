<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\CategoryWisata;
use App\ObjekWisata;

class ObjekWisataController extends Controller
{
        public function index(){
        	//$kabupaten_id = session('kabupaten_id');
        	//$kabupaten = Kabupaten::findOrFail($kabupaten_id);
//        	$categorys = CategoryWisata::all();
//        	$objekWisatas = ObjekWisata::where('kabupaten_id', $kabupaten_id)->paginate(5);

        	return view('informasi-pariwisata.CBT.ObjekWisata.index');
        }

        public function store(Request $request){
        	$objekWisata = new ObjekWisata;
        	$objekWisata->nama_objek_wisata = $request->nama_objek_wisata;
        	$objekWisata->lokasi = $request->lokasi;
        	$objekWisata->longitude = $request->longitude;
        	$objekWisata->latitude = $request->latitude;
        	$objekWisata->category_id = $request->category_id;
        	$objekWisata->kabupaten_id = $request->kabupaten_id;
        	$objekWisata->deskripsi = $request->deskripsi;
        	$objekWisata->cbt_id = session('cbt_id');
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
        	return view('CBT.ObjekWisata.edit',compact('objekWisata','categorys'));
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

                return redirect(route('ObjekWisata.index'))->with(['success' => 'Objek Wisata: ' . $objekWisata->nama_objek_wisata . ' Diedit']);
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


        public function displayObjekWisata($id){
            $objekWisata = ObjekWisata::findOrFail($id);
            $randObjekWisatas = ObjekWisata::inRandomOrder()->limit(3)->get();
            return view('wisatawan.ObjekWisata.index',compact('objekWisata','randObjekWisatas'));
        }
}
