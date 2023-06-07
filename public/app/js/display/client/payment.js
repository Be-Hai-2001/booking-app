
// Hàm tính tiền một khách sạn
function payment(){

    //Giá phòng
    var price_roomtype = document.getElementsByClassName('price_roomtype');
    //Số lượng phòng
    var number_roomtybe = document.getElementsByClassName('number_roomtybe');
    //Số đêm
    var number_night = document.getElementById('number_night');
    //Số giường thêm
    var number_extraBed = document.getElementsByClassName('number_extraBed');
    //Giá giường thêm
    var price_extrabed = document.getElementsByClassName('price_extraBed');
    //Đơn giá
    var donGia = document.getElementsByClassName('donGia');
    var donGia_roomtype = document.getElementsByClassName('donGia_roomtype');

    //Số lượng sql
    var sql = document.getElementsByClassName('sl-sql');

    var price = 0;
    var slluu = 0;

    for(i=0 ; i <price_roomtype.length; i++){
        // Đơn giá = loại phòng * số  đêm * số lượng loại + ( extraBed * số lượng )
        var price = price_roomtype[i].value * number_night.value * number_roomtybe[i].value + ( price_extrabed[i].value * number_extraBed[i].value);
        //console.log(( price_extrabed[i].value * number_extraBed[i].value));

        document.getElementsByClassName('donGia_roomtype')[i].setAttribute('value', price);
        donGia[i].innerHTML = (price)+'VND';

        // slluu = sql[i].value - number_roomtybe[i].value;
        // console.log(slluu);

        // document.getElementsByClassName('donGia_roomtype')[i].setAttribute('value', price);
    }
}

payment();

// // Thêm cart lỗi chưa làm xong
function addToCart(event){

    event.preventDefault();

    //console.log('khoa bú win');
    let urlCart = $(this).data('url')
    //alert(url);

    $.ajax({
        type:"GET",
        url: urlCart,
        dataType:'json',
        success: function(data){
            //console.log(data);
        },
        error: function(){

        },
    });
}

$(function($){
    $(".add_to_cart").on('click',addToCart)
});




