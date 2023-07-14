@extends('adminHotel.master')

@section('main-admin')

<div class="table-main-right">
    <div class="name-ks-shadow">{{ $hotelName->tenKS }}</div>
    <div id="title-data"> Home <i class="fa-solid fa-right-to-bracket"></i> Tables <i class="fa-solid fa-right-to-bracket"></i> Hotel Tables</div>

    <div class="create"><a href="{{ route('hotels.create') }}">Thêm khách sạn</a></div>

    <table style="width:100%">
        <tr class="title-admin-table">
            <th>Id</th>
            <th style="width:18%">Tên Khách Sạn</th>
            <th>Số Điện Thoại</th>
            <th style="width:20%">Hình Ảnh</th>
            <th style="width:18%">Địa chỉ</th>
            <th style="width:0%">Trạng Thái</th>
            <th>Chức Năng</th>
        </tr>

        @foreach ($hotelByhotels as $hotel)
            <tr class="content-admin-table">
                <th>{{ $hotel->id }}</th>
                <th> {{ $hotel->tenKS }} </th>
                <th>  {{ $hotel->sdt }} </th>
                <th > <img style="max-width:100%; max-height: 100%;" src="{{asset('storage')}}/{{ $hotel->images }}" alt="lỗi"> </th>
                <th>Địa chỉ</th>
                <th> {{ $hotel->trangThai }} </th>
                <th>
                    <a href="{{ route('hotels.edit',['hotel'=>$hotel->id]) }}" class="add-a"><i class="fa-solid fa-pen-to-square" style="color: blue"></i></a> <br>
                    <form action="{{ route('hotels.destroy',['hotel'=>$hotel->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="add-a">
                            <button><i class="fa-solid fa-trash-can-arrow-up" style="color: red"></i></button>
                        </div>
                    </form>
                    <a href="/image/hotel/{{  $hotel->id }}" class="add-a"> <i class="fa-regular fa-images" style="color: orange"></i> </a>
                </th>
            </tr>
        @endforeach
    </table>

</div>

@endsection
