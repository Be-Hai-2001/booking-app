@include('admin.layout.update_create_css')

<h1 style="text-align: center">Thêm mới khách sạn</h1>

<form action="{{ route('hotels.update',['hotel'=>$hotel]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div style="display: flex">
        <div style="width:50%">
            <label for="tenKS">Tên khách sạn:</label>
            <input name="tenKS" value="{{ $hotel->tenKS }}"><br>

            <label for="sdt">Số điện thoại:</label>
            <input name="sdt" value="{{ $hotel->sdt }}"><br>

            <label for="tuoiThemGiuong">Tuổi thêm giường từ:</label>
            <input name="tuoiThemGiuong" value="{{ $hotel->tuoiThemGiuong }}"><br>

            <label for="tuoiFree">Số tuổi miễn phí nhỏ hơn :</label>
            <input name="tuoiFree" value="{{ $hotel->tuoiFree }}"><br>

            <label for="soluong_free">Số lượng trẻ em miễn phí:</label>
            <input name="soluong_free" value="{{ $hotel->soluong_free }}"><br>

            <label for="checkinCheckout">Thời gian nhận - trả phòng:</label>
            <input name="checkinCheckout" value="{{ $hotel->checkinCheckout }}"><br>
        </div>

        <div style="width:50%">

            <label for="doiTra">Quy định đổi trả phòng:</label>
            <input name="doiTra" value="{{ $hotel->doiTra }}"><br>

            <label for="soSao">Số sao khách sạn:</label>
            <input name="soSao" value="{{ $hotel->soSao }}"><br>

            <label for="thanhPho">Thành phố:</label>
            <input name="thanhPho" value="{{ $hotel->thanhPho }}"><br>

            <label for="quanHuyen">Quận - Huyện:</label>
            <input name="quanHuyen" value="{{ $hotel->quanHuyen }}"><br>

            <label for="phuongXa">Số nhà - tên đường - Phường:</label>
            <input name="phuongXa" value="{{ $hotel->phuongXa }}"><br>

            <div class="radio">
                <input type='radio' name='trangThai' value="1" checked> Hoạt động
                <input type='radio' name='trangthai' value="0"> Ngưng hoạt động
            </div>
        </div>
    </div>

    <input type="submit">
  </form>



