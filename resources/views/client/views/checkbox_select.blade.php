{{-- @extends('client.views.selected') --}}

    <div id="check" style="display: flex">
        <div>
            <div class="address-of-area" style="margin-top: 3rem">
                <div><b style="margin-right: 10px;"> <i class="fa-solid fa-layer-group" style="color:rgb(33, 150, 243); font-size:1.5rem"></i> Lựa chọn theo vùng</b></div>
                <hr>
                <div class="group-check">
                    @foreach ($areas as $area)
                        <input type="checkbox" class="check-district" value="{{ $area->quan_huyen_id }}"> {{ $area->tenQuanHuyen }}<p class='bottom'></p>
                    @endforeach
                        <div style="text-align: center; margin-top:2.5rem; margin-bottom: 5rem">
                            <button id="uncheck-all" >
                                Bỏ Chọn
                            </button>
                        </div>
                </div>
            </div>
            <div class="promote-of-area" style="margin-top: 3rem">
                <div><b><i class="fa-solid fa-scale-balanced" style="color:rgb(33, 150, 243); font-size:1.5rem"></i> Ưu đãi</b></div>
                <hr>
                <input type="checkbox"> nội dung
            </div>
            <div class="star" style="margin-top: 3rem">
                <div><b><i class="fa-solid fa-street-view" style="color:rgb(33, 150, 243); font-size:1.5rem"></i> Xếp hạng chỗ nghĩ</b></div>
                <hr>
                <div>
                    <input type="checkbox">
                        <i class="fa-solid fa-star"></i>
                    <p class='bottom'></p>
                    <input type="checkbox">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    <p class='bottom'></p>
                    <input type="checkbox">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    <p class='bottom'></p>
                    <input type="checkbox">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    <p class='bottom'></p>
                    <input type="checkbox">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    <p class='bottom'></p>
                </div>
            </div>
        </div>
        {{-- <hr style="margin: 0px; margin-top: 3rem"> --}}
    </div>
    {{-- <hr style="margin: 0px; margin-left:"> --}}

{{-- <script>

</script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('app/js/display/client/change_check.js') }}"></script>

<div class="Object_append" style="display: none">
    <div class=" Object" >
        <div class="image">
            {{-- dd({{ $hotel->images }}); --}}
            <img class="edit-img" src="/storage/{hotel_img}" alt="Lỗi load">
        </div>
        <div class="content-select">
        <div class="name" style="height:20%"><h1 style="  text-shadow: 2px 2px 4px #000000;" class="blue"><a href="/booking/detail/{hotel_id}">{hotel_tenKs}</a></h1></div>
        <div class="address" style="height:10%; font-size:18px">
             <b>Địa chỉ: </b>{hotel_phuong}, {hotel_quan}, {hotel_huyen}
        </div>
        <div class="type" style="height:10%; font-size:18px">
            <b>Quy định:</b> {hotel_checkinCheckout}
        </div>
        <div class="content-object" style="height:60%">{hotel_content}</div>
        </div>
    </div>
</div>

