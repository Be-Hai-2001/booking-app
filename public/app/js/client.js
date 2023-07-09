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

alert(1);
// function formHidle(id){
//     var click = document.getElementById(id);

//     if(id == 'box-shadow-contact'){
//         document.getElementById('form-lienhe').style.display = 'block';

//         document.getElementById('form-lienhe').style.display = 'none';
//         document.getElementById('form-lienhe').style.display = 'none';

//     } else if(id == 'destroy-booking') {

//     }
//     else if( id == '') {

//     }
//     else{

//     }
// }
