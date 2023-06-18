@extends('client.master')

@section('main')
<form action="">
    @csrf
    @foreach ($hotels as $hotel)
        {{-- @foreach ($payments as $pay) --}}

            <div id="main-payment">
                <div id="top-payment" >
                    <i style="font-size: 2.76rem; color:rgb(33, 150, 243);" class="fa-solid fa-circle-check"></i>
                    <p class="txt-m">Bạn đã chọn</p>
                    <div  class="gach"></div>
                    <p class="c-n">2</p>
                    <p class="txt-m">Chi tiết về bạn</p>
                    <div  class="gach"></div>
                    <p class="c-n" style="background: cadetblue">3</p>
                    <p class="txt-m" style="color: cadetblue">Hoàn thành</p>
                </div>
                <div class="bottom-payment" style="display: flex; justify-content: space-between;">
                    <div class="left">
                        <p><Strong>Chi tiết đặt phòng của bạn</Strong></p>
                        <div style="display: flex; width:100%">
                            <div id="nhanP" style="width :50%">
                                Đặt phòng
                                <div>Lúc: {{$date_booking}} </div>
                            </div>
                            <div id="traP" style="width: 50%">
                                Nhận phòng
                                <div>Lúc: {{$checkin}}</div>
                            </div>
                        </div>
                        <div>
                            Thời gian: {{$hotel->checkinCheckout}}
                        </div>
                        <hr>
                        <div id="tp-r-c">
                            <p><Strong>Bạn đã chọn</Strong></p>
                            <pre>Số lượng loại phòng: </pre>
                            <pre>Số lượng giường thêm: </pre>
                            <pre>Số đêm: {{$soDem}} </pre>
                        </div>
                        <hr>
                        <div class="tongTien">
                            <p><Strong>Tổng hóa đơn: </Strong> <b> {{$tongTien}} </b> </p>
                        </div>
                        <hr>
                        <div id="doitra">
                            <p><Strong>Quy định đổi trả</Strong></p>
                            <div>  {{$hotel->doiTra}} </div>
                        </div>
                        <hr>
                        <div class="phuthu">
                            <p><Strong>Phụ thu dịp lễ</Strong></p>
                            <pre>Nội dung phụ thu</pre>
                        </div>
                    </div>
        {{-- @endforeach --}}

            <div class="right">
                <div class="hotel-payment">
                    <div class="hotel-img" style="width:35%;">
                        <img style=" width: 40rem;" src="{{asset('storage')}}/{{ $imgHotel->images }}" alt="error">
                    </div>
                    <div class="content-hotel" style="width:65%">
                        <p class="star">
                            @for ($i=0; $i<$hotel->soSao ; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </p>
                        <p><Strong>{{$hotel->tenKS}}</Strong></p>
                        <pre><b>Địa chỉ: </b>{{$hotel->tenPhuongXa}} <br> {{$hotel->tenQuanHuyen}}, {{$hotel->tenTp}}</pre>
                    </div>
                </div>
    @endforeach
                <div class="info-payment">
                    <p><Strong>Nhập thông tin chi tiết của bạn</Strong></p>
                    <div id="input-infor">
                        <p style="width:70%">
                            <i class="fa-solid fa-blender-phone"></i> Số điện thoại <br>
                            <input style="width:80%; height: 2.4rem; border-radius:5px; margin-top:1rem;" type="text" name = "sdt">
                        </p>
                        <p style="width:60%; text-alight:end">
                            <i class="fa-solid fa-user-secret"></i> Căn cước công dân <br>
                            <input style="width:100%; height: 2.4rem; border-radius:5px; margin-top:1rem;" type="text" name="CCCD">
                        </p>
                    </div>
                    <div class="noidung">
                        <i class="fa-solid fa-pen"></i> Yêu cầu đặt biệt
                        <textarea name="content" id="" style="width:100%; margin-top:1rem;" rows="10"></textarea>
                    </div>
                </div>
@foreach ($arrCarts as $arrCart)
                    <div class="detail-payment" style="height: 19rem;">
                        <div class="hotel-img" style="width:50%">
                            <img style="width: 40rem;" src="{{asset('storage')}}/{{ $arrCart["images"] }}" alt="error">
                        </div>
                        <div class="content-hotel">
                            <p><Strong> {{$arrCart["tenLoai"]}} </Strong></p>
                            <pre><i class="fa-sharp fa-solid fa-check"></i> Giá Phòng: {{$arrCart["giaTheoNgay"]}}</pre>
                            <pre><i class="fa-sharp fa-solid fa-check"></i> Đã đặt:  {{$arrCart["SL_Loaiphong"]}} phòng</pre>
                            <pre><i class="fa-sharp fa-solid fa-check"></i> Số lượng giường thêm: {{$arrCart["SL_giuongThem"]}}</pre>
                            <pre><i class="fa-sharp fa-solid fa-check"></i> Phù hợp cho: {{$arrCart["sucChuaMax"]}} người</pre>
                        </div>
                    </div>
@endforeach
            </div>
        </div>
        <button>Thanh toán</button>
    </div>
</form>
@endsection
