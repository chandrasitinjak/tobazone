<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budaya;
use App\Kabupaten;
use App\Member;
use Illuminate\Support\Facades\Auth;

class BudayaController extends Controller
{
    public function index(){
        	$budayas = Budaya::paginate(10);
        	$kabupatens = Kabupaten::all();

        	return view('cbt.informasi.budaya.index',compact('budayas','kabupatens'));
        }

        public function store(Request $request){
            $member = Member::where('user_id', Auth::id())->get();

        	$budaya = new Budaya;
        	$budaya->nama_budaya = $request->nama_budaya;
        	$budaya->kabupaten_id = $request->kabupaten_id;
        	$budaya->deskripsi = $request->deskripsi;
        	$budaya->lokasi = $request->lokasi;
        	$budaya->member_id = $member[0]->id;
            $budaya->status = "ready";

            //file
        	$file = $request->file('foto');
            $gambar = $file->getClientOriginalName();
        	$budaya->foto = $gambar;

        	if($budaya->save()){

    	    	$file->move(\base_path() ."/public/Kab/information/Budaya", $gambar);

        		//Alert::success('Success', $request->nama_budaya. ' berhasil ditambahkan');
        		return redirect()->back();
        	}

        }

        public function edit($id){
            $budaya = Budaya::findOrFail($id);
            return view('cbt.informasi.budaya.edit',compact('budaya'));
        }

        public function update(Request $request, $id){
            try {
                //select data berdasarkan id
                $budaya = Budaya::findOrFail($id);
                //update data

                $budaya->nama_budaya = $request->nama_budaya;
                $budaya->lokasi = $request->lokasi;
                $budaya->deskripsi = $request->deskripsi;
                $budaya->save();

                //redirect ke route Budaya.index
                //Alert::success('Success', $request->nama_budaya. ' berhasil diedit');

                return redirect(route('budaya.index'))->with(['success' => 'Budaya: ' . $request->nama_budaya . ' Diedit']);
            } catch (\Exception $e) {
                //jika gagal, redirect ke form yang sama lalu membuat flash message error
                return redirect()->back();
            }
        }

        public function destroy($id){
            $budaya = Budaya::findOrFail($id);
            $budaya->delete();
            //Alert::success('Success', 'Budaya berhasil dihapus');
            return redirect()->back();
        }

        public function displayBudaya($id){
            $budaya = Budaya::findOrFail($id);
            return view('wisatawan.Budaya.index',compact('budaya'));
        }
}
