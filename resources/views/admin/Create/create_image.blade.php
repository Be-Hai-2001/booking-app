@include('admin.layout.update_create_css')

<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images" accept="image/*"><br>
    <label for=""></label>
    @foreach ($hotel as $hotel)
        <input type="text" name="hotel_id" value="{{ $hotel->id }}">
        <select name="avt" id="">
            <option value="0">Không dùng làm ảnh bìa</option>
            <option value="1">Hiển thị ảnh bìa</option>
        </select>
        <input type="hidden" name="roomtype_id" value="">
    @endforeach
    <input type="submit">
</form>
