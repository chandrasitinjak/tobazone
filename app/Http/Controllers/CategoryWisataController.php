<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryWisata;

class CategoryWisataController extends Controller
{
    public function index()
        {
            $categories = CategoryWisata::orderBy('created_at')->paginate(10);
            return view('CBT.CategoryWisata.index', compact('categories'));
        }

        public function store(Request $request)
        {
            $categories = new CategoryWisata;
            $categories->nama_category = $request->nama_category;
            $categories->deskripsi = $request->deskripsi;
            if($categories->save()){
                //Alert::success('Success', $request->nama_category. ' berhasil ditambahkan');

                return redirect()->back()->with(['success' => 'Kategori: ' . $categories->nama_category . ' Ditambahkan']);
            }
        }

        public function destroy($id)
        {
            $categories = CategoryWisata::findOrFail($id);
            $categories->delete();
            //Alert::success('Success', 'Category berhasil dihapus');
            return redirect()->back()->with(['success' => 'Kategori: ' . $categories->nama_category . ' Telah Dihapus']);
        }

        public function edit($id)
        {
            $categories = CategoryWisata::findOrFail($id);
            return view('CBT.CategoryWisata.edit', compact('categories'));
        }

        public function update(Request $request, $id)
        {
            try {
                //select data berdasarkan id
                $categories = CategoryWisata::findOrFail($id);
                //update data
                $categories->nama_category = $request->nama_category;
                $categories->deskripsi = $request->deskripsi;
                $categories->save();

                //redirect ke route kategori.index
                //Alert::success('Success', $request->nama_category. ' berhasil diedit');
                return redirect(route('kategori.index'))->with(['success' => 'Kategori: ' . $categories->name . ' Diedit']);
            } catch (\Exception $e) {
                //jika gagal, redirect ke form yang sama lalu membuat flash message error
                return redirect()->back();
            }
        }
}
