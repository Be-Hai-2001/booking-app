@extends('client.master')


@section('main')


    <div class="detail-frame">
        @foreach ($details as $detail)
            <div class="d-name">
                <input type="hidden" value="{{ $detail->tenKS }}" name="tenKS">
                <h2 class="black_1_7 title-name">{{ $detail->tenKS }}</h2>
            </div>
            <div class="d-address">
                <input type="hidden" name="diaChi" value="{{ $detail->tenPhuongXa }}, {{ $detail->tenQuanHuyen }}, {{ $detail->tenTp }}">
                <p style="margin-bottom: 4rem;"><b>Địa  Chỉ:  </b>{{ $detail->tenPhuongXa }}, {{ $detail->tenQuanHuyen }}, {{ $detail->tenTp }}  </p>
            </div>
            <div class="d-picture">
                <div class="d-main-picture">
                    <div class="d-m-p-1">
                        <div id="ttb-slide">
                            <section class="splide" aria-label="Restriction Example">
                              <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($images as $img)
                                        <li class="splide__slide" data-splide-interval="1000"><img id="replace_{{ $img->id }}" onclick="replaceImg('replace_{{ $img->id }}')" src="{{asset('storage')}}/{{ $img->images }}" alt=""></li>
                                    @endforeach
                                </ul>
                              </div>
                            </section>
                          </div>
                    </div>
                    <div class="d-m-p-2">
                        <img id="replace-main" src="{{asset('storage')}}/{{ $pic->images }}" alt="error">
                    </div>
                    <div style="width:30%">
                        <div class="d-booking">
                            <h2 class="title-name" style=" margin-top: 0;">Tiện nghi nổi bậc của khách sạn</h2> 
                            @foreach ($service_hotel as $service)
                                <div style="font-size:2rem; font-weight:bold;padding-left: 2rem;"> {{ $service->tenTienIch }} </div>
                                <div style=" padding-left: 3rem " class="content"> {!! $service->noiDung !!} </div>
                            @endforeach
                            <button><b>Đặt ngay</b></button>
                        </div>
                    </div>
                </div>
                <div class="d-detail-picture">

                </div>
            </div>
            <div class="d-introduce">
                <div class="d-main-introduce">
                    <div class="d-m-i-2">
                        <h3 class="black_1_7"> <i class="fa-solid fa-people-roof title-name"></i> Nơi lưu trú</h3>
                        <p>
                            {!! $detail->content !!}
                        </p>

                        <p> {{ $detail->doiTra }} </p>
                    </div>
                </div>

            </div>
            <hr>
            <div class="d-room">
                    <form action="{{ route('postBookingRoom') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h2 class="black_1_7" style=" position: absolute; margin-top: 7.6rem"> <i class="fa-solid fa-person-booth title-name"></i> Phòng trống</h2> <br>
                            <div style="display: flex; justify-content: end; margin-bottom: 2rem;">
                                <div> <p><b class="black_1_2">Nhận Phòng</b></p> <input class="input-number-size" type="date" name = "checkin" min="{{$nhan_phong}}" value=""/></div>
                                <div style="width:3%"></div>
                                <div> <p><b class="black_1_2">Số đêm:</b></p> <input class="input-number-size" type="number" min="1" name="soDem" id="number_night" value="1" onchange="payment()"></div>
                            </div>
                        </div>
                        <table class="d-room-table" >
                            <tr class="d-r-t-top" style='height: 5rem;font-size: 1.6rem; background:rgb(33, 150, 243); color: white'>
                                <th style="width:15%"><b>Loại chỗ nghỉ</b></th>
                                <th style="width:8%"><b>Phù hợp cho</b></th>
                                <th style="width:15%"><b>Giá hôm nay</b></th>
                                <th style="width:15%"><b>Các lựa chọn</b></th>
                                <th style="width:5%"><b>Chọn số lượng</b></th>
                                <th style="width:14%">Giường thêm</th>
                                <th style="width:15%">Đơn giá</th>
                                <th style="width:14%"><button class="submit-db-paymant"><b>Đặt phòng</b></button></th>
                            </tr>
                            <div class="div-nd">
                                <p>Tổng giá</p>
                                <p>Tổng loại phòng</p>
                                <p>Tổng giường thêm</p>
                            </div>
                            <input type="hidden" value="{{ $detail->id }}" name="booking_hotel_id">
                            <input type="hidden" value="" name="tongTien" id="tongTien">

                            @foreach ($roomtypes as $room)
                                <tr style='font-size:1.2rem; height: 8rem;background: white;'>
                                    <td>
                                        {{-- Cột tên loại phòng --}}
                                        <input type="hidden"  name="roomtype_id_{{ $room->id }}" value = "{{ $room->id }}">
                                        <button type="button" class="gidview" value="{{ $room->id }}"><b>{{ $room->tenLoai }}</b></button>
                                        {{-- <p>{{ 1 giường đôi cực lớn }}</p> --}}
                                    </td>
                                    <td class="center">
                                        <i class="fa-solid fa-person"></i>x{{ $room->sucChuaMax }}
                                    </td>
                                    {{-- Cột giá loại phòng theo ngày--}}
                                    <td class="center">{{ number_format($room->giaLoaiPhong)}}VND</td>
                                    <input type="hidden" class="price_roomtype" name="giaLoaiPhong_{{ $room->id }}" value="{{ $room->giaLoaiPhong }}">

                                    {{-- Cột số lượng loại phòng --}}
                                    <td class="center">Loại chỗ nghỉ</td>
                                    <td class="center">
                                        <input name="SL_booking_id_{{ $room->id }}" class="input-number number_roomtybe" type="number" max="{{ $room->sl_roomtype }}" min="0" value="0" style="width: 75%;" onchange="payment()">

                                        {{-- Tổng
                                        <input type="text" value="{{ $room->sl_roomtype }}" class="sl-sql">
                                        <input type="text"> --}}
                                    </td>

                                    <td class="center">
                                        {{-- Số lượng extrabed --}}
                                        {{  number_format($room->giaThemGiuong) }} x <input onchange="payment()" class="input-number number_extraBed" name="SL_giuongThem_{{ $room->id }}" type="number" max={{ $room->slGiuongThem }} min="0" value="0">
                                        {{-- Giá thêm giường --}}
                                        <input type="hidden" class="price_extraBed" value="{{ $room->giaThemGiuong }}">

                                    </td>
                                    <td class="center">
                                        <input class="input-number donGia_roomtype" style="width:auto" type="hidden" value="0" name="donGia_{{ $room->id }}" onchange="payment()">
                                        <div class="donGia"> </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <input type="submit" class="add_to_cart"> --}}
                        </table>
                    </form>
            </div>

            <div class="d-bookingkhongcanthe">
                <div>
                    <img src="" alt="">
                </div>
                <div>
                    <p><b>Đặt phòng không cần thanh toán trước đối với hội viên.</b> Chúng tôi sẽ gửi cho bạn một email xác nhận đặt phòng.</p>
                </div>
            </div>
            <div class="d-bienphapbaove">
                <div>
                    <img src="" alt="">
                </div>
                <div>
                    <h3 class="black_1_7">Các biện pháp bổ sung nhằm bảo vệ sức khỏe & an toàn</h3>
                    <p>Chỗ nghỉ này đã thực hiện các biện pháp bổ sung nhằm đảm bảo sức khỏe và vệ sinh an toàn của bạn chính là ưu tiên hàng đầu của họ</p>
                    <a href="#">Xem thêm thông tin chi tiết về sức khỏe & an toàn</a>
                </div>
            </div>
        @endforeach

    </div>

    @include('slick.room_quick_view')
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
      var splide = new Splide( '.splide' ,{
        type      : 'loop',
        direction : 'ttb',
        height    : "auto",
        focus     : 'center',
        autoHeight: true,
        autoplay: true,
      });
      splide.mount();

    } );
</script>
<script src="{{ asset('lib/slider/js/splide.min.js') }}"></script>
<script src="{{ asset('app/js/display/client/payment.js') }}"></script>

<div class="22222"></div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
