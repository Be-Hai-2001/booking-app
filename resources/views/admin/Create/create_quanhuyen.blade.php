
@include('admin.layout.update_create_css')

<a href="{{ route('dashboard') }}">Home</a>

<form action="{{ route('quanhuyens.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Thành phố:
            @error('tenKS')
                <span>{{ $message }}</span>
            @enderror</label><br>
        <select name="thanh_pho_id" id="">
            <option value=""> -- Chọn thành phố -- </option>
            @foreach ($lst as $city)
                <option value="{{ $city->id }}">{{ $city->tenTp }}</option>
            @endforeach
        </select> <br>
        <label for="tenQuanHuyen">Tên Quận - Huyện:
            @error('tenKS')
                <span>{{ $message }}</span>
            @enderror</label><br>
        <input type="text" name = "tenQuanHuyen"> <br>
    </div>
    <input type="submit">
</form>
