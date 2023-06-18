@include('admin.layout.update_create_css')
<h1 style="text-align: center">Thêm mới tiện ích khách sạn</h1>

<form action="{{ route('servicehotels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: flex ; justify-content: center">
        <div style="width:20%">
            <label for="hotel_id"> Tên khách sạn: </label>
            @error('hotel_id')
                <a style="color:red"> {{ $message }} </a>
            @enderror

            <select name="hotel_id">
                <option value="">-- Chọn khách sạn --</option>
                @foreach ($lst as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->tenKS }}</option>
                @endforeach
            </select> <br>

            <label for="tenTienIch"> Tên tiện ích: </label>
            @error('tenTienIch')
                <a style="color:red"> {{ $message }} </a>
            @enderror

            <input name="tenTienIch"><br>
        </div>

        <div style="width:50%">
            <label for="noiDung">Nội dung:</label>
            @error('noiDung')
            <a style="color:red"> {{ $message }} </a>
            @enderror
            <textarea class="ckeditor form-control" name="noiDung"></textarea><br>
        </div>
    </div>

    <input type="submit">

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('noidung');
    </script>
  </form>



