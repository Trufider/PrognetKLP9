// SLIDE SHOW ==================================================
var slideIndex = 1;
repeat()
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function previusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n){
    if (n < 1){
        n = 3;
        slideIndex=3;
    }else if(n > 3){
        n = 1;
        slideIndex=1;
    }
    console.log(n);
    if (n == 1){
        document.getElementById("box1").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk2.jpg')";
        document.getElementById("box2").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk3.jpg')";
        document.getElementById("box2").style.flexGrow="1";
        document.getElementById("nav1").style.flexGrow="3";
        document.getElementById("nav2").style.flexGrow="1";
        document.getElementById("nav3").style.flexGrow="1";
    }else if (n == 2){
        document.getElementById("box1").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk4.jpg')";
        document.getElementById("box2").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk5.jpg')";
        document.getElementById("box2").style.flexGrow="1.9";
        document.getElementById("nav1").style.flexGrow="1";
        document.getElementById("nav2").style.flexGrow="3";
        document.getElementById("nav3").style.flexGrow="1";
    }else if(n == 3){
        document.getElementById("box1").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk6.jpg')";
        document.getElementById("box2").style.backgroundImage="url('http://localhost:8000/fotoweb/spanduk7.jpg')";
        document.getElementById("box2").style.flexGrow=".8";
        document.getElementById("nav1").style.flexGrow="1";
        document.getElementById("nav2").style.flexGrow="1";
        document.getElementById("nav3").style.flexGrow="3";
    }

}

function repeat(){
setTimeout(function(){
    plusSlides(1);
    repeat();
},7000);
}
// END SLIDE SHOW ==================================================

// UJI COBA AJAX ==================================================
function load(){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            console.log("ok");
        }
    }
    xhttp.open("GET","/ajax_dashboard/get_page.php",true);
    xhttp.send();
}
// END UJI COBA AJAX =================================================

// FALL 2020 =========================================================

window.onscroll = function(){
    console.log(this.scrollY)
    if(window.scrollY > 400){
        document.getElementById("fall2").style.opacity
        ="1";
        document.getElementById("fall2").style.top
        ="0px";
    }

    if(window.scrollY > 1800){
        document.getElementById("thum").style.opacity
        ="1";
    }

    
}

// THE COLLECTION SLIDE
