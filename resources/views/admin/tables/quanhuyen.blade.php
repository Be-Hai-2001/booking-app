@extends('admin.master')

@section('main-admin')
    <div id="title-data" style="margin-left: 7rem;"> Home <i class="fa-solid fa-right-to-bracket"></i> Tables <i
            class="fa-solid fa-right-to-bracket"></i>
        Table Address</div>

    <div style="display: flex;  justify-content: space-between;">
        <div class="table-main-right" style="width:50%; margin-top: 0;">
            <div class="create" style="margin-left: 0; margin-top: 5rem;"><a href="{{ route('roomtypes.create') }}">Thêm Quận
                    Huyện</a></div>
            <table>
                <tr class="title-admin-table">
                    <th style="width:15%">Id</th>
                    <th style="width:20%">Thành Phố Id</th>
                    <th style="width:40%">Tên Quận - Huyện</th>
                    <th style="width:25%">Chức năng</th>
                </tr>
                @foreach ($districts as $district)
                    <tr class="content-admin-table">
                        <th> {{ $district->id }} </th>
                        <th> {{ $district->thanh_pho_id }} </th>
                        <th> {{ $district->tenQuanHuyen }} </th>
                        <th>
                            <a href="" class="add-a"><i class="fa-solid fa-pen-to-square" style="color: blue"></i></a>
                            <br>
                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                @method('DELETE')
                                @csrf
                                <div class="add-a">
                                    <button><i class="fa-solid fa-trash-can-arrow-up" style="color: red"></i></button>
                                </div>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="table-main-right" style="width:50%; margin-top: 0;">
            <div class="create" style="margin-left: 0 ; margin-top: 5rem;"><a href="{{ route('roomtypes.create') }}">Thêm
                    Phường Xã</a></div>
            <table>
                <tr class="title-admin-table">
                    <th style="width:15%">Id</th>
                    <th style="width:20%">Quận_Huyện Id</th>
                    <th style="width:40%">Địa chỉ</th>
                    <th style="width:25%">Chức năng</th>
                </tr>

                @foreach ($wards as $ward)
                    <tr class="content-admin-table">
                        <th> {{ $ward->id }} </th>
                        <th> {{ $ward->quan_huyen_id }} </th>
                        <th> {{ $ward->tenPhuongXa }} </th>
                        <th>
                            <a href="" class="add-a"><i class="fa-solid fa-pen-to-square" style="color: blue"></i></a>
                            <br>
                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                @method('DELETE')
                                @csrf
                                <div class="add-a">
                                    <button><i class="fa-solid fa-trash-can-arrow-up" style="color: red"></i></button>
                                </div>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
