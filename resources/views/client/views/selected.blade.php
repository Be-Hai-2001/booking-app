@extends('client.master')

@section('main')
    <div class="frame check" style="align-items:flex-start;">
        <div id="area">
              @include('client.views.checkbox_select')
        </div>
        <div id="select">
            @foreach ($hotels as $hotel)
                <div class="Object">
                    <div class="image">
                        {{-- dd({{ $hotel->images }}); --}}
                        <img class="edit-img" src="{{asset('storage')}}/{{ $hotel->images }}" alt="Lỗi load">
                    </div>
                    <div class="content-select">
                    <div class="name" style="height:20%"><h1 style="  text-shadow: 2px 2px 4px #000000;" class="blue"><a href="/booking/detail/{{ $hotel->id }}">{{ $hotel->tenKS }}</a></h1></div>
                    <div class="address" style="height:10%; font-size:18px">
                         <b>Địa chỉ: </b>{{ $hotel->tenPhuongXa }}, {{ $hotel->tenQuanHuyen }}, {{ $hotel->tenTp }}
                    </div>
                    <div class="type" style="height:10%; font-size:18px">
                        <b>Quy định:</b> {{ $hotel->checkinCheckout }}
                    </div>
                    <div class="content-object" style="height:60%">{!!$hotel->content!!}</div>
                    </div>
                </div>
            @endforeach
            <div>
                {{  $hotels->links()  }}
            </div>
        </div>
    </div>


    <script src="{{ asset('app/js/selected.js') }}"></script>
@endsection
