@include('admin.layout.update_create_css')

<form action="{{ route('roomtypes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:flex">
       <div style="width:50%">
            <label for="hotel_id">Khách sạn:</label><br>
            <select name="hotel_id" id="">
                <option value=""> -- Chọn khách Sạn -- </option>
                @foreach ($hotel as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->tenKS }}</option>
                @endforeach
            </select> <br>

            <label for="">Loại giường:</label><br>
            <select name="loai_giuong_id" id="">
                <option value=""> -- Chọn loại giường -- </option>
                @foreach ($bed as $bed)
                    <option value="{{ $bed->id }}">{{ $bed->tenLoai }}</option>
                @endforeach
            </select> <br>

            <label for="tenLoai">Tên loại phòng:</label><br>
            <input type="text" name="tenLoai"> <br>

            <label for="tenLoai">Số lượng loại phòng:</label><br>
            <input type="text" name="sl_roomtype"> <br>

            <label for="slGiuongThem">Số lượng extra bed tối đa:</label><br>
            <input type="text" name="slGiuongThem"> <br>

            <label for="giaThemGiuong">Giá thêm giường:</label><br>
            <input type="text" name="giaThemGiuong"> <br>

            <label for="giaLoaiPhong">Giá loại phòng:</label><br>
            <input type="text" name="giaLoaiPhong"> <br>

            <label for="dienTich">Diện tích phòng:</label><br>
            <input type="text" name="dienTich"> <br>
       </div>

        <div style="width:50%">
            <div>
                <label for="content">Nội dung:</label>
                <textarea class="ckeditor form-control" name="content"></textarea><br>
            </div>

            <label for="type">Chọn loại:</label><br>
            <Select name="type">
                <option value="">-- Chọn loại --</option>
                <option value="Khách Sạn">Khách sạn</option>
                <option value="Căn hộ">Căn hộ</option>
            </Select>

            <label for="sucChuaMax">Sức chứa tối đa:</label><br>
            <input type="text" name="sucChuaMax"> <br>

            <input type="hidden" name="hienThi" value="0"> <br>

            <input type="hidden" name="trangThai" value="1"> <br>
        </div>
    </div>
    <input type="submit">
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content');
</script>
