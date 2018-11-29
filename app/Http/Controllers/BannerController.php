<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index')->with('banners', $banners );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if($request->hasFile('image')){
            $uploadedImage = $request->file('image');
            $imageName = $uploadedImage->getClientOriginalName();
            $destinationPath = public_path('/images/banners');
            $uploadedImage->move($destinationPath, $imageName);
        }
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->link = $request->link;       
        $banner->image = $imageName;
        $banner->save();
   
        return redirect('/banners')->with('success', 'Banner berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.edit')->with('banner', $banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->link = $request->link;       

        if($request->file('image')) {
            $updateImage = $request->file('image');
            $imageName = $updateImage->getClientOriginalName();
            $destinationPath = public_path('/images/banner');
            $updateImage->move($destinationPath, $imageName);
            $banner->image = $imageName;
        }
            
        $banner->save();

        return redirect('/banners')->with('success', 'Banner berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect('/banners','Banner berhasil di hapus');
    }

    public function getBanners() {
        return response()->json(Banner::all());
    }
}
