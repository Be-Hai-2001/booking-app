<?php

namespace App\Http\Controllers;

use App\Models\loaiPhong;
use App\Http\Requests\StoreloaiPhongRequest;
use App\Http\Requests\UpdateloaiPhongRequest;

class LoaiPhongController extends Controller
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
     * @param  \App\Http\Requests\StoreloaiPhongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreloaiPhongRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaiPhong  $loaiPhong
     * @return \Illuminate\Http\Response
     */
    public function show(loaiPhong $loaiPhong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaiPhong  $loaiPhong
     * @return \Illuminate\Http\Response
     */
    public function edit(loaiPhong $loaiPhong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateloaiPhongRequest  $request
     * @param  \App\Models\loaiPhong  $loaiPhong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateloaiPhongRequest $request, loaiPhong $loaiPhong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaiPhong  $loaiPhong
     * @return \Illuminate\Http\Response
     */
    public function destroy(loaiPhong $loaiPhong)
    {
        //
    }
}
