<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\Member;
use App\Kuliner;
use Illuminate\Support\Facades\Auth;

class KulinerController extends Controller
{
    public function index(){
        $kabupatens = Kabupaten::all();
        $kuliners = Kuliner::paginate(5);

        return view('cbt.informasi.kuliner.index',compact('kabupatens','kuliners'));
    }

    public function store(Request $request){
        $member = Member::where('user_id', Auth::id())->get();

        $kuliner = new Kuliner;
        $kuliner->nama_kuliner = $request->nama_kuliner;
        $kuliner->jenis_kuliner = $request->jenis_kuliner;
        $kuliner->longitude = $request->longitude;
        $kuliner->latitude = $request->latitude;
        $kuliner->lokasi = $request->lokasi;
        $kuliner->deskripsi = $request->deskripsi;
        $kuliner->member_id = $member[0]->id;
        $kuliner->status = "ready";
        $kuliner->kabupaten_id = $request->kabupaten_id;

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
        $kuliner->foto = $gambar;
        if($kuliner->save()){

            $file->move(\base_path() ."/public/Kab/information/Kuliner", $gambar);
            //Alert::success('Success', $request->nama_kuliner. ' berhasil ditambahkan');
            return redirect()->back();
        }
    }


    public function edit($id){
        $kuliner = Kuliner::findOrFail($id);
        return view('cbt.informasi.kuliner.edit',compact('kuliner'));
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
                $kuliner->foto = $gambar;
                $file->move(\base_path() ."/public/Kab/information/Kuliner", $gambar);
            }
            if($kuliner->save()){
                return redirect(route('kuliner.index'))->with(['success' => 'Kuliner: ' . $kuliner->nama_kuliner . ' Diedit']);
            }


        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back();
        }
    }

    public function show($id){
        $kuliner = Kuliner::findOrFail($id);
        return view('cbt.informasi.kuliner.view',compact('kuliner'));
    }
    public function destroy($id){
        $kuliner = Kuliner::findOrFail($id);
        $kuliner->delete();
        //Alert::success('Success', 'Kuliner berhasil dihapus');
        return redirect()->back();
    }

    public function displayDetailKuliner($id){
        $kuliner = Kuliner::findOrFail($id);
        return view('users.informasi.kuliner.detail.kuliner',compact('kuliner'));
    }

    public function displayKuliner(){
        $kuliners = Kuliner::inRandomOrder()->get();
        return view('users.informasi.kuliner.index', compact('kuliners'));
    }
}
