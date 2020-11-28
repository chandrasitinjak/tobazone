<?php

namespace App\Http\Controllers;

use App\Comment;
use App\IncludedNotIncluded;
use App\PaketWisata;
use App\Pemesanan;
use App\Sesi;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PaketWisataCustomerController extends Controller
{
    public function show($id_paket)
    {

        $paket = PaketWisata::find($id_paket);
        $sesi = Sesi::where([['paket_id', $id_paket], ['status', 1]])->get();
        $hotel = [];
        $comments = Comment::where('paket_id',$id_paket)->get();
        $inis = IncludedNotIncluded::where('paket_wisata_id', $id_paket)->get();

        $includeds = [];
        $not_includeds =[];

        foreach ($inis as $ini)
        {
            if($ini->jenis_ini == "included"){
                array_push($includeds, $ini);
            }
            else
            {
                array_push($not_includeds, $ini);
            }
        }


        foreach ($paket->getPaketLayanan as $row) {
            if ($row->getJenisLayanan->nama_jenis_layanan == 'Akomodasi')
                array_push($hotel, $row);
        }

        $counts = 0;
        $paket_lain = PaketWisata::where([['status', 1],['kabupaten_id',4],['id_paket','!=',$id_paket]])->orderBy('created_at', 'DESC')->first();
//        dd($paket_lain);
        return view('paket-wisata.detail_paket', compact('counts','paket_lain','comments','paket', 'hotel', 'sesi', 'includeds', 'not_includeds'));

    }
    public function bookingPaket(Request $request, $id_paket){
        $result = DB::table('sesi')
            ->where('paket_id',$id_paket)
            ->pluck('id_sesi')
            ->first();
        $paketWisata = new Pemesanan();
        $paketWisata->jumlah_peserta = $request->jumlah_orang;
        $paketWisata->user_id = Auth::user()->id;
        $paketWisata->status = 1;
        $paketWisata->pesan = $request->pesan;
        $paketWisata->sesi_id = $result;
        $paketWisata->save();
        return redirect()->back();

    }
}
