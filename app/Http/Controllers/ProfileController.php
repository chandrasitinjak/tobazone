<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function getProfile($id) {
        return response(Profile::where('user_id', $id)->first());
    }

    public function updateAddress(Request $request, $id) {
        $profile = Profile::where('user_id', $id)->first();

        $address = json_decode($profile->address);
   
        array_push($address, json_encode([
            'name' => $request->addressName,
            'province_id' => $request->provinceId,
            'city_id' => $request->cityId,
            'subdistrict_id' => $request->subdistrictId,
            'province_name' => $request->provinceName,
            'city_name' => $request->cityName,
            'subdistrict_name' => $request->subdistrictName,
            'postal_code' => $request->postalCode,
            'detail' => $request->addressDetail,
        ]));

        $profile->address = json_encode($address);
        $profile->update();
    }
}
