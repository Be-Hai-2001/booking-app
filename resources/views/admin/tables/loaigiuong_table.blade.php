

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
        background: aliceblue;
        border: none;
        box-shadow: 5px -2px 11px 2px;
    }
    .create a {
        color: navy;
        font-weight: bold;
    }

    .id-bed{
       width: 10%;
   }

    .tenKS-bed , .setting-bed{
       width: 15%;
   }
   .nd-bed{
       width: 60%;
       overflow: auto;
   }

</style>
<body>

   <div class="table bed">
       <div class="create"><a href="{{ route('bedtypes.create') }}">Thêm loại giường</a></div>
       <div class="title">
           <div class="id-bed">ID</div>
           <div class="tenKS-bed">Tên loại giường</div>
           <div class="nd-bed">Chú thích sức chứa</div>
           <div class="setting-bed">Chức năng</div>
           <div></div>
       </div>
   @foreach ($bed as $bed)

       <div class="content" style="height: 5rem">
           <div class="id-bed">{{ $bed->id }}</div>
           <div class="tenKS-bed">{{ $bed->tenLoai }}</div>
           <div class="nd-bed">{{ $bed->chuThichSucChua }}</div>
           <div class="setting-bed">
               <a href="">Sửa</a>
               <a href="#">Xóa</a>
           </div>
       </div>
   @endforeach
   </div>

</body>

