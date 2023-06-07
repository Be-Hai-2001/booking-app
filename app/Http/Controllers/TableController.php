<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Models\loaiGiuong;
use App\Models\phuonngXa;
use App\Models\quanHuyen;
use App\Models\roomtype;
use App\Models\tienichHotel;
use App\Models\tienichRoomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function Tables(){
        $lst = DB::table('hotels')
                ->leftJoin('images', 'hotels.id', '=', 'images.hotel_id')
                ->select('hotels.id', 'hotels.tenKS', 'hotels.sdt', 'hotels.soSao',
                'hotels.tuoiThemGiuong','hotels.tuoiFree', 'hotels.soluong_free',
                'hotels.checkinCheckout', 'hotels.trangThai', 'images.images')
                ->get();

        $serviceHotel = tienichHotel::all();
        $district = quanHuyen::all();
        $ward = phuonngXa::all();
        $bed = loaiGiuong::all();
        $room = roomtype::all();
        $svroom = tienichRoomtype::all();
        return view('admin.layout.tables',[
            'hotels'=>$lst,
            'serviceHotel'=>$serviceHotel,
            'district'=>$district,
            'ward'=>$ward,
            'bed'=>$bed,
            'room'=>$room,
            'serviceRoom'=>$svroom,
        ]);
    }
}
