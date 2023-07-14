@include('admin.layout.update_create_css')

<a href="{{ route('dashboard') }}">Home</a>

<form action="{{ route('phuongxas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Quận - Huyện:
            @error('quan_huyen_id')
                <span>{{ $message }}</span>
            @enderror
        </label><br>
        <select name="quan_huyen_id" id="">
            <option value=""> -- Chọn quận - huyện -- </option>
            @foreach ($lst as $district)
                <option value="{{ $district->id }}">{{ $district->tenQuanHuyen }}</option>
            @endforeach
        </select> <br>
        <label for="tenPhuongXa">Địa chỉ - phường||xã:
            @error('tenPhuongXa')
                <span>{{ $message }}</span>
            @enderror</label><br>
        <input type="text" name="tenPhuongXa"> <br>
    </div>
    <input type="submit">
</form>
