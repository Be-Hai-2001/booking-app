<?php

namespace App\Http\Controllers;

use App\Models\tienichRoomtype;
use App\Http\Requests\StoretienichRoomtypeRequest;
use App\Http\Requests\UpdatetienichRoomtypeRequest;
use App\Models\roomtype;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class TienichRoomtypeController extends Controller
{

    protected SettingInterface $setting;
    protected GetObjectInterface $getting;

    public function __construct(SettingInterface $setting, GetObjectInterface $getting){
        $this->setting = $setting;
        $this->getting = $getting;
    }
    public function index()
    {
        $serviceRoom = tienichRoomtype::all();
        return response(view('admin.tables.service_roomtype',['serviceRoom'=>$serviceRoom]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype = roomtype::all();
        return response(view('admin.Create.create_service_roomtype',['lst'=>$roomtype]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretienichRoomtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->setting->createSvRoom($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tienichRoomtype  $tienichRoomtype
     * @return \Illuminate\Http\Response
     */
    public function show(tienichRoomtype $tienichRoomtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tienichRoomtype  $tienichRoomtype
     * @return \Illuminate\Http\Response
     */
    public function edit(tienichRoomtype $tienichRoomtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetienichRoomtypeRequest  $request
     * @param  \App\Models\tienichRoomtype  $tienichRoomtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetienichRoomtypeRequest $request, tienichRoomtype $tienichRoomtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tienichRoomtype  $tienichRoomtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(tienichRoomtype $tienichRoomtype)
    {
        //
    }
}
