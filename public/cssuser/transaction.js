function klik(id){
    var hasil = document.getElementById(id).getAttribute("value");
    console.log(hasil);
    if(hasil == "0"){
        document.getElementById(id).style.height="470px";
        document.getElementById(id).setAttribute("value","1")
        console.log("liak");
        
    }else{
        document.getElementById(id).style.height="100px";
        document.getElementById(id).setAttribute("value","0")
        console.log("ngacuh");
    }
}

// COUNTDOWN
function hitungmundur(id,time,the_id){
    var countDownDate = new Date(time).getTime();

    var job = setTimeout(function(){
        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if(distance < 0){
            document.getElementById(id).innerHTML="0 days - 0:0:0";
        }else{
            document.getElementById(id).innerHTML=days+" days - "+hours+":"+minutes+":"+seconds;
            hitungmundur(id,time);
        }
        
    },1000)
}

// CHANGE PIC
function upload(id_transaksi){
    console.log(rou+"/fotoweb/noimage.png");
    document.getElementById("paneltransfer").style.top="100px";
    document.getElementById("blocksystem").style.display="block";
    document.getElementById("id_pic").value=id_transaksi;
    document.getElementById("blah").src=rou+"/fotoweb/noimage.png";
    document.getElementById("inpt").value="";
    console.log(id_transaksi);
}

function cancelproof(){
    document.getElementById("paneltransfer").style.top="-500px";
    document.getElementById("blocksystem").style.display="none";
    document.getElementById("id_pic").value="";
    document.getElementById("blah").src=rou+"/fotoweb/noimage.png";
    document.getElementById("inpt").value="";
}