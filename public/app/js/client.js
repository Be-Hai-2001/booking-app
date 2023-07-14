function frame(){
    let flat = document.getElementsByClassName('frame');
    let backgroundColor = document.getElementsByClassName('backgroundColor');
    for(i=0; i<flat.length; i++){
        switch(i){
            case 0: flat[0].style.height = '75px';

            case 1: flat[1].style.height = '70px';
                    backgroundColor[1].style.backgroundColor="#2196F3"; break;

            case 2: flat[2].style.height = 'auto'; //25em
                    // backgroundColor[2].style.backgroundColor="gray"; break;
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


function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return month + '/' + day + '/' + year;
}

function showBooking() {
    // var sdem = document.getElementById('number_night').value;
    // let dateCheckIn = document.getElementById('checkin-booking').value;
    // let dateCheckOut = document.getElementById('number_night').value;
    // // var dateCheckInF = new Date(dateCheckIn).toLocaleDateString('en-GB');
    
    // const date = new Date(dateCheckIn);
    // const date2 = new Date(dateCheckOut);

    // var a = new Date((date2 - date) * 1000);

    // var b = formatDate(a);
    // console.log(b);

    // Lấy date ngày hiện chọn

    // Xuất kết quả ra màn hình
    // document.getElementById('checkin-chucnang').innerText = dateCheckIn;
}

showBooking();

