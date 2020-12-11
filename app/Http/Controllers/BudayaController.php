<?php

namespace App\Http\Controllers;

use App\Budaya;
use App\Kabupaten;
use App\Member;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::paginate(10);
        $kabupatens = Kabupaten::all();

        return view('cbt.informasi.budaya.index', compact('budayas', 'kabupatens'));
    }

    public function store(Request $request)
    {
        $budaya = new Budaya;
        $member = Member::where('user_id', Auth::id())->first();
        $budaya->nama_budaya = $request->nama_budaya;
        $budaya->kabupaten_id = $request->kabupaten_id;
        $budaya->deskripsi = $request->deskripsi;
        $budaya->lokasi = $request->lokasi;
        $budaya->member_id = $member->id;
        $budaya->status = "ready";
        //file
        $file = $request->file('foto');
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $gambar = $randomString.".jpg";
        $budaya->foto = $gambar;

        if ($budaya->save()) {

            $file->move(\base_path() . "/public/Kab/information/Budaya", $gambar);

            //Alert::success('Success', $request->nama_budaya. ' berhasil ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        $kabupatens = Kabupaten::all();

        return view('cbt.informasi.budaya.edit', compact('budaya', 'kabupatens'));
    }

    public function update(Request $request, $id)
    {
        try {
            //select data berdasarkan id
            $budaya = Budaya::findOrFail($id);
            //update data

            $budaya->nama_budaya = $request->nama_budaya;
            $budaya->lokasi = $request->lokasi;
            $budaya->deskripsi = $request->deskripsi;
            $budaya->kabupaten_id = $request->kabupaten_id;
            if ($request->hasFile('foto')) {
                !empty($budaya->foto) ? File::delete(public_path('Kab/information/Budaya/' . $budaya->foto)) : null;
                $file = $request->file('foto');
                $gambar = $file->getClientOriginalName();
                $file->move(\base_path() . "/public/Kab/information/Budaya", $gambar);
            }
            $budaya->save();

            //redirect ke route Budaya.index
//            Alert::success('Success', $request->nama_budaya. ' berhasil diedit');

            return redirect(route('budaya.index'))->with(['success' => 'Budaya: ' . $request->nama_budaya . ' Diedit']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        $budaya->delete();
        //Alert::success('Success', 'Budaya berhasil dihapus');
        return redirect()->back();
    }


    public function displaydetailBudaya($id){
        $budaya = Budaya::findOrFail($id);
        return view('users.informasi.budaya.detail.budaya',compact('budaya'));
    }

    public function displayBudaya(){
        $budayas = Budaya::inRandomOrder()->get();
        return view('users.informasi.budaya.index', compact('budayas'));
    }
}
