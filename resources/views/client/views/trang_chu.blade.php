@extends('client.master')

@section('main')

    <div>
        {{-- Section 1 --}}
        <div class="display" id="chage-bacgr" style="background:#f0e4fe">
            <div class="home-client">
                <div style="height: 400px">
                    <img id="chage-img" src="./app/images/uudai.png" alt="">
                </div>
            </div>
        </div>

        {{-- Section 2 --}}
        <form action="{{ route('selected') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="display checkin-checkout">
                <div class="home-client ">
                   <div class="menu-trangchu txt-input-check">
                        <div class="check-adress">
                            <b >Địa điểm:</b><br><select name="tenTp" class="edit-tool">
                                        @foreach ($address as $address)
                                            <option value="{{ $address->id }}">{{ $address->tenTp }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="check-in">
                            <b>Nhận phòng:</b><br><input type="date" name = "checkin" class="edit-tool">
                        </div>
                            <div class="check-in">
                                <b>Trả phòng:</b><br><input type="date" name="checkout" class="edit-tool">
                            </div>
                        <div class="check-people">
                            <b style="font-size: 20px; margin-right:5px; margin-bottom: 10px">Số người:</b>
                            <div id="btn-check"  onmouseover="checkHinden()" onclick="dbcheckHinden()" style="color: black; font-size:20px">1 người lớn</div>
                        </div>
                         <button class="search-icon"><i class="fa-solid fa-magnifying-glass-location"></i></button>
                        {{-- <input type="submit"> --}}
                        {{-- <a href="booking/{{ $address->id }}" class="search-icon"><i class="fa-solid fa-magnifying-glass-location"></i></a> --}}
                        <!-- Seclect Number people -->
                        <div id="hinden-people" style="text-align: start">
                            <div>
                                Người lớn:<input type="number" min="1" name="adult">
                            </div>
                            <div style="background: rgb(33, 150, 243)">
                                Trẻ em dưới 12 tuổi: <input type="number" min="1" style="background: rgb(33, 150, 243)" name="children">
                            </div>
                            <div>
                                Trẻ em dưới 4 tuổi: <input type="number" min="1" name="young">
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </form>
        {{-- Section 3 --}}
        <div class="top-booking">
            <div class="txt">   Các điểm thu hút khách nhất Việt Nam    </div>
            <div class="container-div">
                <div class="top home-client menu-trangchu" style="margin-bottom: 30px;">
                    <div class="top1">
                        <button>Thành Phố Hồ Chí Minh</button>
                    </div>
                    <div class="top2">
                       <button> Thủ Đô Hà Nội </button>
                    </div>
                </div>
                <div class="bottom home-client menu-trangchu">
                    <div class="top3">
                       <button> Thành Phố Đà Lạt</button>
                    </div>
                    <div class="top2">
                        <button>Thành Phố Vũng Tàu</button>
                    </div>
                    <div class="top1">
                        <button>Thành Phố Đà Nẵng</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 4 --}}

    <div class="top-booking" style="background-color: rgb(33, 150, 243); height:35rem">
            <div class="txt" style="padding-top: 3rem;">   Ưu đãi trong tuần   </div>
            @include('slick.slide')
        </div>

        {{-- Section 5 --}}
        <div class="top-booking">
            <div class="txt">   Khách sạn nổi bậc   </div>
            <section class="splide edit-slide" aria-label="Restriction Example" style="height: 30rem;">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($isfloat as $float)
                                <li class="splide__slide">
                                    <div class="size-img">
                                        <img id="chage-img" style="width: 45rem; height: 29.5rem;" src="{{asset('storage')}}/{{ $float->images }}" alt="">
                                    </div>
                                    <div class="content font-18">
                                        <p class="tenKS">{{ $float->tenKS }}</p>
                                        @for($i = 0; $i < $float->soSao; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                        <p><b>Địa chỉ: </b>{{ $float->tenPhuongXa }}, {{ $float->tenQuanHuyen }}, {{ $float->tenTp }}</p>
                                        <div><b>Giới thiệu: </b><div>{!! $float->content !!}</div></div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </section>
        </div>
        <script src="./lib/slider/js/splide.min.js"></script>
        <script>
            var splide = new Splide('.splide', {
                type: 'loop',
                // perPage: 3,
                // focus: 0,
            });
            splide.mount();
        </script>

        <div class="top-booking">
            <div class="txt">  Đối tác </div>

        </div>
    </div>


    <script src="./app/js/display/client/trangchu.js"></script>
@endsection





