
<!-- start header -->
<div class="header">
    <div class="backgroundColor">
        <div class="frame">
            <div class="logo">
                <img id="lg-img" src="{{ asset('app/images/logoDulich.png') }}" alt="picture">
            </div>
            <div class="search">
                <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                    <input type="text" placeholder="Bạn muốn đi đâu?" name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="backgroundColor">
        <div class="frame">
            <div class="menu-header">
                <a href="{{ '/' }}">Trang chủ</a>
                <a id="canho" href="">Căn hộ</a>
                <a href="">Khách sạn</a>
                <a id="tindulich" href="">Tin du lịch</a>
                <a href="{{ route('lienHe') }}">Liên hệ</a>
            </div>
            <div class="individual menu">
                <div class="users hidden-repos">
                    {{-- <div class="avt"><img src="#" alt="picture"></div> --}}
                </div>
                <div class="menu login-logout">
                    @guest
                        <a class="a" href="{{ route('login') }}">Đăng nhập</a>
                    @endguest
                    @auth
                    <div style="width:120px">
                        <a class="a-attem">
                            {{ Auth::user()->tenUser}}
                        <a>
                    </div>
                    <div>
                        <form action="{{ route('Logout') }}" method="POST">
                            @csrf
                            <button style="display: block" class="a">Đăng Xuất</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
