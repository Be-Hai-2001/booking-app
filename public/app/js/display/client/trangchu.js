function display(){
    let flat = document.getElementsByClassName('display');

    for(i=0; i<flat.length; i++){
        switch(i){
            case 0: flat[0].style.height = '45rem';

            case 1: flat[1].style.height = '70px';

        }
    }
}

function home(){
    let flat = document.getElementsByClassName('home-client');

    for(i=0; i<flat.length; i++){
        switch(i){
            // case 0: flat[0].style.height = '400px';

            case 1: flat[1].style.height = '7rem';
                    flat[1].style.width = '78.2%';
                    flat[1].style.backgroundColor="rgb(33, 150, 243)";
                    flat[1].style.position = 'absolute';
                    flat[1].style.borderRadius = '7px';
                    flat[1].style.marginTop='-18px'; break;
        }
    }
}

function checkHinden(){
    document.getElementById("hinden-people").style.display = "block";
}

function dbcheckHinden(){
    document.getElementById("hinden-people").style.display = "none";
}

var index = 0;
nextImg = function(){
    var imgs = [
                './app/images/momo-upload-api-221104171940-638031791804857831.jpg',
                './app/images/Khach-san-Buon-Ma-Thuot.png',
                './app/images/uudai.png'
                ]
    var styles = ['#ffbcf5','#dbcfc8','#f0e4fe']
    document.getElementById('chage-img').src = imgs[index];
    document.getElementById('chage-bacgr').style.background = styles[index];
    index++;
    if(index == 3){
       index = 0;
    }
}

document.getElementsByClassName('slick-arrow')[0].style.display = 'none';
document.getElementsByClassName('slick-arrow')[1].style.display = 'none';


setInterval(nextImg,2500);

home();

display();
