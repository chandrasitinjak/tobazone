<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryAkomodasi;

class CategoryAkomodasiController extends Controller
{
    public function index(){
        	$categoryAkomodasis = CategoryAkomodasi::orderBy('created_at')->paginate(10);
        	return view('CBT.CategoryAkomodasi.index', compact('categoryAkomodasis'));
        }

        public function store(Request $request){
        	$categoryAkomodasi = new CategoryAkomodasi;
        	$categoryAkomodasi->nama = $request->nama;
        	$categoryAkomodasi->deskripsi = $request->deskripsi;
        	if($categoryAkomodasi->save()){
        		//Alert::success('Success', $request->nama. ' berhasil ditambahkan');

                return redirect()->back()->with(['success' => 'Category Akomodasi : ' . $categoryAkomodasi->nama . ' Ditambahkan']);
        	}
        }

        public function edit($id){
            $category = CategoryAkomodasi::findOrFail($id);
            return view('CBT.CategoryAkomodasi.edit',compact('category'));
        }

        public function update(Request $request, $id){
            try {
                //select data berdasarkan id
                $categories = CategoryAkomodasi::findOrFail($id);
                //update data
                $categories->nama = $request->nama;
                $categories->deskripsi = $request->deskripsi;
                $categories->save();

                //redirect ke route kategori.index
                //Alert::success('Success', $request->nama. ' berhasil diedit');
                return redirect(route('CategoryAkomodasi.index'))->with(['success' => 'Kategori: ' . $categories->nama . ' Diedit']);
            } catch (\Exception $e) {
                //jika gagal, redirect ke form yang sama lalu membuat flash message error
                return redirect()->back();
            }
        }

        public function destroy($id){
            $categories = CategoryAkomodasi::findOrFail($id);
            $categories->delete();
            //Alert::success('Success', 'Category Akomodasi berhasil dihapus');
            return redirect()->back()->with(['success' => 'Kategori: ' . $categories->nama . ' Telah Dihapus']);
        }
}
