<?php

namespace App\Http\Controllers;

use App\PaketWisata;
use App\Pemesanan;
use App\Rekening;
use App\Sesi;
use App\Transaksi;
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

    public function indexC(){
        $pemesanan = Pemesanan::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);
        return view('pemesanan.index', compact('pemesanan'));
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

    public function show_c($id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $status = $pemesanan->defineStatus($pemesanan->status);
        $rekening = Rekening::all();

        if ($pemesanan->user_id == Auth::id()) {
            return view('pemesanan.detail', compact('rekening', 'pemesanan', 'status'));
        } else {
            return redirect(route('pemesanan'));
        }
    }

    public function cancel($id_pemesanan)
    {
        $pemesanan = Pemesanan::find($id_pemesanan);
        if ($pemesanan->count() != 0) {
            $sesi = Sesi::find($pemesanan->sesi_id);
            $sesi->kuota_peserta += $pemesanan->jumlah_peserta;
            if($sesi->status==0)
                $sesi->status=1;
            $sesi->save();
            $pemesanan->status = 0;
            $pemesanan->save();

            $this->refreshPaket($pemesanan->getSesi->paket_id,0);
        }
        return redirect(route('pemesanan'));
    }

    public function konfirmasiPembayaran(Request $request, $id_pemesanan){
        $pemesanan = Pemesanan::find($id_pemesanan);
        $pemesanan->status = 3;
        $pemesanan->save();

        return redirect(route('admin.pemesanan.show',$id_pemesanan));
    }

    public function getDataPemesanan($id_pemesanan)
    {
        $data = Pemesanan::find($id_pemesanan);
        return $data;
    }

    public function updateStatus($id_pemesanan)
    {
        $data = Pemesanan::find($id_pemesanan);
        $data->status = 5;
        $data->save();
        $sesi = Sesi::find($data->sesi_id);
        $sesi->kuota_peserta += $data->jumlah_peserta;
        if ($sesi->status == 0) {
            $sesi->status = 1;
        }
        $sesi->save();

        $this->refreshPaket($sesi->paket_id,0);
    }

    public function kirimTransaksi(Request $request, $id_pemesanan)
    {
//        return $id_pemesanan;
        $id = $id_pemesanan;
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . Auth::id() . '_' . $id_pemesanan . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/pembayaran', $filename);

            $pemesanan = Pemesanan::find($id_pemesanan);
            $pemesanan->status = 2;
            $pemesanan->save();

            $transaksi = Transaksi::create([
                'pemesanan_id' => $id,
                'rekening_id' => $request->rekening,
                'jumlah' => $request->jumlah,
                'gambar' => $filename
            ]);
        }
        return redirect(route('pemesanan.detail', $id_pemesanan));
    }

    public function updateTransaksi(Request $request, $id_transaksi)
    {
//        return $id_pemesanan;
        $id = $id_transaksi;
        $transaksi1 = Transaksi::find($id);
        $pemesanan = $transaksi1->getPemesanan;
        if ($request->hasFile('bukti')) {
            if (file_exists("storage/img/pembayaran/" . $transaksi1->gambar)) {
                unlink("storage/img/pembayaran/" . $transaksi1->gambar);
            }
            $file = $request->file('bukti');
            $filename = time() . '_' . Auth::id() . '_' . $pemesanan->id_pemesanan . '.' . $file->getClientOriginalExtension();

            $file->move('storage/img/pembayaran', $filename);

            $pemesanan->status = 2;
            $pemesanan->save();

            $transaksi1->rekening_id = $request->rekening;
            $transaksi1->jumlah = $request->jumlah;
            $transaksi1->gambar = $filename;
            $transaksi1->save();
        }
        return redirect(route('pemesanan.detail', $pemesanan->id_pemesanan));
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
