

<style>

    .title{
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1.2rem;
        border-style: inset;
        text-align: center;
        color: red;
        height: auto;
    }
    .content{
        display: flex;
        justify-content: space-between;
        border-style: outset;
        text-align: center;
        color: black;
    }
    .create{
        text-align: center;
        font-size: x-large;
        margin: 2rem auto;
        width: 13.5rem;
        border-radius: 7px;
        background: red;
        border: none;
        box-shadow: 5px -2px 11px 2px;
    }
    .create a {
        color: navy;
        font-weight: bold;
    }
     .id-service{
        width: 10%;
    }

     .tenKS-service , .setting-service{
        width: 15%;
    }
    .nd-service{
        width: 60%;
        overflow: auto;
    }

</style>
<body>

    <div class="table service">
        <div class="create"><a href="{{ route('servicehotels.create') }}">Tiện ích khách sạn</a></div>
        <div class="title">
            <div class="id-service">ID</div>
            <div class="tenKS-service">ID khách sạn</div>
            <div class="nd-service">Nội dung</div>
            <div class="setting-service">Chức năng</div>
            <div></div>
        </div>
    @foreach ($serviceHotel as $service)

        <div class="content" style="height: 5rem">
            <div class="id-service">{{ $service->id }}</div>
            <div class="tenKS-service">{{ $service->hotel_id }}</div>
            <div class="nd-service">{{ $service->noiDung }}</div>
            <div class="setting-service">
                <a href="">Sửa</a>
                <a href="#">Xóa</a>
            </div>
        </div>
    @endforeach
    </div>

</body>

