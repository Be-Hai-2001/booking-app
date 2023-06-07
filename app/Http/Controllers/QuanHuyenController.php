<?php

namespace App\Http\Controllers;

use App\Models\quanHuyen;
use App\Http\Requests\StorequanHuyenRequest;
use App\Http\Requests\UpdatequanHuyenRequest;
use App\Models\thanhPho;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class QuanHuyenController extends Controller
{
    protected SettingInterface $setting;
    protected GetObjectInterface $getting;
    public function  __construct(SettingInterface $setting, GetObjectInterface $getting){
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
        $lst = quanHuyen::all();
        return response(view('admin.tables.quanhuyen',['district'=>$lst]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lst = thanhPho::all();
        return response(view('admin.Create.create_quanhuyen',['lst'=>$lst]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequanHuyenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return  $this->setting->createQH($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quanHuyen  $quanHuyen
     * @return \Illuminate\Http\Response
     */
    public function show(quanHuyen $quanHuyen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quanHuyen  $quanHuyen
     * @return \Illuminate\Http\Response
     */
    public function edit(quanHuyen $quanHuyen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequanHuyenRequest  $request
     * @param  \App\Models\quanHuyen  $quanHuyen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequanHuyenRequest $request, quanHuyen $quanHuyen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quanHuyen  $quanHuyen
     * @return \Illuminate\Http\Response
     */
    public function destroy(quanHuyen $quanHuyen)
    {
        //
    }
}
