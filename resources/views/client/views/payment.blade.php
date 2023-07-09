@extends('client.master')

@section('main')
{{-- <form action="" method="POST"> --}}
    <form action="{{'paymentvnpay'}}" method="POST">
    @csrf
    @foreach ($hotels as $hotel)
        {{-- @foreach ($payments as $pay) --}}
            <input type="hidden" id="free" value="{{ $hotel->soluong_free }}" required>
            <input type="hidden" id="tenKS" value="{{ $hotel->tenKS }}">
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
                                <span>Đặt phòng</span>
                                <div style="border-right: solid 2px; margin-right: 14px;">Lúc: {{$date_booking}} </div>
                                <input type="hidden" value="{{$date_booking}}" id="date_booking">
                            </div>
                            <div id="traP" style="width: 50%">
                                <span>Nhận phòng</span>
                                <div>Lúc: {{$checkin}}</div>
                                <input type="hidden" value="{{$checkin}}" id="checkin">
                            </div>
                        </div>
                        <div>
                            Thời gian: {{$hotel->checkinCheckout}}
                        </div>
                        <hr>
                        <div id="tp-r-c">
                            <p><Strong>Bạn đã chọn</Strong></p>
                            <pre>Số lượng loại phòng: <a id="sl-lp"></a> </pre>
                            <pre>Số lượng giường thêm: <a id="sl-gt"></a></pre>
                            <pre>Số đêm: {{$soDem}} </pre>
                            <input type="hidden" id="soDem" value="{{$soDem}}">
                        </div>
                        <hr>
                        <div class="tongTien">
                            <p><Strong>Tổng hóa đơn: </Strong> <b style=" color: blueviolet; text-shadow: rgb(0, 0, 0) 2px 2px 4px"> {{ number_format($tongTien)}} VND </b> </p>
                            <input type="hidden" id="tongTien" value="{{$tongTien}}">
                        </div>
                        <hr>
                        <div id="doitra">
                            <p><Strong>Quy định đổi trả</Strong></p>
                            <div>  {{$hotel->doiTra}} </div>
                        </div>
                        <hr>
                        <div class="phuthu">
                            <p><Strong>Phụ thu dịp lễ</Strong></p>
                            <div> Chưa có nội dung phụ thu </div>
                        </div>
                        <hr>
                        <div class="qdroom">
                            <p><Strong>Quy định số người</Strong></p>
                            <div> Số lượng người lớn tối đa không vượt quá <a id="nglon"></a> người,
                                số lượng trẽ em dưới {{ $hotel->tuoiFree }} tuổi được miễn phí tối đa <a id="trEM"></a> người.
                            </div>
                        </div>
                    </div>
        {{-- @endforeach --}}

            <div class="right">
                <div class="hotel-payment">
                    <div class="hotel-img" style="width:35%;">
                        <img style=" width: 40rem; height: 15rem;" src="{{asset('storage')}}/{{ $imgHotel->images }}" alt="error">
                    </div>
                    <div class="content-hotel" style="width:65%">
                        <p class="star">
                            @for ($i=0; $i<$hotel->soSao ; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </p>
                        <p><Strong style="  font-size: 2.5rem; color: blueviolet; text-shadow: rgb(0, 0, 0) 2px 2px 4px">{{$hotel->tenKS}}</Strong></p>
                        <pre><b>Địa chỉ: </b>{{$hotel->tenPhuongXa}} <br> {{$hotel->tenQuanHuyen}}, {{$hotel->tenTp}}</pre>
                    </div>
                </div>
                <div class="info-payment">
                    <p><Strong>Nhập thông tin chi tiết của bạn</Strong></p>
                    <div id="input-infor">
                        <p style="width:70%">
                            <i class="fa-solid fa-blender-phone"></i> <span>Số điện thoại</span> <br>
                            <input style="width:80%; height: 2.4rem; border-radius:5px; margin-top:1rem;" type="text" id = "sdt" required>
                        </p>
                        <p style="width:60%; text-alight:end">
                            <i class="fa-solid fa-user-secret"></i> <span>Căn cước công dân</span> <br>
                            <input style="width:100%; height: 2.4rem; border-radius:5px; margin-top:1rem;" type="text" id="CCCD" required>
                        </p>
                    </div>

                    <div class="noidung">
                        <i class="fa-solid fa-pen"></i> <span>Yêu cầu đặt biệt</span>
                        <textarea  id="content" style="width:100%; margin-top:1rem; font-size: 1.6rem;" rows="8"></textarea>
                    </div>
                    <div>
                        <div> <span>Số lượng người lớn</span> ( Theo só lượng tối đa phòng ): <input id="Sl-nguoiLon" type="number" min="0"></div>
                        <div> <span>Số lượng người nhỏ</span> ( Tuổi thêm giường ): <input id="SL_nguoiNho" type="number" min="0"></div>
                        <div> <span>Số lượng trẻ em</span>( Tuổi free theo số lượng ): <input id="SL_treEm" type="number" min="0"></div>
                    </div>
                </div>

@endforeach
@foreach ($arrCarts as $arrCart)
                    <div class="detail-payment" style="height: 20rem;">
                        <div class="hotel-img" style="width:50%">
                            {{-- {{ $arrCart["images"] }} --}}
                            <img style="width: 40rem; height:20rem" src="{{asset('storage')}}/{{ $arrCart["images"] }}" alt="error" required>
                        </div>
                        <div class="content-hotel">
                            <p><a class="tenloai"> {{$arrCart["tenLoai"]}} </a></p>
                            <input type="hidden" class="roomtype_id" value="{{ $arrCart["roomtype_id"] }}" required>

                            <pre><i class="fa-sharp fa-solid fa-check"></i> Giá Phòng: {{$arrCart["giaTheoNgay"]}}</pre>
                            <input type="hidden" class="giaTheoNgay" value="{{ $arrCart["giaTheoNgay"] }}" required>

                            <pre><i class="fa-sharp fa-solid fa-check"></i> Đã đặt:  {{$arrCart["SL_Loaiphong"]}} phòng</pre>
                            <input type="hidden" class="SL_Loaiphong" value="{{ $arrCart["SL_Loaiphong"] }}" required>

                            <pre><i class="fa-sharp fa-solid fa-check"></i> Số lượng giường thêm: {{$arrCart["SL_giuongThem"]}}</pre>
                            <input type="hidden" class="SL_giuongThem" value="{{ $arrCart["SL_giuongThem"] }}" required>

                            <pre><i class="fa-sharp fa-solid fa-check"></i> Phù hợp cho: {{$arrCart["sucChuaMax"]}} người lớn</pre>
                            <input type="hidden" class="donGia" value="{{ $arrCart["donGia"] }}" required>
                            <input type="hidden" class="sucChuaMax" value="{{ $arrCart["sucChuaMax"] }}" required>
                            {{-- <input type="hidden" class="soluong_free" value="{{ $arrCart["soluong_free"] }}" required> --}}

                        </div>
                    </div>
@endforeach
            </div>
        </div>
        <button id="btn-thanhtoan" name="redirect"> Thanh toán </button>
    </div>
</form>

    @csrf
    {{-- <button id="btn-thanhtoan" name="redirect"> Đặt Phòng </button> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    let total = 0;
    let totalBed = 0;
    let totalpeople = 0;
    let totalFree = 0;

    let sl = document.getElementsByClassName('SL_Loaiphong');
    let bed = document.getElementsByClassName('SL_giuongThem');
    let people = document.getElementsByClassName('sucChuaMax');
    // let slp = 0;

    for(i=0; i< sl.length; i++){

        total += Number(sl[i].value);
        totalBed += Number(bed[i].value);
        totalpeople += Number(people[i].value);

    }
    //Ô input người lớn
    document.getElementById('Sl-nguoiLon').value = total;
    document.getElementById("Sl-nguoiLon").setAttribute("min", total);

    // Giá trị loại phòng
    document.getElementById('sl-lp').innerText = total;
    document.getElementById('sl-gt').innerText = totalBed;
    document.getElementById('nglon').innerText = totalpeople;

    let free = document.getElementById('free').value;
    console.log(free);
    document.getElementById('trEM').innerText = free;
    console.log(total);

// $(function($){
    $(function($){
        var arr_detail = [];
        var roomtype_id = document.getElementsByClassName('roomtype_id');
        // var hotel
        var giaTheoNgay =   document.getElementsByClassName('giaTheoNgay');
        var SL_Loaiphong =   document.getElementsByClassName('SL_Loaiphong');
        var SL_giuongThem =   document.getElementsByClassName('SL_giuongThem');
        var donGia =  document.getElementsByClassName('donGia');

        $("#btn-thanhtoan").on('click',function(){
            // console.log(roomtype_id[0].value * giaTheoNgay[0].value);
            for(i=0 ; i< roomtype_id.length; i++){
                arr_detail.push([{
                        'roomtype_id':roomtype_id[i].value,
                        'giaTheoNgay':giaTheoNgay[i].value,
                        'SL_Loaiphong':SL_Loaiphong[i].value,
                        'SL_giuongThem':SL_giuongThem[i].value,
                        'donGia':donGia[i].value
                }]);
            }
            var arr_hd = [{
                'user_id':'',
                'tenKS': document.getElementById('tenKS').value,
                'sdt': document.getElementById('sdt').value,
                'CCCD': document.getElementById('CCCD').value,
                'ngayDP': document.getElementById('date_booking').value,
                'checkin': document.getElementById('checkin').value,
                'soDem': document.getElementById('soDem').value,
                'tongTien': document.getElementById('tongTien').value,
                'content': document.getElementById('content').value,
                'SL_nguoiLon': document.getElementById('Sl-nguoiLon').value,
                'SL_nguoiNho': document.getElementById('SL_nguoiNho').value,
                'SL_treEm': document.getElementById('SL_treEm').value,
                // trangthai
            }];
            console.log(arr_hd);

            $.ajax({
                type:"POST",
                data:{
                    'Carts':arr_detail,
                    'bill':arr_hd,
                },
                url: "/api/apiPayment",
                // dataType:'json',
            });
        });
    });
// })


</script>
@endsection
