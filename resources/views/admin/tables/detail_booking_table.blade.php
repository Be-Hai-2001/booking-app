@extends('admin.master')

@section('main-admin')
    <div class="table-main-right">
        <div><h2>Chi tiết hóa đơn</h2></div>
        <table style="width:100%">
            <tr class="title-admin-table">
                <th style="width:10%">Id Hóa Đơn</th>
                <th>Tên Loại Phòng</th>
                <th style="width:18%">Giá Theo Ngày</th>
                <th style="width:10%">Số Lượng Đặt</th>
                <th style="width:15%">Số Lượng Giường Thêm</th>
                <th style="width:15%">Đơn Giá</th>
            </tr>
    
            @foreach ($lst as $detail)
                <tr class="content-admin-table">
                    <th> {{ $detail->booking_hotel_id }}</th>
                    <th> {{ $detail->tenLoai }}</th>
                    <th> {{ $detail->giaTheoNgay }}</th>
                    <th> {{ $detail->SL_Loaiphong }}</th>
                    <th> {{ $detail->SL_giuongThem }}</th>
                    <th> {{ $detail->donGia }}</th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection