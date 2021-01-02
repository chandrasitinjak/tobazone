<?php
/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */

namespace App\Http\Controllers;

use App\Homestay;
use App\HomestayCarousel;
use App\HomestayRoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HomestayOrders;

class HomestayRoomsCategoriesController extends Controller
{

    public function findAllCategories(){
        $result = HomestayRoomCategory::all();
        return view('admin.homestay.all_room_categories')->with('result', $result);
    }

    public function deleteKategori($id) {
        $kategori = HomestayRoomCategory::find($id);
        $kategori->delete();
        return redirect('/admin/homestay/room-categories');
    }
    public function createCategories(Request $request) {
        $kategori = new HomestayRoomCategory();
        $kategori->category_name = $request->nama_kategori;
        $kategori->category_deskripsi = $request->deskripsi;
        $kategori->status=1;
        $kategori->save();
        return redirect('/admin/homestay/room-categories');
    }

    public function editKategori(Request $request, $id)
    {
        $kategori = HomestayRoomCategory::find($id);
        $kategori->category_name = $request->nama_kategori;
        $kategori->category_deskripsi = $request->deskripsi;
        $kategori->save();
        return redirect('/admin/homestay/room-categories');
    }
    public function findAll(){
        $result = HomestayRoomCategory::all();
        return $result;
    }

}

