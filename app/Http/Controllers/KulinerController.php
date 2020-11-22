<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kuliner;
use App\Kabupaten;

class KulinerController extends Controller
{
     public function index(){
        	$kabupaten_id = session('kabupaten_id');
        	$kabupatens = Kabupaten::findOrFail($kabupaten_id);
        	$kuliners = Kuliner::where('kabupaten_id', $kabupaten_id)->paginate(5);

        	return view('CBT.Kuliner.index',compact('kabupatens','kuliners'));
        }

        public function store(Request $request){
        	$kuliner = new Kuliner;
        	$kuliner->nama_kuliner = $request->nama_kuliner;
        	$kuliner->jenis_kuliner = $request->jenis_kuliner;
        	$kuliner->longitude = $request->longitude;
        	$kuliner->latitude = $request->latitude;
        	$kuliner->lokasi = $request->lokasi;
        	$kuliner->deskripsi = $request->deskripsi;
        	$kuliner->cbt_id = session('cbt_id');
        	$kuliner->kabupaten_id = $request->kabupaten_id;

        	//foto
            $file = $request->file('foto');
            $gambar = $file->getClientOriginalName();
            $kuliner->foto = $gambar;
        	if($kuliner->save()){

                $file->move(\base_path() ."/public/Kab/information/Kuliner", $gambar);
        		//Alert::success('Success', $request->nama_kuliner. ' berhasil ditambahkan');
        		return redirect()->back();
        	}
        }


        public function edit($id){
            $kuliner = Kuliner::findOrFail($id);
            return view('CBT.Kuliner.edit',compact('kuliner'));
        }

        public function update(Request $request,$id){
            try {
                //select data berdasarkan id
                $kuliner = Kuliner::findOrFail($id);
                //update data

                $kuliner->nama_kuliner = $request->nama_kuliner;
                $kuliner->jenis_kuliner = $request->jenis_kuliner;
                $kuliner->longitude = $request->longitude;
                $kuliner->latitude = $request->latitude;
                $kuliner->lokasi = $request->lokasi;
                $kuliner->deskripsi = $request->deskripsi;

                $kuliner->save();

                //redirect ke route kategori.index
                //Alert::success('Success', $request->nama_kuliner. ' berhasil diedit');

                return redirect(route('Kuliner.index'))->with(['success' => 'Kuliner: ' . $kuliner->nama_kuliner . ' Diedit']);
            } catch (\Exception $e) {
                //jika gagal, redirect ke form yang sama lalu membuat flash message error
                return redirect()->back();
            }
        }

        public function destroy($id){
            $kuliner = Kuliner::findOrFail($id);
            $kuliner->delete();
            //Alert::success('Success', 'Kuliner berhasil dihapus');
            return redirect()->back();
        }

        public function displayKuliner($id){
            $kuliner = Kuliner::findOrFail($id);
            return view('wisatawan.Kuliner.index',compact('kuliner'));
        }
}
