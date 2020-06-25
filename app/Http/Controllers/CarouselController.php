<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousels.index')->with('carousels', $carousels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/images/carousels');
        $image->move($destinationPath, $imageName);

        $carousel = new Carousel();
        $carousel->link = $request->link;
        $carousel->description = $request->description;
        $carousel->image = $imageName;
        $carousel->status = 'nonactive';
        $carousel->save();

        return redirect('/carousels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = Carousel::find($id);
        return view('admin.carousels.show')->with('carousel', $carousel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::find($id);
        return view('admin.carousels.edit')->with('carousel', $carousel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carousel = Carousel::find($id);
        $carousel->link = $request->link;
        $carousel->description = $request->description;                

        if($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/images/carousels');
            $image->move($destinationPath, $imageName);
            $carousel->image = $imageName;
        }

        $carousel->update();

        return redirect('/carousels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carousel::find($id)->delete();

        return redirect('/carousels');
    }

    public function getCarousels() {
        return response()->json(Carousel::all());
    }
}
