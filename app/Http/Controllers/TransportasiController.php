<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\Transportasi;

class TransportasiController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::all();
        $transportasis = Transportasi::paginate(5);

        return view('CBT.Transportasi.index',compact('transportasis','kabupatens'));
    }

    public function store(Request $request){
        $transportasi = new Transportasi;
        $transportasi->nama_transportasi = $request->nama_transportasi;
        $transportasi->jenis_transportasi = $request->jenis_transportasi;
        $transportasi->alamat = $request->alamat;
        $transportasi->kabupaten_id = $request->kabupaten_id;
        $transportasi->deskripsi = $request->deskripsi;
        $transportasi->cbt_id = session('cbt_id');
        //foto
        $file = $request->file('foto');
        $gambar = $file->getClientOriginalName();
        $transportasi->foto = $gambar;
        if($transportasi->save()){

            $file->move(\base_path() ."/public/Kab/information/Transportasi", $gambar);
            Alert::success('Success', $request->nama_transportasi. ' berhasil ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id){
        $transportasi = Transportasi::findOrFail($id);
        return view('CBT.Transportasi.edit',compact('transportasi'));
    }

    public function update(Request $request,$id){

        try {
            //select data berdasarkan id
            $transportasi = Transportasi::findOrFail($id);
            //update data

            $transportasi->nama_transportasi = $request->nama_transportasi;
            $transportasi->alamat = $request->alamat;
            $transportasi->jenis_transportasi = $request->jenis_transportasi;
            $transportasi->deskripsi = $request->deskripsi;

            $transportasi->save();

            //redirect ke route kategori.index
            Alert::success('Success', $request->nama_transportasi. ' berhasil diedit');

            return redirect(route('Transportasi.index'))->with(['success' => 'Objek Wisata: ' . $transportasi->nama_objek_wisata . ' Diedit']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back();
        }
    }

    public function destroy($id){
        $transportasi = Transportasi::findOrFail($id);
        $transportasi->delete();
        Alert::success('Success', 'Objek Wisata berhasil dihapus');
        return redirect()->back();
    }

    public function displayDetailTransportasi($id){
        $transportasi = Transportasi::findOrFail($id);
        $randtransportasi = Transportasi::inRandomOrder()->limit(3)->get();
        return view('users.informasi.transportasi.detail.transportasi',compact('transportasi','randtransportasi'));
    }

    public function displayTransportasi(){
        $transportasis = Transportasi::all();
        return view('users.informasi.transportasi.index',compact('transportasis'));
    }
}
