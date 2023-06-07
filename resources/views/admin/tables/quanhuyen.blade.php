

<style>
    .table{
    margin: auto 40px;
    width: auto;
    }
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
        width: 14.5rem;
        border-radius: 7px;
        background: red;
        border: none;
        box-shadow: 5px -2px 11px 2px;
    }
    .create a {
        color: navy;
        font-weight: bold;
    }

    .id-district{
       width: 10%;
   }

    .tenKS-district , .setting-district{
       width: 15%;
   }
   .nd-district{
       width: 60%;
       overflow: auto;
   }

</style>
<body>

   <div class="table district">
       <div class="create"><a href="{{ route('quanhuyens.create') }}">Thêm Quận - Huyện</a></div>
       <div class="title">
           <div class="id-district">ID</div>
           <div class="tenKS-district">Thành phố ID</div>
           <div class="nd-district">Quận - Huyện</div>
           <div class="setting-district">Chức năng</div>
           <div></div>
       </div>
   @foreach ($district as $district)

       <div class="content" style="height: 5rem">
           <div class="id-district">{{ $district->id }}</div>
           <div class="tenKS-district">{{ $district->thanh_pho_id }}</div>
           <div class="nd-district">{{ $district->tenQuanHuyen }}</div>
           <div class="setting-district">
               <a href="">Sửa</a>
               <a href="#">Xóa</a>
           </div>
       </div>
   @endforeach
   </div>

</body>

