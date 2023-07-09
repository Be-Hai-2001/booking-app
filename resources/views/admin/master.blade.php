<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('app/css/admin/main.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('app/images/logoDulich.ico') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Booking App</title>
</head>

<body id="body-admin">

    <div style="display: flex">
        <header class="admim-header">
            <div class="admin-app">
               <div style="display: flex; justify-content: center;">
                    <div><img style="width:8rem" src="{{asset('app/images/logoDulich.png')}}" alt=""></div>
                    <div id="title-imglog"><b> Admin Page <br> Happy Trevel </b></div>
               </div>
            </div>
            <div class="admin-button-list">
                <div class="cl-btn">
                    <button> <i class="fa-solid fa-gauge"></i> <a href="{{ route('dashboard') }}"> Dashboard </a></button>
                </div>
                <div class="cl-btn">
                    <button onclick="handelOnclickTable('btn-table') "> <i class="fa-solid fa-layer-group"></i> Tables </button>
                    <div class="table" id="btn-table" style="display: none">
                        <i class="fa-solid fa-hotel"></i> <a href="{{ route('admin-hotel') }}"> Table Hotel </a> <br>
                        <i class="fa-solid fa-people-roof"></i> <a href="{{ route('admin-roomtype' )}}"> Table Roomtype </a> <br>
                        <i class="fa-brands fa-ups"></i> <a href="""> Tabel Service</a> <br>
                        <i class="fa-solid fa-street-view"></i> <a href="{{ route('admin-address' )}}"> Table Address </a> <br>
                    </div>
                </div>

                <div class="cl-btn">
                    <button onclick="handelOnclickBilling('admin-billing')"> <i class="fa-solid fa-file-invoice-dollar" style="padding-left: 1.3rem; padding-right: 1.3rem;"></i> Billing </button>
                    <div class="table" id="admin-billing" style="display: none; margin-top:1rem">
                        <i class="fa-brands fa-hornbill"></i> <a href="{{ route('getAllBill') }}"> Bill </a> <br>
                        <i class="fa-regular fa-message"></i> <a href="{{ route('getAllFeedback' )}}"> Feedback </a> <br>
                        <i class="fa-regular fa-rectangle-xmark"></i> <a href="{{ route('getAllCancelReservation') }}"> Cancel Reservation </a> <br>
                    </div>
                </div>

                <div class="cl-btn">
                    <button> <i class="fa-solid fa-id-card-clip"></i> <a style="text-decoration: none" href=" {{ route('admin-profile') }} "> Profile </a> </button>
                </div>
                <div class="cl-btn">
                    <button onclick="handelOnclickDiagram('admin-diagram')"> <i class="fa-solid fa-chart-line"></i> Diagram </button>
                    <div class="table" id="admin-diagram" style="display: none; margin-top:1rem">
                        <i class="fa-solid fa-hotel"></i> <a href="{{ route('admin-hotel') }}"> Hotel Statistics </a> <br>
                        <i class="fa-solid fa-cart-shopping"></i> <a href="{{ route('admin-roomtype' )}}"> Payment Statistics </a> <br>
                        <i class="fa-solid fa-user-clock"></i> <a href="""> User Statistics </a> <br>
                        <i class="fa-solid fa-chart-pie"></i> <a href="{{ route('admin-address' )}}"> Revenue Statistics </a> <br>
                    </div>
                </div>
            </div>
        </header>

        <main style="width:80%">

            @yield('main-admin')

        </main>

        {{-- @include('') --}}

    </div>

</body>

<script src="{{ asset("app/js/display/admin/main.js") }}"></script>

</html>
