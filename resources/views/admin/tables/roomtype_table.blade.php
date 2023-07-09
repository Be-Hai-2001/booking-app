@extends('admin.master')

@section('main-admin')
    <div class="table-main-right">
        <div id="title-data"> Home <i class="fa-solid fa-right-to-bracket"></i> Tables <i
                class="fa-solid fa-right-to-bracket"></i> Table Roomtype</div>

        <div class="create"><a href="{{ route('roomtypes.create') }}">Thêm Loại Phòng</a></div>

        <table style="width:100%">
            <tr class="title-admin-table">
                <th style="width:20%">Tên Loại Phòng</th>
                <th style="width:15%">Giá Loại</th>
                <th style="width:20%">Hình Ảnh</th>
                <th>Khách Sạn Id</th>
                <th>Sức chứa</th>
                <th>Hiển thị</th>
                <th style="width:0%">Trạng Thái</th>
                <th>Chức năng</th>
            </tr>

            @foreach ($roomtypes as $roomtype)
                <tr class="content-admin-table">
                    <th style="width:20%"> {{ $roomtype->tenLoai }} </th>
                    <th style="width:15%"> {{ $roomtype->giaLoaiPhong }} </th>
                    <th style="width:20%">Hình Ảnh</th>
                    <th>{{ $roomtype->hotel_id }}</th>
                    <th> <b>{{ $roomtype->sucChuaMax }}</b> người lớn</th>
                    <th> {{ $roomtype->hienThi }} </th>
                    <th style="width:0%">{{ $roomtype->trangThai }}</th>
                    <th>
                        <a href="" class="add-a"><i class="fa-solid fa-pen-to-square" style="color: blue"></i></a>
                        <br>
                        <form action="{{ route('roomtypes.destroy', ['roomtype' => $roomtype]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf
                            <div class="add-a">
                                <button><i class="fa-solid fa-trash-can-arrow-up" style="color: red"></i></button>
                            </div>
                        </form>
                        <a href="/image/roomtype/{{ $roomtype->id }}" class="add-a"> <i class="fa-regular fa-images" style="color: orange"></i> </a>
                    </th>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
