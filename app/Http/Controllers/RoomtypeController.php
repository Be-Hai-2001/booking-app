<?php

namespace App\Http\Controllers;

use App\Models\roomtype;
use App\Http\Requests\StoreroomtypeRequest;
use App\Http\Requests\UpdateroomtypeRequest;
use App\Models\hotel;
use App\Models\loaiGiuong;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{

    protected SettingInterface $setting;
    protected GetObjectInterface $getting;

    public function __construct(SettingInterface $setting, GetObjectInterface $getting){
        $this->setting = $setting;
        $this->getting = $getting;
    }
    public function index()
    {
        $room = roomtype::all();
        return response(view('admin.tables.roomtype_table',['room'=>$room]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = hotel::all();
        $bed = loaiGiuong::all();
        return response(view('admin.Create.create_roomtype',['hotel'=>$hotel,'bed'=>$bed]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreroomtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->setting->createRoom($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(roomtype $roomtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function edit(roomtype $roomtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateroomtypeRequest  $request
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateroomtypeRequest $request, roomtype $roomtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(roomtype $roomtype)
    {
        return $this->setting->destroyRoom($roomtype);
    }
}
