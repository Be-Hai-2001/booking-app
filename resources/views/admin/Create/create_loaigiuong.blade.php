


<form action="{{ route('bedtypes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for=""> Tên loại giường: </label><br>
        <input type="text" name="tenLoai"><br>

        <label for="chuThichSucChua">Chú thích sức chứa:</label><br>
        <input type="text" name = "chuThichSucChua"> <br>
    </div>
    <input type="submit">
</form>
