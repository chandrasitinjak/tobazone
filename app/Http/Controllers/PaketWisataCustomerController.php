<?php

namespace App\Http\Controllers;

use App\Comment;
use App\IncludedNotIncluded;
use App\Mail\jadwalPaket;
use App\PaketWisata;
use App\Pemesanan;
use App\Sesi;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaketWisataCustomerController extends Controller
{
    public function show($id_paket)
    {

        $paket = PaketWisata::find($id_paket);
        $sesi = Sesi::where([['paket_id', $id_paket], ['status', 1]])->get();
        $hotel = [];
//        $comments = Comment::where('paket_id',$id_paket)->get();
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
        return view('paket-wisata.detail_paket', compact('counts','paket_lain','paket', 'hotel', 'sesi', 'includeds', 'not_includeds'));

    }
    public function bookingPaket(Request $request, $id_paket){
        $pemesanan = Pemesanan::where([['sesi_id', $request->sesi], ['user_id', Auth::id()]])->get();
        $count = Pemesanan::where([['sesi_id', $request->sesi], ['user_id', Auth::id()]])->count();
        // return $count;
        if ($count != 0) {
            foreach ($pemesanan as $row) {
                if (($row->status == 1) || ($row->status == 2) || ($row->status == 4)) {
//                    echo 's';
                    return redirect(route('pemesanan.detail', $row->id_pemesanan));
                }
            }
        }
        $sesi = Sesi::find($request->sesi);
        $countK = $sesi->kuota_peserta;
        if (($countK - $request->jumlah_peserta) >= 0) {
            $pemesanan = Pemesanan::create([
                'user_id' => Auth::id(),
                'sesi_id' => $request->sesi,
                'status' => 1,
                'pesan' => $request->pesan,
                'jumlah_peserta' => $request->jumlah_peserta
            ]);
            if (($countK - $request->jumlah_peserta) == 0) {
                $sesi->kuota_peserta -= $request->jumlah_peserta;
                $sesi->status = 0;
                $sesi->save();
                $this->refreshPaket($id_paket,1);
            } else if (($countK - $request->jumlah_peserta) > 0) {
                $sesi->kuota_peserta -= $request->jumlah_peserta;
                $sesi->save();
            }
            $paket = paketWisata::find($sesi->paket_id);
            Mail::to(Auth::user()->email)->send(new jadwalPaket($paket));
            return redirect(route('pemesanan.detail', $pemesanan->id_pemesanan));
        }

        return redirect(route('pemesanan'));
    }
}
