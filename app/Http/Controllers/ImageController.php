<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use App\Models\image;
use App\Http\Requests\StoreimageRequest;
use App\Http\Requests\UpdateimageRequest;
use App\Models\hotel;
use App\Models\roomtype;
use App\Models\user;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    protected SettingInterface $setting;
    // protected GetObjectInterface $getting;
    public function __construct(SettingInterface $setting){
        $this->setting = $setting;
        // $this->getting = $getting;
    }
    protected function fixImage(image $image){
        if($image->image && Storage::disk('public')->exists($image->image)){
            $image->image = Storage::url($image->image);
        }else{
            $image->image = '/app/images/logoDulich.png';
        }
    }

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
    public function createImageHotel(Request $request)
    {

        $hotel = hotel::where('id',$request->id)->get();

        return response(view('admin.Create.create_image',[
            'hotel'=>$hotel,
        ]));
    }

    public function createImageRoom(Request $request)
    {

        $room = roomtype::where('id',$request->id)->get();

        return response(view('admin.Create.create_image_roomtype',[
            'room'=>$room,
        ]));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreimageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $img = image::where('roomtype_id',4)->get();
        // dd($img);
        return $this->setting->createImage($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateimageRequest  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateimageRequest $request, image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(image $image)
    {
        //
    }
}
