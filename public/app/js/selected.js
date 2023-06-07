
// Vị trí
function area(){
    let area = document.getElementById('area');
    area.style.width = "25%";
    area.style.fontSize = "17px";
    document.getElementById('check').style.marginRight="6.5rem"
}
area();

function select(){
    let select = document.getElementById('select');
    let Object = document.getElementsByClassName('Object');
    let image = document.getElementsByClassName('image');
    let clImg = document.getElementsByClassName('edit-img');
    let contentSe = document.getElementsByClassName('content-select');

    select.style.width = '75%';

    for(i=0; i<image.length; i++){
        image[i].style.width = '40%';
        clImg[i].style.height = '22rem';
        clImg[i].style.width = "35rem";
        Object[i].style.height = "22rem";
        Object[i].style.display = "flex";
        Object[i].style.boxShadow = "0 6px 20px 0 rgba(0, 0, 0, 0.19)";
        Object[i].style.marginTop = '3rem';
        contentSe[i].style.marginLeft = '20px';
        contentSe[i].style.width = '60%';
    }

}
select();

function text(){
    // let s1 = document.getElementsByClassName('s1');
    // for(i = 0; i <s1.length; i++){

    // }
    // let s2 = document.getElementsByClassName('s2');
    // for(i = 0; i <s2.length; i++){

    // }
    //     let s3 = document.getElementsByClassName('s3');
    //     for(i = 0; i <s3.length; i++){

    //     }
        let blue = document.getElementsByClassName('blue');
    for(i = 0; i <blue.length; i++){
        blue[i].style.color = 'blueviolet';
    }
}
text();

function checkbox(){
    let star = document.getElementsByClassName('fa-star');
    for(i = 0; i<star.length; i++){
        star[i].style.color = 'lightskyblue';
        star[i].style.textShadow = 'rgb(0, 0, 0) 4px 2px 7px';
    }
    document.getElementsByClassName('check')[0].style.margin ='auto 11rem';

}
checkbox();
