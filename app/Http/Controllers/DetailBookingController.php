<?php

namespace App\Http\Controllers;

use App\Models\detailBooking;
use App\Http\Requests\StoredetailBookingRequest;
use App\Http\Requests\UpdatedetailBookingRequest;

class DetailBookingController extends Controller
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
     * @param  \App\Http\Requests\StoredetailBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredetailBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detailBooking  $detailBooking
     * @return \Illuminate\Http\Response
     */
    public function show(detailBooking $detailBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailBooking  $detailBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(detailBooking $detailBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailBookingRequest  $request
     * @param  \App\Models\detailBooking  $detailBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetailBookingRequest $request, detailBooking $detailBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailBooking  $detailBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(detailBooking $detailBooking)
    {
        //
    }
}
