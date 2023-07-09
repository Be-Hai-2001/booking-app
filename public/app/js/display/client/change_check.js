$(function($){

    var arr = [];
    // var obj = " ";
    $(".group-check .check-district").on('click', function(){

        if($(this).is(":checked")){
            arr.push($(this).val());
            // console.log(arr);
        }
        else{
            arr.pop($(this).val());
        }

        if(arr.length > 0){
            $.ajax({

                type:'GET',
                url:"/api/checkSelectAPI",
                data:{'data':arr},
                dataType: "json",

            }).then( res => {
                var parent = $("#select");
                $(parent).empty();


                $.each(res, function(key ,val) {
                    //console.log(val.images);

                    $child = $(".Object_append").children().prop("outerHTML");

                    $child = $child.replace('{hotel_img}', val.images)
                        .replace('{hotel_tenKs}', val.tenKS)
                        .replace('{hotel_phuong}', val.tenPhuongXa)
                        .replace('{hotel_quan}', val.tenQuanHuyen)
                        .replace('{hotel_huyen}', val.tenTp)
                        .replace('{hotel_checkinCheckout}', val.checkinCheckout)
                        .replace('{hotel_content}', val.content)
                        .replace('{hotel_id}', val.hotel_id);

                    $(parent).append($child);


                });

            }).catch(error => {

            });

        }
        else{
            window.location.reload();
        }

    //    console.log(arr);
    });
});

$(function($){
    $("#uncheck-all").on('click', function(){
        let arr = document.getElementsByClassName('check-district');
        for(i=0; i<arr.length; i++){
            arr[i].checked = false;
        }
        window.location.reload();
    });
});
