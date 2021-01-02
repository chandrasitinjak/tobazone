<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\HomestayRooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $homestayId
     * @param  int  $roomId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $homestayId, $roomId)
    {
        if (!Auth::user()) {
            return response('Not authorized user', Response::HTTP_UNAUTHORIZED);
        }

        $merchant = $this->getAuthenticatedMerchant();
        if ($merchant === null) {
            return response('Not authorized user', Response::HTTP_UNAUTHORIZED);
        }

        $roomImageBasePath = public_path('/images/homestay/room/');

        // Store updated image to room image folder. Attribute image contains
        // string of base64 encoded image.
        $updatedImage = '';
        if ($request->roomToUpdate['image'] !== null) {
            $imageExt = explode('/', mime_content_type($request->roomToUpdate['image']))[1];
            $imageEnc = preg_replace('#^data:image/\w+;base64,#i', '', $request->roomToUpdate['image']);

            $image = base64_decode($imageEnc);
            $imageName = $roomId
                . "_"
                . Carbon::now()->timestamp
                . '_'
                . $request->roomToUpdate['name']
                . '.'
                . $imageExt;
            File::put($roomImageBasePath . $imageName, $image);
            $updatedImage = $imageName;
        }

        $room = HomestayRooms::where('id', $roomId)
            ->where('id_homestay', $homestayId)
            ->first();

        // Remove current image from room image folder.
        $image_to_delete = $roomImageBasePath . $room->image;
        if (File::exists($image_to_delete)) {
            File::delete($image_to_delete);
        }

        $room->name = $request->roomToUpdate['name'];
        $room->kategori = $request->roomToUpdate['kategori'];
        $room->facilities = implode(',', $request->roomToUpdate['facilities']);
        $room->price = $request->roomToUpdate['price'];
        $room->description = $request->roomToUpdate['description'];
        $room->total_bed = $request->roomToUpdate['total_bed'];
        $room->total_extra_bed = $request->roomToUpdate['total_extra_bed'];
        $room->image = $updatedImage;
        $room->updated_at = date('Y-m-d H:i:s');
        $room->save();

        return response($room, Response::HTTP_OK);
    }

    /**
     * Update status of hoestay room in storage.
     */
    public function updateStatus(Request $request, $homestayId, $roomId)
    {
        if (!Auth::user()) {
            return response('Not authorized user', Response::HTTP_UNAUTHORIZED);
        }

        $merchant = $this->getAuthenticatedMerchant();
        if ($merchant === null) {
            return response('Not authorized user', Response::HTTP_UNAUTHORIZED);
        }

        $homestay_room = HomestayRooms::where('id', $roomId)
            ->where('id_homestay', $homestayId)
            ->first();

        $roomStatus = 'Booked';
        if ($request->roomStatus) {
            $roomStatus = 'Available';
        }
        $homestay_room->status = $roomStatus;
        $homestay_room->save();

        return response($homestay_room, Response::HTTP_OK);
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

    /**
     * Check auth of merchant.
     *
     * @return \Illuminate\Http\Response
     */
    private function getAuthenticatedMerchant()
    {
        $merchant = User::with('profile')->find(Auth::user()->id);
        $address = json_decode(json_decode($merchant->profile->address)[0]);
        $merchant->profile->address = $address;

        return $merchant;
    }
}
