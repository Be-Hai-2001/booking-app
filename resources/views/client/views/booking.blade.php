@extends('client.master')


@section('main')


    <div class="detail-frame">
        @foreach ($details as $detail)
            <div class="d-name">
                <input type="hidden" value="{{ $detail->tenKS }}" name="tenKS">
                <h2 class="black_1_7">{{ $detail->tenKS }}</h2>
            </div>
            <div class="d-address">
                <input type="hidden" name="diaChi" value="{{ $detail->tenPhuongXa }}, {{ $detail->tenQuanHuyen }}, {{ $detail->tenTp }}">
                <p>{{ $detail->tenPhuongXa }}, {{ $detail->tenQuanHuyen }}, {{ $detail->tenTp }}</p>
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
                            {{-- <h3>Điểm nổi bật của chỗ nghỉ</h3> --}}
                            {{-- <b>Hoàn hảo cho kỳ nghỉ 1 đêm</b>
                            <p>Địa điểm hàng đầu: Được khách gần đây đánh giá cao (9,4 điểm)</p>
                            <b>Các lựa chọn với:</b>
                            <p>Nhìn ra hồ bơi</p>
                            <p>Hồ bơi có tầm nhìn</p>
                            <p>Hướng nhìn ra đường yên ắng</p>
                            <p>Sân hiên</p>
                            <p>Có chỗ đậu xe riêng miễn phí trong khuôn viên</p> --}}
                            {{-- <button><b>Đặt ngay</b></button> --}}
                        </div>
                    </div>
                </div>
                <div class="d-detail-picture">

                </div>
            </div>
            <div class="d-introduce">
                <div class="d-main-introduce">
                    <div class="d-m-i-1">
                        {!! $detail->content !!}
                    </div>
                    <div class="d-m-i-2">
                        <h3 class="black_1_7">Nơi lưu trú</h3>
                    </div>
                </div>

            </div>
            <hr>
            <div class="d-room">
                    <form action="{{ route('postBookingRoom') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h2 class="black_1_7">Phòng trống</h2> <br>
                            <div>
                                <b class="black_1_2">Ngày Nhận</b>:  <input type="date" name = "checkin" min="{{$nhan_phong}}" value=""/>
                                <b class="black_1_2">Số đêm:</b> <input type="number" min="1" name="soDem" id="number_night" value="1" onchange="payment()">
                                {{-- <input type="tel" name = "sdt"> --}}
                            </div>
                        </div>
                        <table class="d-room-table" >
                            <tr class="d-r-t-top" style='font-size:1.2rem; background:rgb(33, 150, 243); color: white'>
                                <th style="width:15%"><b>Loại chỗ nghỉ</b></th>
                                <th style="width:8%"><b>Phù hợp cho</b></th>
                                <th style="width:15%"><b>Giá hôm nay</b></th>
                                <th style="width:20%"><b>Các lựa chọn</b></th>
                                <th style="width:5%"><b>Chọn số lượng</b></th>
                                <th style="width:14%">Giường thêm</th>
                                <th style="width:15%">Đơn giá</th>
                                <th style="width:9%"><button style='font-size:1.2rem; background:aqua;border: none; box-shadow: 3px 0px 5px -1px;'><b>Đặt phòng</b></button></th>
                            </tr>
                            <input type="hidden" value="{{ $detail->id }}" name="booking_hotel_id">
                            <input type="text" value="" name="tongTien" id="tongTien">

                            @foreach ($roomtypes as $room)
                                <tr style='font-size:1.2rem; white-space: pre-line;background: white;'>
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

                                        <td class="center">
                                            {{-- <a href=""  data-url="{{ route('getRoomtypeAPI',['id'=> $room->id]) }}" class="add_to_cart">Chọn</a> --}}
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
            <div class="d-tiennghi">
                <div class="d-tn-name">
                    <h2 class="black_1_7">Các tiện nghi của Hidden Gem</h2>
                    <p>Tiện nghi tuyệt vời! Điểm đánh giá: 10</p>
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

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
