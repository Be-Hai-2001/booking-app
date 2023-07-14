<?php

namespace App\Http\Controllers;

use App\Models\bookingHotel;
use App\Models\detailBooking;
use App\Models\hotel;
use App\Models\roomtype;
use Illuminate\Http\Request;

class AdminHotelController extends Controller
{
    public function showAllBilling(Request $request) {
        // $hotelId = $request->id;
        $billingByHotel = bookingHotel::Where('hotel_id', $request->hotel_id)->get();
        // dd($showBillingByHotel);
        $showBillingByHotel = $billingByHotel->sortByDesc("created_at");
        $hotelName =  bookingHotel::Where('hotel_id', $request->hotel_id)->first('tenKS');
        // dd($hotelName);
        return view('adminHotel.view.billing', [
            'showBillingByHotel'=>$showBillingByHotel ,
            'hotelName' =>$hotelName
        ]);
    }

    public function showRoomtype(Request $request) {
        // dd(111111111);
        $roomtypeByhotels = roomtype::Join('hotels', 'roomtypes.hotel_id', '=', 'hotels.id')
        ->Where('roomtypes.hotel_id', $request->hotel_id)
        ->get();
        $hotelName =  bookingHotel::Where('hotel_id', $request->hotel_id)->first('tenKS');
        $sortByDescRoomtypes = $roomtypeByhotels->sortByDesc("created_at");
        // dd($roomtypeByhotels);
        return view('adminHotel.view.roomtype', [
            'sortByDescRoomtypes'=>$sortByDescRoomtypes,
            'hotelName' =>$hotelName
        ]);
    }

    public function showHotel(Request $request) {

        $hotelByhotels = hotel::Where('id', $request->hotel_id)->get();
        $hotelName =  bookingHotel::Where('hotel_id', $request->hotel_id)->first('tenKS');
        return view('adminHotel.view.hotel',[
            'hotelByhotels' => $hotelByhotels,
            'hotelName' =>$hotelName
        ]);
    }
}
