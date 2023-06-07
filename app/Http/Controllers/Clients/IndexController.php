<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\hotel;
use App\Models\image;
use App\Models\roomtype;
use App\Models\thanhPho;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;

use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{
    protected SettingInterface $setting;
    protected GetObjectInterface $getting;
    public function __construct(SettingInterface $setting, GetObjectInterface $getting){
        $this->setting = $setting;
        $this->getting = $getting;
    }
    //Hiển thị gia diện trang home người dùng
    //Method GET
    public function Home(){
        $discount = roomtype::where('discount',1)->get();
        $address = thanhPho::all();

        $is_float = DB::table('hotels')
        ->where('hotels.is_float',1)
        ->leftJoin('images', 'hotels.id', '=', 'images.hotel_id')
        ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
        ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
        ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
        ->select('hotels.id', 'hotels.tenKS', 'hotels.sdt', 'hotels.soSao',
        'hotels.tuoiThemGiuong','hotels.tuoiFree', 'hotels.soluong_free',
        'hotels.checkinCheckout', 'hotels.trangThai', 'images.images',
        'thanh_phos.tenTp', 'quan_huyens.tenQuanHuyen', 'phuonng_xas.tenPhuongXa', 'hotels.content'
        )
        ->get();

        return view('client.views.trang_chu',[
            'discount'=>$discount,
            'address'=>$address,
            'isfloat'=>$is_float,
        ]);
    }

    //Hiển thị form khi người dùng tìm kiếm
    //Method POST
    public function Selected(Request $request){
    //   dd($request);
        $city = $request->tenTp;
        //dd($city);
        return redirect()->route('GetSelected',['hotels'=>$city]);
        // return view('client.views.selected');
    }

    //Hiển thị danh sách select theo tĩnh - số lượng
    //Method GET
    public function GetSelected(Request $request){

        $hotel = DB::table('hotels')
                ->where('hotels.thanhPho',$request->hotels)
                ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
                ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
                ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
                ->join('images', 'hotels.id', '=', 'images.hotel_id')
                ->where('images.avt', 1)
                ->select('hotels.tenKS', 'hotels.content', 'thanh_phos.tenTp',
                        'quan_huyens.tenQuanHuyen', 'phuonng_xas.tenPhuongXa',
                        'hotels.checkinCheckout', 'images.images', 'hotels.id', 'hotels.soSao')

                ->simplePaginate(4);


        $areas = DB::table('thanh_phos')
                ->select('quan_huyens.id as quan_huyen_id','thanh_phos.*', 'quan_huyens.tenQuanHuyen')
                ->where('thanh_phos.id',$request->hotels)
                ->join('quan_huyens', 'thanh_phos.id', '=', 'quan_huyens.thanh_pho_id')
                ->get();
        // dd($areas);
        return view('client.views.selected',[
                'hotels'=>$hotel,
                'areas' =>$areas
        ]);
    }

    public function checkSelectAPI(Request $request){

        $check_hotels = DB::table('hotels')
            ->whereIn('hotels.quanHuyen',$request->data)
            ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
            ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
            ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
            ->Leftjoin('images', 'hotels.id', '=', 'images.hotel_id')
        ->get();
        //  dd($check_hotels);
        return response()->json($check_hotels);

    }
    //Hiển thị theo danh sách loại phòng thuộc khách sạn
    //Method GET
    public function GetHotelById($id){

        $detail_hotel = DB::table('hotels')
                ->where('hotels.id',$id)
                ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
                ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
                ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
                //->join('images', 'hotels.id', '=', 'images.hotel_id')
                ->select ('hotels.tenKS', 'hotels.content', 'thanh_phos.tenTp',
                'quan_huyens.tenQuanHuyen', 'phuonng_xas.tenPhuongXa',
                'hotels.checkinCheckout', 'hotels.id', 'hotels.soSao')
               ->DISTINCT()
                ->get();

        $roomtype = DB::table('hotels')
                    ->where('hotels.id', $id)
                    ->join('roomtypes','roomtypes.hotel_id', '=', 'hotels.id')
                    ->get();

        $pic = image::where('hotel_id',$id)->first();
// dd($pic);
        $images = image::where('hotel_id',$id)->get();
       // dd($images);
        $day = Carbon::now()->day; //ngày
        $month = Carbon::now()->month; //tháng
        $year = Carbon::now()->year; //năm

        $nhanphong = $this->getting->getDayMonth($day,$month,$year);

        return view('client.views.booking',[
            'details'=>$detail_hotel,
            'roomtypes'=>$roomtype,
            'nhan_phong'=>$nhanphong,
            'images'=>$images,
            'pic'=>$pic,
        ]);
    }

    //Gửi dữ liệu từ trang loại phòng sang hóa đơn
    //Method POST
    public function postBookingRoom(Request $request){

        //dd($request->request);
        // $data = [];
        //  $data = $request->request;
        // dd($data);
        // $request->session()->push

        // return view('slick.payment_quick_view');
    }

    // Lỗi Không fix được
    public function getRoomtypeAPI(Request $request){

        $roomtype = roomtype::find($request->id);

        $cart = session()->get('cart');

        // $cart[$request->id] = [
        //     'id'=>$roomtype->id,
        //     'tenLoai'=>$roomtype->tenLoai,
        // ];
      //dd($cart);

      session()->put('cart', $cart);

    //   return view('client.views.booking',['cart'=>$cart]);

        print_r($cart);

    }

    //Gird view API lấy loại phòng khi click
    public function getRoomtypeJsonAPI(Request $request){

        $roomtype = Db::table('roomtypes')
        ->where([
            ['roomtypes.id',$request->id],
            ['images.avt',1],
        ])
        ->leftJoin('images', 'images.roomtype_id', '=', 'roomtypes.id')
        ->get();

        return response()->json($roomtype);
    }

    public function getSeverceRoomApi(Request $request){
        $service = roomtype::find($request->id)->services;
        //dd($service);
        return response()->json($service);
    }
    public function finAddress(Request $request){
        $data = DB::table('quan_huyens')
        ->where('quan_huyens.tenQuanHuyen', '=', $request->tenQuanHuyen)
        ->join('hotels', 'hotels.quanHuyen', '=', 'quan_huyens.id')
        ->get();
    }
}

