


<form action="{{ route('quanhuyens.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Thành phố:</label><br>
        <select name="thanh_pho_id" id="">
            <option value=""> -- Chọn thành phố -- </option>
            @foreach ($lst as $city)
                <option value="{{ $city->id }}">{{ $city->tenTp }}</option>
            @endforeach
        </select> <br>
        <label for="tenQuanHuyen">Tên Quận - Huyện:</label><br>
        <input type="text" name = "tenQuanHuyen"> <br>
    </div>
    <input type="submit">
</form>
