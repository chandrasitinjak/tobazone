<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Kabupaten;
use App\Member;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index(){
        $events = Event::paginate(10);
        $kabupatens = Kabupaten::all();

        return view('cbt.informasi.event.index',compact('events', 'kabupatens'));
    }

    public function store(Request $request){
        $member = Member::where('user_id', Auth::id())->get();

        $event = new Event;
        $event->nama_event = $request->nama_event;
        $event->kabupaten_id = $request->kabupaten_id;
        $event->tgl_awal = $request->tgl_awal;
        $event->tgl_akhir = $request->tgl_akhir;
        $event->lokasi = $request->lokasi;
        $event->deskripsi = $request->deskripsi;
        $event->member_id = $member[0]->id;
        $event->status = 2;

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
        $event->foto = $gambar;

        if($event->save()){

            $file->move(\base_path() ."/public/Kab/information/Event", $gambar);

            //Alert::success('Success', $request->nama_event. ' berhasil ditambahkan');
            return redirect()->back();
        }
    }

    public function edit($id){
        $event = Event::findOrFail($id);
        return view('cbt.informasi.event.edit',compact('event'));
    }

    public function update(Request $request, $id){
        // var_dump($id);
        // die();
        try {
            //select data berdasarkan id
            $event = Event::findOrFail($id);
            //update data

            $event->nama_event = $request->nama_event;
            $event->tgl_awal = $request->tgl_awal;
            $event->tgl_akhir = $request->tgl_akhir;
            $event->lokasi = $request->lokasi;
            $event->deskripsi = $request->deskripsi;

            if($request->inpFile != NULL){
                $file = $request->file('inpFile');

                $length = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                $gambar =$randomString.".jpg";
                $event->foto = $gambar;
                $file->move(\base_path() ."/public/Kab/information/Event", $gambar);
            }

            if($event->save()){
                return redirect(route('event.index'))->with(['success' => 'Budaya: ' . $request->nama_event . ' Diedit']);
            }


        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return $e->getMessage();
        }

    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('cbt.informasi.event.view',compact('event'));
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();
        //Alert::success('Success', 'Event berhasil dihapus');
        return redirect()->back();
    }


    public function displayDetailEvent($id){
        $event = Event::findOrFail($id);
        return view('users.informasi.event.detail.event',compact('event'));
    }

    public function displayEvent(){
        $events = Event::inRandomOrder()->get();
        return view('users.informasi.event.index', compact('events'));
    }
}
