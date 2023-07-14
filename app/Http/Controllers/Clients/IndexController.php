<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\bookingHotel;
use App\Models\detailBooking;
use App\Models\hotel;
use App\Models\image;
use App\Models\roomtype;
use App\Models\thanhPho;
use App\Models\tienichHotel;
use App\Models\User;
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
        $discount = roomtype::Join('images', 'images.roomtype_id', '=', 'roomtypes.id')->where('roomtypes.discount',1)->get(['roomtypes.*', 'images.images']);

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

        // dd($is_float);
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
                'hotels.checkinCheckout', 'hotels.id', 'hotels.soSao', 'hotels.content', 'hotels.doiTra')
               ->DISTINCT()
                ->get();
        // dd($detail_hotel);

        $service_hotel = hotel::Join('tienich_hotels', 'hotels.id', '=', 'tienich_hotels.hotel_id')->where('hotels.id', $id)
        ->get(['tienich_hotels.tenTienIch', 'tienich_hotels.noiDung']);

        // dd($service_hotel);
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
            'service_hotel'=>$service_hotel,
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
        // $soNguoilon

        //Tạo mảng khác sạn
        $arr =  $request->request;
        $ngayDP= Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
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

        $arr = array_values($arr);
        $arrCart = [];
        $arrCarts = [];

        $scop = 1;
        $scopArr = 0;

        //Tạo mảng cart
        for($i = 5; $i < Count($arr); $i++){
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
        // dd($arrCarts);


        // $arrId = [];
        foreach($arrCarts as $val){
            $name = roomtype::where('id',$val['roomtype_id'])->get();
            $arrId = $val['roomtype_id'];
            $img = image::where('roomtype_id',$val['roomtype_id'])->select('images')->first();
            // dd($images);
            foreach($name as $item){

                $val['tenLoai'] = $item->tenLoai;
                $val['sucChuaMax'] = $item->sucChuaMax;

                $val['soluong_gth'] = $item->slGiuongThem;
                $val['images'] = $img->images  ?? 'upload\images\logoDulich.png';

                // dd($val['images']);

            }
            // dd($val['tenLoai']);
            array_push($lst, $val);
        }
        //    dd($ngayDP->toDateString());
        // dd($ngayDP.toDateString());
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
        // dd($request->id);
        $roomtype = Db::table('roomtypes')
        ->where([
            ['roomtypes.id',$request->id],
            ['images.avt',1],
        ])
        ->leftJoin('images', 'images.roomtype_id', '=', 'roomtypes.id')
        ->get();

        // dd($roomtype);
        return response()->json($roomtype);
    }

    public function getSeverceRoomApi(Request $request){
        // dd($request->id);
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

    public function apiPayment(Request $request){
        // dd($request->bill[0]['tenKS']);
        //Thêm một hóa đơn
        bookingHotel::create([
            'user_id'=>$request->bill[0]['user_id'],
            'hotel_id'=>$request->bill[0]['hotel_id'],
            'tenKS'=>$request->bill[0]['tenKS'],
            'sdt'=>$request->bill[0]['sdt'],
            'CCCD'=>$request->bill[0]['CCCD'],
            'ngayDP'=>$request->bill[0]['ngayDP'],
            'checkin'=>$request->bill[0]['checkin'],
            'soDem'=>$request->bill[0]['soDem'],
            'tongTien'=>$request->bill[0]['tongTien'],
            'content'=>$request->bill[0]['content'],
            'SL_nguoiLon'=>$request->bill[0]['SL_nguoiLon'],
            'SL_nguoiNho'=>$request->bill[0]['SL_nguoiNho'],
            'SL_treEm'=>$request->bill[0]['SL_treEm'],
            'trangThai'=>0,
        ]);

        $last_record = bookingHotel::latest()->first()->toArray();

        // dd($last_record['id']);
        //Thêm danh sách chi tiết 1 hóa đơn
        for($i=0; $i< Count($request->Carts); $i++){
            detailBooking::create([
                'roomtype_id'=>$request->Carts[$i][0]['roomtype_id'],
                'booking_hotel_id'=>$last_record['id'],
                'giaTheoNgay'=>$request->Carts[$i][0]['giaTheoNgay'],
                'SL_Loaiphong'=>$request->Carts[$i][0]['SL_Loaiphong'],
                'SL_giuongThem'=>$request->Carts[$i][0]['SL_giuongThem'],
                'donGia'=>$request->Carts[$i][0]['donGia'],
            ]);
        }

        return response()->json(201);

    }


    //detail
    function detailBooking($id) {
        // dd(11111111111);
        $details = detailBooking::Where('booking_hotel_id', $id)
        ->join('roomtypes', 'roomtypes.id', '=', 'detail_bookings.roomtype_id')
        ->select(['roomtypes.tenLoai', 'detail_bookings.*'], )
        ->get();
        // dd($details);
        return view('admin.tables.detail_booking_table', [
            'lst'=>$details
        ]);
    }

    function updateUser(Request $request, $id) {
        // dd($id);
        $user = User::find($id)->update($request->all());
        return response()->json(['success'=>'User Updated Successfully!'], 201);
    }

}

