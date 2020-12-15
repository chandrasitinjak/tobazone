<?php

namespace App\Http\Controllers;

use App\HomestayRooms;
use Illuminate\Http\Request;

class HomestayRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get detail of homestay room by id
        $homestay_room = HomestayRooms::find($id);

        // TODO: return edit homestay room form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $homestay_room = HomestayRooms::find($id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('/image');
            $image->move($destinationPath, $homestay_room->image);
        }

        $homestay_room->name = $request->name;
        $homestay_room->kategori = $request->kategori;
        $homestay_room->facilities = $request->facilities;
        $homestay_room->price = $request->price;
        $homestay_room->description = $request->description;
        $homestay_room->total_bed = $request->total_bed;
        $homestay_room->total_extra_bed = $request->total_extra_bed;
        $homestay_room->status = $request->status;
        $homestay_room->updated_at = date('Y-m-d H:i:s');

        $homestay_room->image = $homestay_room->image;
        $homestay_room->update();

        // TODO: return updated homestay room view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
