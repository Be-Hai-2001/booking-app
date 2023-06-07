@include('admin.layout.update_create_css')
<h1 style="text-align: center">Thêm mới tiện ích loại phòng</h1>

<form action="{{ route('servicerooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: flex ; justify-content: center">
        <div style="width:20%">
            <label for="roomtype_id"> Tên loại phòng: </label>
            <select name="roomtype_id">
                <option value="">-- Chọn khách sạn --</option>
                @foreach ($lst as $room)
                    <option value="{{ $room->id }}">{{ $room->tenLoai }}</option>
                @endforeach
            </select> <br>

            <label for="tenTienIch"> Tên tiện ích: </label>
            <input name="tenTienIch"><br>
        </div>

        <div style="width:50%">
            <label for="noiDung">Nội dung:</label>
            <textarea class="ckeditor form-control" name="noiDung"></textarea><br>
        </div>
    </div>

    <input type="submit">

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('noidung');
    </script>
  </form>



