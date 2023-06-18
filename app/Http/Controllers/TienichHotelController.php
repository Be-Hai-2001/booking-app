<?php

namespace App\Http\Controllers;

use App\Models\tienichHotel;
use App\Http\Requests\StoretienichHotelRequest;
use App\Http\Requests\UpdatetienichHotelRequest;
use App\Models\hotel;
use Illuminate\Http\Request;

class TienichHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lst = tienichHotel::all();
        return response(view('admin.tables.service_hotel',['lst'=>$lst]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lst = hotel::all();
        return response()->view('admin.Create.create_servicehotel',['lst'=>$lst], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretienichHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenTienIch'=> 'required',
            'hotel_id'=> 'required',
            'noiDung'=> 'required',
        ], [
            'tenTienIch.required' => 'Không được bỏ trống.',

            'hotel_id.required' => 'Không được bỏ trống.',

            'noiDung.required' => 'Không được bỏ trống.',
        ]);

        $service = tienichHotel::create([
            'hotel_id'=>$request->hotel_id,
            'tenTienIch'=>$request->tenTienIch,
            'noiDung'=>$request->noiDung
        ]);
        $service->save();
        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tienichHotel  $tienichHotel
     * @return \Illuminate\Http\Response
     */
    public function show(tienichHotel $tienichHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tienichHotel  $tienichHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(tienichHotel $tienichHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetienichHotelRequest  $request
     * @param  \App\Models\tienichHotel  $tienichHotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetienichHotelRequest $request, tienichHotel $tienichHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tienichHotel  $tienichHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(tienichHotel $tienichHotel)
    {
        //
    }
}
