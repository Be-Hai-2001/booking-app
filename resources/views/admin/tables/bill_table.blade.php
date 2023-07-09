@extends('admin.master')

@section('main-admin')
<div class="table-main-right">
    <div id="title-data"> Home <i class="fa-solid fa-right-to-bracket"></i> Billing <i class="fa-solid fa-right-to-bracket"></i>Bill</div>
    <div><h2>Thông tin đơn đặt phòng</h2></div>
    <table style="width:100%">
        <tr class="title-admin-table">
            <th style="width:5%">Id Hóa Đơn</th>
            <th>Số Điện thoại</th>
            <th style="width:18%">Căn Cước</th>
            <th>Ngày Đặt Phòng</th>
            <th>Ngày Nhận Phòng</th>
            <th style="width:5%">Số Đêm</th>
            <th>Tổng Tiền</th>
            <th style="width:5%">Trạng Thái</th>
            <th style="width:10%">Chi Tiết</th>
        </tr>

        @foreach ($lst as $hd)
            <tr class="content-admin-table">
                <th style="width:5%">{{ $hd->id }}</th>
                <th>{{ $hd->sdt }}</th>
                <th style="width:18%">{{ $hd->CCCD }}</th>
                <th> {{ $hd->ngayDP }} </th>
                <th>{{ $hd->checkin }}</th>
                <th style="width:5%">{{ $hd->soDem }}</th>
                <th>{{ $hd->tongTien }}</th>
                <th style="width:5%">{{ $hd->trangThai }}</th>
                <th><a class="xem-chi-tiet" href="/admin/billing/detail-booking/{{ $hd->id }}"><h3>Xem Chi Tiết</h3></a></th>
            </tr>
        @endforeach
    </table>
</div>
@endsection
