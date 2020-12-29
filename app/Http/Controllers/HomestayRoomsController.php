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
     * @param  int  $id
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

        // Store updated image to room image folder.
        $updatedImage = '';
        if ($request->roomDetail['image'] !== null) {
            $encImage = $request->roomDetail['image'];

            $imageExt = explode('/', mime_content_type($request->roomDetail['image']))[1];
            if ($imageExt === 'jpeg') {
                $encImage = str_replace('data:image/jpeg;base64,', '', $encImage);
                $encImage = str_replace(' ', '+', $encImage);
            }
            if ($imageExt === 'png') {
                $encImage = str_replace('data:image/png;base64,', '', $encImage);
                $encImage = str_replace(' ', '+', $encImage);
            }

            $image = base64_decode($encImage);
            $imageName = $request->roomDetail['id']
                . "_"
                . Carbon::now()->timestamp
                . '_'
                . $request->roomDetail['name']
                . '.'
                . $imageExt;
            File::put($roomImageBasePath . $imageName, $image);
            $updatedImage = $imageName;
        }

        $current_room = HomestayRooms::where('id', $roomId)
            ->where('id_homestay', $homestayId)
            ->first();

        // Remove current image from room image folder.
        $image_to_delete = $roomImageBasePath . $current_room->image;
        if (File::exists($image_to_delete)) {
            File::delete($image_to_delete);
        }

        $current_room->name = $request->roomDetail['name'];
        $current_room->kategori = $request->roomDetail['kategori'];
        $current_room->facilities = implode(',', $request->roomDetail['facilities']);
        $current_room->price = $request->roomDetail['price'];
        $current_room->description = $request->roomDetail['description'];
        $current_room->total_bed = $request->roomDetail['total_bed'];
        $current_room->total_extra_bed = $request->roomDetail['total_extra_bed'];
        $current_room->image = $updatedImage;
        $current_room->updated_at = date('Y-m-d H:i:s');
        $current_room->save();

        return response($current_room, Response::HTTP_OK);
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
