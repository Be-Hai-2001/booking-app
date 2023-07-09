

<div id="div-quick-view" style="display: none">
    <div id="quick-view">

    </div>
    <div class="payment-view">
        <div id="content-quickView" >
            <div class="hoadon">
                <div  style="height:80%;">
                    <img id="room-main" src="" alt="">
                </div>
                <div style="height:20%">
                    ÂCCCACAC
                </div>
            </div>
            {{-- <hr> --}}
            <div class="content">
                <div id="title-room"></div>
                <div style="margin-bottom: 10px"><b style="margin-left:5px;">Diện tích chỗ ở: </b><a id="dientich"></a></div>
                <div style="margin-bottom: 10px"><b style="margin-left:5px">Sức chứa tối đa: </b><a id="sucChua"></a></div>
                <div class="services">
                    <?php for($i=0; $i<6; $i++){ ?>
                        <b class="services_name"></b>
                        <p class="services_content"></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    {{-- <i class="fa-solid fa-circle-xmark"></i> --}}
</div>
{{-- <script src="{{ asset('app/js/display/client/payment.js') }}"></script> --}}
{{-- <div class="services-chil">
    <b>{service_name}</b>
    <a>{service_content}</a>
</div> --}}

<script>
    //Hiển thị dữ liệu loại phòng bằng gizd view
$(function($){
    $(".gidview").on('click', function(){

        $("#div-quick-view").css("display","block");
        $("#div-quick-view").css("visibility","inherit");
       // console.log('1');
        //event.preventDefault();
        var gid = $(this).val();
       console.log(gid);

        $.ajax({
            type:"GET",
            data:{'id':gid},
            url: "/api/getRoomtypeJsonAPI",
            dataType:'json',

        }).then(res=>{
            $.each(res, function(key, val){
             //   document.getElementById("title-room").innerHTML = text.replace("", val.tenLoai);
                document.getElementById("title-room").innerHTML = (val.tenLoai);
                document.getElementById("dientich").innerHTML = (val.dienTich)+" m²";
                document.getElementById("sucChua").innerHTML = (val.sucChuaMax)+" người";
                document.getElementById("room-main").src ="/storage/"+(val.images);
            });
        }).catch(error=>{

        });

    });
});

//Hiển thị dịch vụ phòng
$(function($){
    $(".gidview").on('click', function(){
        var service = $(this).val();

        $.ajax({
            type:"GET",
            data:{'id':service},
            url: "/api/getSeverceRoomApi",
            dataType:'json',

        }).then(res=>{
            var arrName = [];
            var arrContent = [];
            var i = 0;
            $.each(res, function(key, val){
                arrName[i] = (val.tenTienIch);
                arrContent[i] = (val.noiDung);
                i++;
            });

            for(j = 0; j < arrContent.length; j++){
                document.getElementsByClassName('services_name')[j].innerHTML = arrName[j];
                document.getElementsByClassName('services_content')[j].innerHTML = arrContent[j];
            }
        }).catch(error=>{
        });
    });
});
</script>
