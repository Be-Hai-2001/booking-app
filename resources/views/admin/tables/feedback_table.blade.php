@extends('admin.master')

@section('main-admin')
<div class="table-main-right">
    <div id="title-data"> Home <i class="fa-solid fa-right-to-bracket"></i> Billing <i class="fa-solid fa-right-to-bracket"></i>Feedback</div>
    <div><h2>Phản Hồi Khách Hàng</h2></div>
    <table style="width:100%">
        <tr class="title-admin-table">
            <th style="width:5%">Id</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th style="width:30%">Nội Dung</th>
            <th>Ngày Nhận</th>
        </tr>

        @foreach ($lst as $feedback)
            <tr class="content-admin-table">
            <th style="width:5%">{{$feedback->id}}</th>
            <th>{{$feedback->ho_ten}}</th>
            <th>{{$feedback->email}}</th>
            <th>{{$feedback->dia_chi}}</th>
            <th style="width:30%">{{$feedback->noi_dung}}</th>
            <th>{{$feedback->created_at}}</th>
            </tr>
        @endforeach
    </table>
</div>
@endsection