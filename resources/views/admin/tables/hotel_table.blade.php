<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
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
    .id{
        width: 1%;
    }
    .tenKS ,.sdt, .checkin{
        width: 10%;
    }
    .ageExtrabed, .tuoiFree, .SL_free{
        width: 6%;
    }
    .hinhAnh{
        width: 14%;
    }
    .trangThai, .soSao{
        width: 4%;
    }
    .setting{
        width: 10%;
    }
    .diaChi{
        width: 8%;
    }


</style>
<body>
    {{-- Khách Sạn --}}
    <div class="table hotel">
        <div class="create"><a href="{{ route('hotels.create') }}">Thêm khách sạn</a></div>
        <div class="title">
            <div class="id">ID</div>
            <div class="tenKS">Tên khách sạn</div>
            <div class="sdt">Số điện thoại</div>
            <div class="soSao">Số sao</div>
            <div class="hinhAnh">Hình ảnh</div>
            <div class="diaChi">Địa chỉ</div>
            <div class="ageExtrabed">Tuổi thêm giường</div>
            <div class="tuoiFree">Tuổi miễn phí</div>
            <div class="SL_free">Giới hạn miễn phí</div>
            <div class="checkin">Nhận trả</div>
            <div class="trangThai">Trạng thái</div>
            <div class="setting"> Chức năng</div>
        </div>
    @foreach ($hotels as $hotel)
        <div class="content">
            <div class="id">{{ $hotel->id }}</div>
            <div class="tenKS">{{ $hotel->tenKS }}</div>
            <div class="sdt">{{ $hotel->sdt }}</div>
            <div class="soSao">{{ $hotel->soSao }}</div>
            <div class="hinhAnh"><img style="max-width:100%" src="{{asset('storage')}}/{{ $hotel->images }}" alt="lỗi"></div>
            <div class="diaChi"></div>
            <div class="ageExtrabed">{{ $hotel->tuoiThemGiuong }}</div>
            <div class="tuoiFree">{{ $hotel->tuoiFree }}</div>
            <div class="SL_free">{{ $hotel->soluong_free }}</div>
            <div class="checkin">{{ $hotel->checkinCheckout }}</div>
            <div class="trangThai">{{ $hotel->trangThai }}</div>

            <div class="setting">
                <a href="/image/hotel/{{  $hotel->id }}" class="add-a"> Thêm ảnh</a>
                 <a href="{{ route('hotels.edit',['hotel'=>$hotel->id]) }}" class="add-a">Sửa</a>
               <form action="{{ route('hotels.destroy',['hotel'=>$hotel->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="add-a">
                        <input  type="submit" value="Xóa">
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>

</body>
</html>
