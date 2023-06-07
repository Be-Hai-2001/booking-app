

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

    .id-ward{
       width: 10%;
   }

    .tenKS-ward , .setting-ward{
       width: 15%;
   }
   .nd-ward{
       width: 60%;
       overflow: auto;
   }

</style>
<body>

   <div class="table ward">
       <div class="create"><a href="{{ route('phuongxas.create') }}">Thêm Phường - Xã</a></div>
       <div class="title">
           <div class="id-ward">ID</div>
           <div class="tenKS-ward">Quận - Huyện ID</div>
           <div class="nd-ward">Phường - Xã</div>
           <div class="setting-ward">Chức năng</div>
           <div></div>
       </div>
   @foreach ($ward as $ward)

       <div class="content" style="height: 5rem">
           <div class="id-ward">{{ $ward->id }}</div>
           <div class="tenKS-ward">{{ $ward->quan_huyen_id }}</div>
           <div class="nd-ward">{{ $ward->tenPhuongXa }}</div>
           <div class="setting-ward">
               <a href="">Sửa</a>
               <a href="#">Xóa</a>
           </div>
       </div>
   @endforeach
   </div>

</body>

