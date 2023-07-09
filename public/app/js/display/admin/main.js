let click = false;
let click2 = false;
let click3 = false;

function handelOnclickTable (id) {

    if(click == false){
        click = true;
        document.getElementById(id).style.display = "block";
    }
    else {
        click = false;
        document.getElementById(id).style.display = "none";
    }
    // document.getElementById(id)
}

function handelOnclickDiagram (id) {

    if(click2 == false){
        click2 = true;
        document.getElementById(id).style.display = "block";
    }
    else {
        click2 = false;
        document.getElementById(id).style.display = "none";
    }
    // document.getElementById(id)
}
function handelOnclickBilling (id) {

    if(click3 == false){
        click3 = true;
        document.getElementById(id).style.display = "block";
    }
    else {
        click3 = false;
        document.getElementById(id).style.display = "none";
    }
    // document.getElementById(id)
}
// alert(1);

// Click profile
$(function($) {
    $(".switch-check-profile").on("click", function() {
        
        let id = $(this).val();
        var url = "/api/admin/update-trang-thai-user/" + id;
        console.log(url);
        
        if($(this).is(":checked")){
            // Update từ hoạt động => không hoạt động
            $.ajax({
                type:"PUT",
                url: url,
                data: {
                    // 'id':id,
                    'trangThai': 1
                },
                dataType:"json"
            });
        }
        else{
            console.log('false');
            // Update từ không hoạt động => hoạt động
            $.ajax({
                type:"PUT",
                url:url,
                data: {
                    // 'id':id,
                    'trangThai': 0
                },
                dataType:"json"
            });
        }

    });

    // Xuất trạng thái ra màn hình
    // $.ajax({
    //     type:"GET",
    //     url:"/api/admin/get-user-all",
    //     dataType:"json"
    // }).then(function(res) {

    // });
});

function onLoadUser(){
    var check = document.getElementsByClassName('switch-check-profile');
    var stt = document.getElementsByClassName('stt-user');
    for(i=0; i<stt.length; i++) {
        console.log(stt[i].value);

        if(stt[i].value == 1) {
            // trạng thái hoạt động
            check[i].checked = true;
            
        }
        else if(stt[i].value == 0){
            // trạng thái không hoạt động
            check[i].checked = false;
        }
    }
}

onLoadUser();
