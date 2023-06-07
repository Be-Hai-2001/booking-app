<?php

namespace App\Http\Controllers;

use App\Models\phuonngXa;
use App\Http\Requests\StorephuonngXaRequest;
use App\Http\Requests\UpdatephuonngXaRequest;
use App\Models\quanHuyen;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;

class PhuonngXaController extends Controller
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
        $ward = phuonngXa::all();
        return response(view('admin.tables.phuongxa',['ward'=>$ward]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lst = quanHuyen::all();
        return response(view('admin.Create.create_phuongxa',['lst'=>$lst]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorephuonngXaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return $this->setting->createPX($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phuonngXa  $phuonngXa
     * @return \Illuminate\Http\Response
     */
    public function show(phuonngXa $phuonngXa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phuonngXa  $phuonngXa
     * @return \Illuminate\Http\Response
     */
    public function edit(phuonngXa $phuonngXa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatephuonngXaRequest  $request
     * @param  \App\Models\phuonngXa  $phuonngXa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatephuonngXaRequest $request, phuonngXa $phuonngXa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phuonngXa  $phuonngXa
     * @return \Illuminate\Http\Response
     */
    public function destroy(phuonngXa $phuonngXa)
    {
        //
    }
}
