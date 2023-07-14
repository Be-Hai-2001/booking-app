@extends('client.master')

@section('main')

<script>
    alert('Thông tin chi tiết hóa đơn của bạn..!')
</script>

<div id="tra-cuu">
    @foreach ($billings as $hotel)
            <div class="content-tra-cuu">
                <div class="tt-tc">
                    <b id="tenKS-tracuu"> {{ $hotel->tenKS }} </b> <br>

                    <h2>Chi tiết đặt phòng</h2>
                    <div style="padding-left: 2rem;">
                        <b>Ngày đặt phòng:</b> <span> {{ $hotel->created_at }} </span> <br>
                        <b>Ngày nhận phòng: </b> <span> {{ $hotel->checkin }} </span> <br>
                        <b>Mã hóa đơn: </b> <span> {{ $hotel->id }} </span> <br>
                        <b>Số đêm: </b> <span> {{ $hotel->soDem }} </span> <br>
                        <b>Tổng hóa đơn: </b> <span> {{ $hotel->tongTien }}</span> <br>
                        <b>Yêu cầu thêm: </b> <span>{{ $hotel->content }}</span> <br>
                        <b>Trạng thái hóa đơn: </b> <span> {{ $hotel->trangThai }} </span> <br>
                    </div>

                    <h2>Thông tin của bạn</h2>
                    <div style="padding-left: 2rem;">
                        <b>CCCD/Passport:</b> <span> {{ $hotel->CCCD }} </span> <br>
                        <b>Số điện thoại:</b> <span> {{ $hotel->sdt }} </span> <br>
                    </div>

                    <h2>Quy định khách sạn</h2>
                    <div style="padding-left: 2rem;">
                        <b>Quy định đổi hủy phòng - đổi phòng: </b> <span> {{ $hotel->doiTra }} </span> <br>
                        <b>Nhận trả phòng: </b> <span>{{ $hotel->checkinCheckout }}  </span><br>
                        <b>Phụ thu dịp lễ: </b> <span>Chưa có nội dung</span>
                    </div>
                </div>
            </div>
    @endforeach
            <div style="width:70%; padding-left: 5rem;" class="content-khach-san">
                @foreach ($roomtypes as $roomtype)
                    <div class="detail-hd-lp">
                        <div class="all-nd">
                            <div class="img">
                                <img src="{{asset('storage')}}/{{ $roomtype->images }}" alt="">
                            </div>
                            <div style="margin-left: 3rem">
                                <h2> {{ $roomtype->tenLoai }} </h2>
                                <div> Giá theo ngày: <span> {{ $roomtype->giaTheoNgay }} </span> </div>
                                <div> Số lượng đã đặt:  <span> {{ $roomtype->SL_Loaiphong }}  phòng</span></div>
                                <div> Diện tích: <span>{{ $roomtype->dienTich }}</span> </div>
                                <div> Chú thích loại phòng: <span> {{ $roomtype->content }} </span> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="{{ asset('app/js/display/admin/thong_ke.js') }}"></script> --}}
@endsection