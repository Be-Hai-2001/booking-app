@include('admin.layout.update_create_css')

<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images" accept="image/*"><br>
    <label for=""></label>
    @foreach ($room as $room)
        <input type="text" name="roomtype_id" value="{{ $room->id }}">
        <select name="avt" id="">
            <option value="0">Không làm nền</option>
            <option value="1">Dùng làm nền</option>
        </select>
        <input type="hidden" name="hotel_id" value="">
    @endforeach
    <input type="submit">
</form>
