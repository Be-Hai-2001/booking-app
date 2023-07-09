@extends('admin.master')

@section('main-admin')
<div class="table-main-right">
    <div id="title-data"> Home <i class="fa-solid fa-right-to-bracket"></i> Billing <i class="fa-solid fa-right-to-bracket"></i>cancel</div>
    <div><h2>Phản Hồi Khách Hàng</h2></div>
    <table style="width:100%">
        <tr class="title-admin-table">
            <th style="width:5%">Id</th>
            <th>Họ Tên</th>
            <th>Căn Cước</th>
            <th>Số Điện Thoại</th>
            <th style="width:30%">Nội Dung</th>
            <th>Mã Hóa Đơn</th>
            <th>Ngày Nhận</th>
        </tr>

        @foreach ($lst as $cancel)
            <tr class="content-admin-table">
            <th style="width:5%">{{$cancel->id}}</th>
            <th>{{$cancel->ho_ten}}</th>
            <th>{{$cancel->cccd}}</th>
            <th>{{$cancel->sdt}}</th>
            <th style="width:30%">{{$cancel->noi_dung}}</th>
            <th>{{ $cancel->ma_hd }}</th>
            <th>{{$cancel->created_at}}</th>
            </tr>
        @endforeach
    </table>
</div>
@endsection