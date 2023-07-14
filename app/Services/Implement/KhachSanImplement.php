<?php

namespace App\Services\Implement;

use App\Models\hotel;
use App\Models\image;
use App\Models\loaiGiuong;
use App\Models\phuonngXa;
use App\Models\quanHuyen;
use App\Models\roomtype;
use App\Models\tienichRoomtype;
use App\Services\Interfaces\GetObjectInterface;
use App\Services\Interfaces\SettingInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KhachSanImplement implements GetObjectInterface, SettingInterface {
    // get interface

    public function getAll()
    {
        return  hotel::all();
    }

    public function getById($id)
    {
        // $this->fixImage($id);
        $hotel = DB::table('hotels')->where('id',$id)->get();
        return $hotel;
    }

    //Lấy chi tiết khách sạn theo id khách sạn
    public function getAddressIdHotel($id){
        $hotel = DB::table('hotels')
                ->where('hotels.id', $id)
                ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
                ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
                ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
                ->get();
        return $hotel;
    }

    //Lấy danh sách khách sạn theo id thành phố
    public function getAddressCityHotel($city){
        $hotel =  DB::table('hotels')
            ->where('hotels.thanhPho',$city)
            ->join('thanh_phos','hotels.thanhPho', '=', 'thanh_phos.id')
            ->join('quan_huyens', 'hotels.quanHuyen', '=', 'quan_huyens.id')
            ->join('phuonng_xas', 'hotels.phuongXa', '=', 'phuonng_xas.id')
            ->join('images', 'hotels.id', '=', 'images.hotel_id');

        return $hotel;
    }

    public function getDayMonth($day, $month,$year){
                //Chuyển ngày nhận phòng
        switch($day){
            case 1: case 2: case 3: case 4: case 5: case 6: case 7: case 8: case 9:
                            $day =  '0'.($day); break;
            case 10: case 11: case 12:case 13: case 14: case 15: case 16: case 17: case 18:
            case 19: case 20: case 21:case 22: case 23: case 24: case 25: case 26: case 27:
            case 28: case 29: case 30: case 31:
                            $day;  break;
        }

                //Chuyển tháng nhận phòng
        switch($month){
            case 1: case 2: case 3: case 4: case 5: case 6: case 7: case 8: case 9:
                            $month =  '0'.($month); break;
            case 10: case 11: case 12:
                            $month;  break;
            }

        $nhanphong = ($year).'-'.($month).'-'.($day);
        return $nhanphong;
    }

    // Setting interface
    //Khách sạn
    public function create($request){
        $rules = [
        'tuoiThemGiuong'=> 'required',
        'tuoiFree'=> 'required',
        'soluong_free'=> 'required',
        'tenKS'=> 'required|unique:hotels,tenKS',
        'sdt'=> 'required',
        'checkinCheckout'=> 'required',
        'doiTra'=> 'required',
        'soSao'=> 'required',
        'thanhPho'=> 'required',
        'quanHuyen'=> 'required',
        'phuongXa'=> 'required',
        'trangThai'=> 'required',
        ];
        
        $messages = [
            'required'=>'Không được bỏ trống..!',
            'unique'=>'Đã tồn tại..!'
        ];

        $request->validate($rules, $messages);

        $hotel = hotel::create([
            'tuoiThemGiuong'=>$request->tuoiThemGiuong,
            'tuoiFree'=>$request->tuoiFree,
            'soluong_free'=>$request->soluong_free,
            'tenKS'=>$request->tenKS,
            'sdt'=>$request->sdt,
            'checkinCheckout'=>$request->checkinCheckout,
            'doiTra'=>$request->doiTra,
            'soSao'=>$request->soSao,
            'thanhPho'=>$request->thanhPho,
            'quanHuyen'=>$request->quanHuyen,
            'phuongXa'=>$request->phuongXa,
            'content'=>$request->content,
            'trangThai'=>$request->trangThai
        ]);
        $hotel->save();

        return redirect()->route('hotels.index');
    }
    public function update($request, $hotel){
        $request->validate( [
            'tuoiThemGiuong'=> 'required',
            'tuoiFree'=> 'required',
            'soluong_free'=> 'required',
            'tenKS'=> 'required',
            'sdt'=> 'required',
            'checkinCheckout'=> 'required',
            'doiTra'=> 'required',
            'soSao'=> 'required',
            'thanhPho'=> 'required',
            'quanHuyen'=> 'required',
            'phuongXa'=> 'required',
            'trangThai'=> 'required',
        ]);

        $hotel->fill([
            'tuoiThemGiuong'=>$request->tuoiThemGiuong,
            'tuoiFree'=>$request->tuoiFree,
            'soluong_free'=>$request->soluong_free,
            'tenKS'=>$request->tenKS,
            'sdt'=>$request->sdt,
            'checkinCheckout'=>$request->checkinCheckout,
            'doiTra'=>$request->doiTra,
            'soSao'=>$request->soSao,
            'thanhPho'=>$request->thanhPho,
            'quanHuyen'=>$request->quanHuyen,

            'phuongXa'=>$request->phuongXa,
            'trangThai'=>$request->trangThai
        ]);
        $hotel->save();

        return redirect()->route('hotels.index');
    }
    public function destroy($hotel){
        $hotel->delete();
        return redirect()->route('hotels.index');
    }

    //Quận - Huyện
    public function getByIdQH($id){
        $hotel = DB::table('quan_huyens')->where('id',$id)->get();
        return $hotel;
    }
    public function createQH($request){
        $rules=[
            'thanh_pho_id'=>'required',
            'tenQuanHuyen'=>'required'
        ];

        $messages = [
            'required'=>'Không được bỏ trống..!',
        ];
        $request->validate($rules, $messages);

        $district = quanHuyen::create([
            'thanh_pho_id'=>$request->thanh_pho_id,
            'tenQuanHuyen'=>$request->tenQuanHuyen
          ]);
        $district->save();
        return redirect()->route('admin-address');
    }
    public function updateQH($request, $hotel){

    }
    public function destroyQH($hotel){

    }

    //Phường - Xã
    public function createPX($request){
        $rules=[
            'quan_huyen_id'=>'required',
            'tenPhuongXa'=>'required'
        ];
        $messages = [
            'required'=>'Không được bỏ trống..!',
        ];
        $request->validate($rules, $messages);

        $district = phuonngXa::create([
            'quan_huyen_id'=>$request->quan_huyen_id,
            'tenPhuongXa'=>$request->tenPhuongXa
          ]);

        $district->save();
        return redirect()->route('admin-address');
    }
    public function updatePX($request, $hotel){

    }
    public function destroyPX($hotel){

    }

         // bed type
    public function createBed($request){
        $rules = [
            'tenLoai'=>'requied',
            'chuThichSucChua'=>'requiedz'
        ];

        $bed = loaiGiuong::create([
            'tenLoai'=>$request->tenLoai,
            'chuThichSucChua'=>$request->chuThichSucChua
        ]);
        $bed->save();
        return redirect()->route('bedtypes.index');
    }
    public function updateBed($request, $hotel){

    }
    public function destroyBed($hotel){

    }

    //Room type
    public function createRoom($request){
        $rules=[
            'hotel_id'=>'required',
            'loai_giuong_id'=>'required',
            'tenLoai'=>'required',
            'slGiuongThem'=>'required',
            'giaThemGiuong'=>'required',
            'giaLoaiPhong'=>'required',
            'dienTich'=>'required',
            'sucChuaMax'=>'required',
            'content'=>'required',
            'type'=>'required',
            'sl_roomtype'=>'required',
            'hienThi'=>'required',
            'trangThai'=>'required',
        ];
        $request->validate($rules);

        $room = roomtype::create([
            'hotel_id'=>$request->hotel_id,
            'loai_giuong_id'=>$request->loai_giuong_id,
            'tenLoai'=>$request->tenLoai,
            'slGiuongThem'=>$request->slGiuongThem,
            'giaThemGiuong'=>$request->giaThemGiuong,
            'giaLoaiPhong'=>$request->giaLoaiPhong,
            'dienTich'=>$request->dienTich,
            'sucChuaMax'=>$request->sucChuaMax,
            'content'=>$request->content,
            'type'=>$request->type,
            'sl_roomtype'=>$request->sl_roomtype,
            'hienThi'=>$request->hienThi,
            'trangThai'=>$request->trangThai,
        ]);
        $room->save();
        return redirect()->route('roomtypes.index');
    }
    public function updateRoom($request, $hotel){

    }
    public function destroyRoom($roomtype){
        $roomtype->delete();
        return redirect()->route('roomtypes.index');
    }

    //Service roomtype
    public function createSvRoom($request){
        $request->validate(
            [
                'tenTienIch'=> 'required',
                'roomtype_id'=> 'required',
                'noiDung'=> 'required',
            ]
        );

        $service = tienichRoomtype::create([
            'roomtype_id'=>$request->roomtype_id,
            'tenTienIch'=>$request->tenTienIch,
            'noiDung'=>$request->noiDung
        ]);
        $service->save();
        return redirect()->route('servicerooms.index');
    }
    public function updateSvRoom($request, $hotel){

    }
    public function destroySvRoom($hotel){

    }

    //Image
    public function createImage($request){

        $image = image::create([
            'hotel_id'=>$request->hotel_id,
            'roomtype_id'=>$request->roomtype_id,
            'avt'=>$request->avt,
            'images'=>'',
        ]);
        //Đường dẫn lưu sản phẩm
        $path = $request->images->store('upload/images/'.$image->id,'public');
        $image->images = $path;

        $image->save();

        return redirect()->route('tables');
    }

}
