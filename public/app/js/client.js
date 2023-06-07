function frame(){
    let flat = document.getElementsByClassName('frame');
    let backgroundColor = document.getElementsByClassName('backgroundColor');
    for(i=0; i<flat.length; i++){
        switch(i){
            case 0: flat[0].style.height = '75px';

            case 1: flat[1].style.height = '70px';
                    backgroundColor[1].style.backgroundColor="#2196F3"; break;

            case 2: flat[2].style.height = 'auto'; //25em
                    backgroundColor[2].style.backgroundColor="gray"; break;
        }
    }
}

frame();

let visibleQuickView = document.getElementById('div-quick-view');
let QuickView = document.getElementById('quick-view');

QuickView.onclick = function(){
    visibleQuickView.style.visibility = 'hidden';
}

//On click chuyển ảnh
function replaceImg(id){
    let img = document.getElementById(id).getAttribute('src');
    document.getElementById('replace-main').setAttribute('src',img);
}

//Hiển thị dữ liệu loại phòng bằng gizd view
$(function($){
    $(".gidview").on('click', function(){

        $("#div-quick-view").css("display","block");
        $("#div-quick-view").css("visibility","inherit");
       // console.log('1');
        //event.preventDefault();
        var gid = $(this).val();
       // console.log(gid);

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
// $(function($){
//     $(".gidview").on('click',function(){

//     });
// })
