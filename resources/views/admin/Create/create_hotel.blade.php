@include('admin.layout.update_create_css')
<h1 style="text-align: center">Thêm mới khách sạn</h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<a href="{{ route('dashboard') }}">Home</a>
<form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display: flex">
        <div style="width:50%">
            <label for="tenKS">Tên khách sạn: 
                @error('tenKS')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="tenKS"><br>
            {{-- @if ($errors->has('tenKS')){{$errors->first('tenKS')}}<br>@endif --}}

            <label for="sdt">Số điện thoại:
                @error('sdt')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="sdt"><br>

            <label for="tuoiThemGiuong">Tuổi thêm giường từ:
                @error('tuoiThemGiuong')
                <span>{{ $message }}</span>
            @enderror
            </label>
            <input name="tuoiThemGiuong"><br>

            <label for="tuoiFree">Số tuổi miễn phí nhỏ hơn :
                @error('tuoiFree')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="tuoiFree"><br>

            <label for="soluong_free">Số lượng trẻ em miễn phí:
                @error('soluong_free')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="soluong_free"><br>

            <label for="checkinCheckout">Thời gian nhận - trả phòng:
                @error('checkinCheckout')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="checkinCheckout"><br>


            <label for="doiTra">Quy định đổi trả phòng:
                @error('doiTra')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="doiTra"><br>

            <label for="soSao">Số sao khách sạn:
                @error('soSao')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <input name="soSao"><br>
        </div>

        <div style="width:50%">
            <div>
                <label for="content">Nội dung:</label>
                <textarea class="ckeditor form-control" name="content"></textarea><br>
            </div>

            <label for="thanhPho">Thành phố:
                @error('tenKS')
                <span>{{ $message }}</span>
            @enderror
            </label>
            <select name="thanhPho" id="thanhPho" class="thanhPho">
                <option value=""> -- Chọn tỉnh || thành phố --</option>
                @foreach ($city as $city)
                    <option value="{{ $city->id }}">{{ $city->tenTp }}</option>
                @endforeach
            </select><br>

            <label for="quanHuyen">Quận - Huyện:
                @error('quanHuyen')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <select name="quanHuyen" id="quanHuyen" class="quanHuyen">
                <option value="">-- Chọn quận || huyện --</option>
                {{-- @foreach ($district as $district)
                    <option value="{{ $district->id }}">{{ $district->tenQuanHuyen }}</option>
                @endforeach --}}
            </select><br>

            <label for="phuongXa">Số nhà - tên đường - Phường:
                @error('phuongXa')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <select name="phuongXa" id="phuongXa" class="phuongXa">
                <option value="">-- Địa chỉ --</option>
            </select>

            <div class="radio">
                <input type='radio' name='trangThai' value="1" checked> Hoạt động
                <input type='radio' name='trangthai' value="0"> Ngưng hoạt động
            </div>
        </div>
    </div>
    <input type="submit">
  </form>

  {{-- Thành phố lấy quận --}}
  <script>
    $(document).ready(function(){
            $(document).on('change' , '.thanhPho' , function(){
                var city_id = $(this).val();

                var div =  $(this).parent();
                var op = " ";

                $.ajax({
                    type: 'GET',
                    url: '{!! URL::to('finCity') !!}',
                    data:{'id':city_id},
                     success: function(data){
                        console.log(data);
                        op+='<option value="0" select disabled>-- Chọn quận || huyện --</option>';
                        for(var i=0; i<data.length; i++){
                            op+= '<option value="'+data[i].id+'">'+data[i].tenQuanHuyen+'</option>';
                            //console.log(data[i]);
                        }
                        div.find('.quanHuyen').html(" ");
                        div.find('.quanHuyen').append(op);
                    },
                    error: function(){

                    },
                });
            });
    });
  </script>

  {{-- quận lấy phường --}}
  <script>
    $(document).ready(function(){
        $(document).on('change' , '.quanHuyen' , function(){
            var district_id = $(this).val();

            var div =  $(this).parent();
            var op = " ";
                console.log(district_id);
                $.ajax({
                    type: 'GET',
                    url: '{!! URL::to('finDistrict') !!}',
                    data:{'id':district_id},
                //     // dataType:'json',
                     success: function(data){
                         console.log(data);

                        op+='<option value="0" select disabled>-- Địa chỉ --</option>';
                        for(var i=0; i<data.length; i++){
                            op+= '<option value="'+data[i].id+'">'+data[i].tenPhuongXa+'</option>';
                            console.log(data[i]);
                        }
                        div.find('.phuongXa').html(" ");
                        div.find('.phuongXa').append(op);
                    },
                    error: function(){

                    },
                });
            });
    });
  </script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content');
</script>


