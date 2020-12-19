<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\Transportasi;
use App\Member;
use Illuminate\Support\Facades\Auth;

class TransportasiController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::all();
        $transportasis = Transportasi::paginate(5);

        return view('cbt.informasi.transportasi.index',compact('transportasis','kabupatens'));
    }

    public function store(Request $request){
        $member = Member::where('user_id', Auth::id())->get();

        $transportasi = new Transportasi;
        $transportasi->nama_transportasi = $request->nama_transportasi;
        $transportasi->jenis_transportasi = $request->jenis_transportasi;

        $transportasi->alamat = $request->alamat;
        $transportasi->kabupaten_id = $request->kabupaten_id;
        $transportasi->deskripsi = $request->deskripsi;
        $transportasi->member_id = $member[0]->id;
        $transportasi->status = "ready";
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
        $transportasi->foto = $gambar;
        if($transportasi->save()){

            $file->move(\base_path() ."/public/Kab/information/Transportasi", $gambar);
            return redirect()->back();
        }
    }

    public function edit($id){
        $transportasi = Transportasi::findOrFail($id);
        return view('cbt.informasi.transportasi.edit',compact('transportasi'));
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

            if($request->inpFile != NULL){
                $file = $request->file('inpFile');

                $length = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                $gambar =$randomString.".jpg";
                $transportasi->foto = $gambar;
                $file->move(\base_path() ."/public/Kab/information/Transportasi", $gambar);
            }

            if($transportasi->save()){
                return redirect(route('transportasi.index'))->with(['success' => 'Transportasi: ' . $transportasi->nama_transportasi . ' Diedit']);
            }


        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back();
        }
    }

    public function show($id){
        $transportasi = Transportasi::findOrFail($id);
        return view('cbt.informasi.transportasi.view',compact('transportasi'));
    }

    public function destroy($id){
        $transportasi = Transportasi::findOrFail($id);
        $transportasi->delete();
        return redirect()->back();
    }

    public function displaydetailTransportasi($id){
        $transportasi = Transportasi::findOrFail($id);
        return view('users.informasi.transportasi.detail.transportasi',compact('transportasi'));
    }

    public function displayTransportasi(){
        $transportasis = Transportasi::all();
        return view('users.informasi.transportasi.index', compact('transportasis'));
    }
}