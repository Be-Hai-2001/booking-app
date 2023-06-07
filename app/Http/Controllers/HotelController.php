<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Models\image;
use App\Models\phuonngXa;
use App\Models\quanHuyen;
use App\Models\thanhPho;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected SettingInterface $setting;
    protected GetObjectInterface $getting;
    public function __construct(SettingInterface $setting, GetObjectInterface $getting){
        $this->setting = $setting;
        $this->getting = $getting;
    }
    public function index()
    {

        $lst = DB::table('hotels')
                ->leftJoin('images', 'hotels.id', '=', 'images.hotel_id')
                ->select('hotels.id', 'hotels.tenKS', 'hotels.sdt', 'hotels.soSao',
                'hotels.tuoiThemGiuong','hotels.tuoiFree', 'hotels.soluong_free',
                'hotels.checkinCheckout', 'hotels.trangThai', 'images.images', 'hotels.thanhPho')
            ->get();

        return view('admin.tables.hotel_table',['hotels'=>$lst]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = thanhPho::all();
        // $quan = quanHuyen::where('id','$ward->quan_huyen_id');
        // dd($quan);
        // $quan = $this->getting->getByIdQH();
        // dd($quan);
        $district = quanHuyen::all();
        return response(view('admin.Create.create_hotel',[
            'city'=>$city,
            'district'=>$district,
        ]));
    }
    public function finCity(Request $request){
        // dd($request);
        $data = quanHuyen::where('thanh_pho_id',$request->id)->get();
        return response()->json($data);
    }
    public function finDistrict(Request $request){
        $data = phuonngXa::where('quan_huyen_id',$request->id)->get();
        //dd($data);
        return response()->json($data);

    }

    public function store(Request $request)
    {
       return $this->setting->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit( hotel $hotel)
    {
        return response(view('admin.Update.update_hotel',['hotel'=>$hotel]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehotelRequest  $request
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotel $hotel)
    {
        return $this->setting->update($request,$hotel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel $hotel)
    {
        return $this->setting->destroy($hotel);
    }
}
