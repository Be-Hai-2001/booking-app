@extends('client.master')

@section('main')
<style>
    .box-shadow-contact{
        padding: 2%;
        margin: 2% 0%;
        box-shadow: 0px 0px 10px 1px #dcdcdc;
        display: flex;
        justify-content: space-between;
        font-size: 1.5rem;
    }
    .fa-solid{
        font-size: 3.5rem;
    }
    b{
        font-size:1.5rem;
    }
    .box-shadow-contact:hover{
        background-color: rgb(33, 150, 243);
        color: white;
    }
</style>
<main>
    <div class="container-fluid">
        <section>
                <div class="row">
                    <div class="col-sm-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2624367268368!2d106.68320031474906!3d10.791200892311494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d2de44a76b%3A0xdd27048433130eda!2zNjAvNTMgTMO9IENow61uaCBUaOG6r25nLCBQaMaw4budbmcgOCwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1623993793395!5m2!1svi!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
        </section>
        <div style="margin: auto 22rem;">
            <div id="menu-contact" class="box-shadow-contact">
                <div style="width:40%; display:flex; margin-left:40px;line-height: 30px; font-size: 1.2rem;">
                    <i class="fa-solid fa-location-dot"></i>
                    <div style=" margin-left:15px">
                        <b>Địa chỉ</b> <br>
                        <a href="#">60/53 Lý Chính Thắng, Phường Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh</a>
                    </div>
                </div>
                <div style="width:30%; display:flex; margin: 0 5rem; line-height: 30px; font-size: 1.2rem;">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <div style=" margin-left:15px">
                        <b>Email</b> <br>
                        <a href="#">0306201123@caothang.edu.vn</a><br>
                        <a href="#">0306201194@caothang.edu.vn</a>
                    </div>
                </div>
                <div style="width:25%; display:flex; line-height: 30px; font-size: 1.2rem;">
                    <i class="fa-solid fa-headset"></i>
                    <div style=" margin-left:15px">
                        <b>Hotline</b>
                    </div>
                </div>
            </div>
            <div id="contact-form" class="box-shadow-contact">
                {{-- <form action="">
                    <div class="left"></div>
                    <div class="right"></div>
                    <button> Thực hiện </button>
                </form> --}}
                Gửi phản hồi khách sạn
            </div>
            <div id="destroy-booking" class="box-shadow-contact">
                Hủy đặt phòng
            </div>
            <div id="search-hoadon" class="box-shadow-contact">
                Tra cứu hóa đơn đặt phòng
            </div>
        </div>
    </div>
</main>

@endsection
