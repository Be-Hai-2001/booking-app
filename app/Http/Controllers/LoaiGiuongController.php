<?php

namespace App\Http\Controllers;

use App\Models\loaiGiuong;
use App\Http\Requests\StoreloaiGiuongRequest;
use App\Http\Requests\UpdateloaiGiuongRequest;
use App\Models\hotel;
use App\Models\tienichHotel;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class LoaiGiuongController extends Controller
{
    protected SettingInterface $setting;
    protected GetObjectInterface $getting;

    public function __construct(SettingInterface $setting, GetObjectInterface $getting){
        $this->setting = $setting;
        $this->getting = $getting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bed = loaiGiuong::all();
        return response(view('admin.tables.loaigiuong_table',['bed'=>$bed]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.Create.create_loaigiuong'));
    }


    public function store(Request $request)
    {
        return $this->setting->createBed($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaiGiuong  $loaiGiuong
     * @return \Illuminate\Http\Response
     */
    public function show(loaiGiuong $loaiGiuong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaiGiuong  $loaiGiuong
     * @return \Illuminate\Http\Response
     */
    public function edit(loaiGiuong $loaiGiuong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateloaiGiuongRequest  $request
     * @param  \App\Models\loaiGiuong  $loaiGiuong
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateloaiGiuongRequest $request, loaiGiuong $loaiGiuong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaiGiuong  $loaiGiuong
     * @return \Illuminate\Http\Response
     */
    public function destroy(loaiGiuong $loaiGiuong)
    {
        //
    }
}
