<?php

namespace App\Http\Controllers;

use App\Models\bookingHotel;
use App\Http\Requests\StorebookingHotelRequest;
use App\Http\Requests\UpdatebookingHotelRequest;

class BookingHotelController extends Controller
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
     * @param  \App\Http\Requests\StorebookingHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookingHotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bookingHotel  $bookingHotel
     * @return \Illuminate\Http\Response
     */
    public function show(bookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookingHotel  $bookingHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(bookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookingHotelRequest  $request
     * @param  \App\Models\bookingHotel  $bookingHotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookingHotelRequest $request, bookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookingHotel  $bookingHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookingHotel $bookingHotel)
    {
        //
    }
}
