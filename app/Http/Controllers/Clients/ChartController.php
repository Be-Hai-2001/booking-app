<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bookingHotel;
use App\Models\CancelReservation;
use App\Models\detailBooking;
use App\Models\Feedback;
use App\Models\hotel;
use App\Models\roomtype;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    //Gửi phản hồi
    public function postFeedback(Request $request) {
        // dd($request->request);
        $feedback = Feedback::create([
            'ho_ten'=>$request->ho_ten,
            'email'=>$request->email,
            'dia_chi'=>$request->dia_chi,
            'noi_dung'=>$request->noi_dung
        ]);

        return redirect()->route('lienHe');
    }

    public function postCancelReservation(Request $request) {
        $cancelReservation = CancelReservation::create([
            'ho_ten'=>$request->ho_ten,
           'noi_dung'=>$request->noi_dung,
            'cccd'=>$request->cccd,
            'ma_hd'=>$request->ma_hd,
            'sdt'=>$request->sdt
       ]);

       return redirect()->route('lienHe');
    }

    function getAllBill() {
        $lst = bookingHotel::all();

        $lstSortByDesc = $lst->sortByDesc("created_at");

        return view('admin.tables.bill_table', ['lst'=>$lstSortByDesc]);
    }

    function getAllFeedback() {
        $lst = Feedback::all();
        return view('admin.tables.feedback_table', ['lst'=>$lst]);
    }

    function getAllCancelReservation(){
        $lst = CancelReservation::all();
        return view('admin.tables.cancel_reservationel', ['lst'=>$lst]);
    }

    function getHotelStatisticsApi(Request $request) {

        if($request->start === null || $request->end === null){
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $min = $dt->toDateString().' '.'00:00:00';
            $hotels = bookingHotel::Where('ngayDP','>=', $min)
                ->groupBy('tenKS')  
                ->selectRaw('tenKS as label, SUM(tongTien) as y')->get();
            // dd($hotels);
        }else{
            $hotels = bookingHotel::Where('ngayDP', '>=', $request->start)
                    ->Where('ngayDP', '<=', $request->end)
                    ->groupBy('tenKS')  
                ->selectRaw('tenKS as label, SUM(tongTien) as y')->get();
        }
        // dd($hotels);
        return response()->json($hotels, 200);
    }

    function postTraCuuHD(Request $request) {
        // dd($request->mahd);

        $hd = bookingHotel::Where('booking_hotels.id', $request->mahd)
            ->Join('hotels', 'hotels.tenKS', '=', 'booking_hotels.tenKS')
            ->get(['booking_hotels.*','hotels.doiTra', 'hotels.checkinCheckout']);

        $roomtypes = detailBooking::Join('roomtypes', 'roomtypes.id', '=', 'detail_bookings.roomtype_id')
            ->Join('images', 'images.roomtype_id', '=', 'detail_bookings.roomtype_id')
            ->Where('detail_bookings.booking_hotel_id', '=', $request->mahd)
            ->Where('images.avt', 1)
            ->get(['roomtypes.*', 'images.images', 'detail_bookings.SL_Loaiphong', 'detail_bookings.giaTheoNgay']);

        // $distinct = $roomtypes->DISTINCT();
        // dd($roomtypes);
        // $billings = bookingHotel::Join()
        return view('client.views.tra_cuu_hd', [
            'billings'=>$hd,
            'roomtypes'=>$roomtypes
        ]);
        
    }

}
