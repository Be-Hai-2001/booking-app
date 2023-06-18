<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\bookingHotel;
use App\Models\detailBooking;
use App\Models\hotel;
use App\Models\image;
use App\Models\roomtype;
use App\Models\thanhPho;
use Carbon\Carbon;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use PHPUnit\Framework\Constraint\Count;
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

        dd($is_float);
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
                ->select ('hotels.tenKS', 'hotels.content', 'thanh_phos.tenTp',
                'quan_huyens.tenQuanHuyen', 'phuonng_xas.tenPhuongXa',
                'hotels.checkinCheckout', 'hotels.id', 'hotels.soSao')
               ->DISTINCT()
                ->get();
        // dd($detail_hotel);

        $roomtype = DB::table('hotels')
                    ->where('hotels.id', $id)
                    ->join('roomtypes','roomtypes.hotel_id', '=', 'hotels.id')
                    ->get();

        $pic = image::where('hotel_id',$id)->first();
        $images = image::where('hotel_id',$id)->get();
        $day = Carbon::now()->day; //ngày
        $month = Carbon::now()->month; //tháng
        $year = Carbon::now()->year; //năm

        $nhanphong = $this->getting->getDayMonth($day,$month,$year);

        return response()->view('client.views.booking',[
            'details'=>$detail_hotel,
            'roomtypes'=>$roomtype,
            'nhan_phong'=>$nhanphong,
            'images'=>$images,
            'pic'=>$pic,
        ], 200);
        // ->header('Content-Type','application/json');
    }

    //Gửi dữ liệu từ trang loại phòng sang trang thanh toán
    public function postBookingRoom(Request $request){
        // dd($request->request);
        $rules = [
            'checkin' => 'required'
        ];

        $request->validate($rules);

        $tongTien = $request->tongTien;
        $checkin = $request->checkin;
        $soDem = $request->soDem;

        //Tạo mảng khác sạn
        $arr =  $request->request;
        $ngayDP= Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $arr = $arr->all();
        // Lấy khách sạn
        $hotels = DB::table('hotels')
            ->where('hotels.id',$arr['booking_hotel_id'])
            ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
            ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
            ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
        ->get();

        // Hình ảnh khách sạn
        $images = image::where('hotel_id',$arr['booking_hotel_id'])->first();
        // dd($hotels);
        // Thêm hóa đơn
        // bookingHotel::create([
        //     'user_id'=>$request->user_id,
        //     'sdt'=>$request->sdt,
        //     'ngayDP'=>$ngayDP,
        //     'checkin'=>$request->checkin,
        //     'soDem'=>$request->soDem,
        //     'tongTien'=>$request->tongTien,
        //     'trangThai'=>1
        // ]);

        // $last_record[] = bookingHotel::latest()->first()->toArray();
        // $hotel_id = 0;
        // $last_record =
        // foreach($last_record as $val){
        //     $hotel_id = $val['id'];
        // }

        $arr = array_values($arr);
        $arrCart = [];
        $arrCarts = [];

        $scop = 1;
        $scopArr = 0;

        //Tạo mảng cart
        for($i = 6; $i < Count($arr); $i++){
            // echo $arr[$i] . "<br>";
            if($scop == 1){
                $arrCart["roomtype_id"] = $arr[$i];
                $arrCarts[$scopArr] = $arrCart;
                $scop++;
            }
            elseif($scop == 2){
                $arrCart["giaTheoNgay"] = $arr[$i];
                $arrCarts[$scopArr] = $arrCart;
                $scop++;
            }elseif($scop == 3){
                $arrCart["SL_Loaiphong"] = $arr[$i];
                $arrCarts[$scopArr] = $arrCart;
                $scop++;
            }
            elseif($scop == 4){
                $arrCart["SL_giuongThem"] = $arr[$i];
                $arrCarts[$scopArr] = $arrCart;
                $scop++;
            }
            else{
                $arrCart["donGia"] = $arr[$i];
                $arrCarts[$scopArr] = $arrCart;
                $scopArr++;
                $scop = 1;
            }
            // dd($scop);
        }
        $lst = [];
        // Xóa cart có số lượng == 0
        foreach($arrCarts as $key=>$val){
            if($val['SL_Loaiphong'] == 0){
                unset($arrCarts[$key]);
            }
        }
        $arr = [];
        foreach($arrCarts as $val){
            $name = roomtype::where('id',$val['roomtype_id'])->get();
            $img = image::where('roomtype_id',$val['roomtype_id'])->first();
            foreach($name as $item){
                // $a['Key'] = $item->tenLoai;
                // dd($a);
                // array_push($val,);
                $val['tenLoai'] = $item->tenLoai;
                $val['sucChuaMax'] = $item->sucChuaMax;
                $val['images'] = $img;
                // dd($val);
            }
            array_push($lst, $val);
        }


        // dd($arr);
        // dd($tongTien);
        // Lưu mảng chi tiết

        // foreach($arrCarts as $key=>$val){
        //     // echo $val['roomtype_id'];
        //     detailBooking::create([
        //         'roomtype_id'=>$val['roomtype_id'],
        //         'booking_hotel_id'=>$hotel_id,
        //         'giaTheoNgay'=>$val['giaTheoNgay'],
        //         'SL_Loaiphong'=>$val['SL_Loaiphong'],
        //         'SL_giuongThem'=>$val['SL_giuongThem'],
        //         'donGia'=,>$val['donGia'],
        //         'SL_nguoiLon'=>null,
        //         'SL_nguoiNho'=>null,
        //         'SL_treEm'=>null,
        //     ]);
        // }
        // dd($hotels);
        return view('client.views.payment', [
            // Khách sạn
            'hotels'=>$hotels,
            //Số đêm
            'soDem'=>$soDem,
            //Ngày nhận phòng
            'checkin'=>$checkin,
            //Ngày đặt phòng
            'date_booking'=>$ngayDP,
            //Tổng tiền
            'tongTien'=>$tongTien,
            // Ảnh khách sạn
            'imgHotel'=>$images,
            //lst loại phòng đã dặt
            'arrCarts'=> $lst,
            //Số sao của khách sạn
        ]);
    }

    //

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

    //Trang liên hệ
    public function lienHe(){
        return response()->view('client.lien_he');
    }
}
