
<style>
    .table{
        margin: auto 40px;
        width: auto;
    }
    .title{
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1.2rem;
        border-style: inset;
        text-align: center;
        color: red;
        height: auto;
    }
    .content{
        display: flex;
        justify-content: space-between;
        border-style: outset;
        text-align: center;
        color: black;
    }
    .create{
        text-align: center;
        font-size: x-large;
        margin: 2rem auto;
        width: 14.5rem;
        border-radius: 7px;
        background: red;
        border: none;
        box-shadow: 5px -2px 11px 2px;
    }
    .create a {
        color: navy;
        font-weight: bold;
    }


    .setting, .room-id-room{
        width: 10%;
    }
    .id{
        width: 3%;
    }
    .KS-id-room, .bed-id-room, .priceAdd-id-room, .S-id-room, .SC_id ,.price-id-room, .price-room-room{
        width: 9%;
    }
    .visible-id-room, .stt-id-room{
        width: 7%;
    }
</style>
<body>
    {{-- Khách Sạn --}}
    <div class="table room">
        <div class="create"><a href="{{ route('roomtypes.create') }}">Thêm loại phòng</a></div>
        <div class="title">
            <div class="id">ID</div>
            <div class="KS-id-room">Khách sạn ID</div>
            <div class="bed-id-room">Loại giường ID</div>
            <div class="room-id-room">Tên loại phòng</div>
            <div class="price-id-room">Giá thêm giường</div>
            <div class="priceAdd-id-room">Tối đa extra Bed</div>
            <div class="price-room-room">Giá loại phòng</div>
            <div class="S-id-room">Diện tích phòng<br>(square meters)</div>
            <div class="SC_id">Sức chứa tối đa</div>
            <div class="visible-id-room">Hiển thị giao diện</div>
            <div class="stt-id-room">Trạng thái</div>
            <div class="setting"> Chức năng</div>
        </div>
    @foreach ($room as $room)
        <div class="content">
            <div class="id">{{ $room->id }}</div>
            <div class="KS-id-room">{{ $room->hotel_id }}</div>
            <div class="bed-id-room">{{ $room->loai_giuong_id }}</div>
            <div class="room-id-room">{{ $room->tenLoai }}</div>
            <div class="price-id-room">{{ $room->giaThemGiuong }}</div>
            <div class="priceAdd-id-room">{{ $room->slGiuongThem }}</div>
            <div class="price-room-room">{{ $room->giaLoaiPhong }}</div>
            <div class="S-id-room">{{ $room->dienTich }}</div>
            <div class="SC_id">{{ $room->sucChuaMax }}</div>
            <div class="visible-id-room">{{ $room->hienThi }}</div>
            <div class="stt-id-room">{{ $room->trangThai }}</div>
            <div class="setting">
                <a href="/image/roomtype/{{ $room->id }}">Thêm ảnh</a>
                <a href="">Sửa</a>
                <form action="{{ route('roomtypes.destroy',['roomtype'=>$room]) }}" method="POST" enctype="multipart/form-data"><form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button>Xóa</button>
                </form>
            </div>

        </div>
    @endforeach
    </div>
