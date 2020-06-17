var total=1;
function klik(){
    total=total+1;
    if(total>10){
        total = 10
    }
    document.getElementById('qty').innerHTML=total;
    document.getElementById('qtysend').value=total;
}

function minklik(){
    total=total-1;
    if(total<1){
        total = 1;
    }
    document.getElementById('qty').innerHTML=total;
    document.getElementById('qtysend').value=total;
}

function hyperlink(){
    document.getElementById('hiddenbutton').click();
}
var posisi = 1
function geser(nilai){
    posisi  += nilai;
    if(posisi > 3){
        posisi = 1;
    }else if(posisi < 1){
        posisi = 3;
    }
    console.log(posisi)
    if(posisi == 1){
        document.getElementById("boxing3").style.left="200px";
        document.getElementById("boxing3").style.opacity="0";
        document.getElementById("boxing3").style.zIndex="0";

        document.getElementById("boxing2").style.left="300px";
        document.getElementById("boxing2").style.opacity="1";
        document.getElementById("boxing2").style.zIndex="3";

        document.getElementById("boxing").style.left="400px";
        document.getElementById("boxing").style.opacity="0";
        document.getElementById("boxing").style.zIndex="0";

    }else if(posisi == 2){
        document.getElementById("boxing2").style.left="200px";
        document.getElementById("boxing2").style.opacity="0";
        document.getElementById("boxing2").style.zIndex="0";

        document.getElementById("boxing").style.left="300px";
        document.getElementById("boxing").style.opacity="1";
        document.getElementById("boxing").style.zIndex="3";

        document.getElementById("boxing3").style.left="400px";
        document.getElementById("boxing3").style.opacity="0";
        document.getElementById("boxing3").style.zIndex="0";


    }else if(posisi == 3){
        document.getElementById("boxing").style.left="200px";
        document.getElementById("boxing").style.opacity="0";
        document.getElementById("boxing").style.zIndex="0";

        document.getElementById("boxing3").style.left="300px";
        document.getElementById("boxing3").style.opacity="1";
        document.getElementById("boxing3").style.zIndex="3";

        document.getElementById("boxing2").style.left="400px";
        document.getElementById("boxing2").style.opacity="0";
        document.getElementById("boxing2").style.zIndex="0";

    }
}