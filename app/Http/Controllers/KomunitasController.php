<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class KomunitasController extends Controller
{
    public function index()
    {
        $data_komunitas = \App\Komunitas::all();
        $kabupaten = Kabupaten::all();
        return view('admin.komunitas.index',compact('data_komunitas','kabupaten'));
    }

    public function show($id){
        $komunitas = Komunitas::find($id);
        return view('admin.komunitas.detail',compact('komunitas'));
    }

    public function create(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() .'-'. Str::slug($request->nama_komunitas) . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/komunitas', $filename);


            Komunitas::create([
                'nama_komunitas'=>$request->nama_komunitas,
                'deskripsi'=>$request->deskripsi,
                'kabupaten_id'=>$request->kabupaten_id,
                'gambar'=>$filename,
                'link'=>$request->link,
            ]);
            return redirect('/admin/komunitas')->with('sukses', 'Data berhasil ditambah!');
        }
        return redirect('/admin/komunitas')->with('gagal', 'Data Gagal ditambah!');
    }

    public function edit($id)
    {
        $komunitas = \App\Komunitas::find($id);
        $kabupaten = Kabupaten::all();
        return view('admin/komunitas/edit', ['komunitas' => $komunitas], compact('komunitas','kabupaten'));
    }

    public function update(Request $request,$id)
    {
        $komunitas = \App\Komunitas::find($id);
        $photo = $komunitas->gambar;
        if ($request->hasFile('gambar')) {
            !empty($photo) ? File::delete(public_path('storage/img/komunitas/' . $photo)) : null;
            $file = $request->file('gambar');
            $photo = time() . Str::slug($request->nama_paket_wisata) . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/komunitas', $photo);
        }
        $komunitas->update([
            'nama_komunitas'=>$request->nama_komunitas,
            'deskripsi'=>$request->deskripsi,
            'kabupaten_id'=>$request->kabupaten_id,
            'gambar'=>$photo,
            'link'=>$request->link,
        ]);
        $kabupaten = Kabupaten::all();
        return redirect('admin/komunitas')->with('sukses', 'Data berhasil diupdate!');
    }

    public function hapus($id)
    {
        $komunitas = \App\Komunitas::find($id);
        $kabupaten = Kabupaten::all();
        $komunitas->delete($komunitas);
        return redirect('admin/komunitas')->with('sukses', 'Data berhasil dihapus!');
    }

    public function komunitas() {
        $c_komunitas = \App\Komunitas::all()->count();
        $member = \App\User::role('member_cbt')
        ->where('status','=','verifiedByAdmin')->get();                        
        $c_member = $member->count();
        $c_layanan = 0;

//      Count Layanan
        foreach ($member as $row){
            $c_layanan += \App\Member::where('user_id',$row->id)->first()->getLayanan->count();
        }
        $kabupaten = \App\Kabupaten::all();

        return view('users.komunitas.komunitas-perkabupaten', compact('kabupaten','c_komunitas','c_layanan','c_member'));
    }
}
