<?php

namespace App\Http\Controllers;

use App\PaketWisata;
use App\Pemesanan;
use App\Rekening;
use App\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PemesananController extends Controller
{

    public function updateRekening(Request $request, $id_rekening){
        $rekening = Rekening::find($id_rekening);
        $rekening->nama_bank = $request->nama_bank;
        if ($request->hasFile('gambar')) {
            !empty($photo) ? File::delete(public_path('storage/img/rekening/' . $rekening->gambar)) : null;
            $file = $request->file('gambar');
            $photo = time() .'_'. Str::slug($request->nama_bank) . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/rekening', $photo);
            $rekening->gambar = $photo;
        }
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();
        return redirect(route('admin.pemesanan'))->with('status','Rekening Berhasil Diubah');
    }
    public function destroyRekening($id_rekening){
        $rekening = Rekening::find($id_rekening);
        $rekening->delete();
        return redirect(route('admin.pemesanan'))->with('status','Rekening Berhasil Dihapus');
    }
    public function editRekening($id_rekening){
        $rekening = Rekening::find($id_rekening);

        return view('admin.pemesanan.edit_rekening',compact('rekening'));
    }

    public function tambahRekening(Request $request){
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $request->nama_bank . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/rekening', $filename);
            Rekening::create([
                'nama_bank' => $request->nama_bank,
                'nomor_rekening' => $request->nomor_rekening,
                'gambar'=> $filename
            ]);
        }
        return redirect(route('admin.pemesanan'))->with('status','Rekening Berhasil Ditambahkan');
    }
    public function ubahPesan(Request $request,$id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->pesan = $request->pesan;
        $pemesanan->save();

        return redirect(route('admin.pemesanan.show',$id_pemesanan));
    }

    public function index()
    {
        $pemesanan = Pemesanan::paginate(10);
        $paket = PaketWisata::all();
        $rekening = Rekening::all();
        return view('admin.pemesanan.index', compact('rekening','paket', 'pemesanan'));
    }

    public function show($id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $paket = $pemesanan->getSesi->getPaket;
        $user = $pemesanan->getUser;


        // var_dump($user);
        $total = 0;
        foreach ($pemesanan->getTransaksi as $row){
            $total = $total+$row->jumlah;
        }
        // echo $total;

        return view('admin.pemesanan.detail',compact('paket','total','pemesanan','user'));
    }

    public function konfirmasiPembayaran(Request $request, $id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->status = 3;
        $pemesanan->save();

        return redirect(route('admin.pemesanan.show',$id_pemesanan));
    }

    protected function refreshPaket($id_paket, $status)
    {
        $paket = PaketWisata::find($id_paket);
        if ($status == 1) {
            foreach ($paket->getSesi as $row) {
                if ($row->status == 1) {
                    return;
                }
            }
            $paket->status = 0;
        }elseif($status == 0){
            foreach ($paket->getSesi as $row) {
                if ($row->status == 1) {
                    $paket->status = 1;
                }
            }
        }
        $paket->save();
    }

    public function tolakPembayaran(Request $request, $id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->status = 0;
        $pemesanan->save();

        $sesi = Sesi::find($pemesanan->getSesi->id_sesi);
        $sesi->kuota_peserta += $pemesanan->jumlah_peserta;
        if($sesi->status==0)
            $sesi->status=1;
        $sesi->save();
        $this->refreshPaket($sesi->paket_id,0);

        return redirect(route('admin.pemesanan.show',$id_pemesanan));
    }

    public function uploadUlangPembayaran(Request $request, $id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->status = 6;
        $pemesanan->save();

        return redirect(route('admin.pemesanan.show',$id_pemesanan));
    }

    public function indexFilter(Request $request)
    {
        $id_paket = $request->paket;
        $status = $request->status;
        if (($id_paket == null)||($id_paket == 'semua')){
            if($status == null||$status == 'semua'){
                $pemesanan = Pemesanan::paginate(10);
            }else{
                $pemesanan = Pemesanan::where('status',$status)->paginate(10);
            }
        }else{
            if(($status==null)||($status == 'semua')){
                $pemesanan = Pemesanan::with(['getSesi'=>function($query) use ($id_paket){
                    $query->where('paket_id',$id_paket);
                }])->paginate(10);
            }else{
                $pemesanan = Pemesanan::with(['getSesi'=>function($query) use ($id_paket){
                    $query->where('paket_id',$id_paket);
                }])->where('pemesanan.status',$status)->paginate(10);
            }
        }
//            echo $id_paket . " " . $status;
        $paket = PaketWisata::all();
        $rekening = Rekening::all();

        return view('admin.pemesanan.index',compact('rekening','pemesanan','paket','id_paket','status'));
    }
}
