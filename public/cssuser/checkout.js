// AJAX CITY

function ajaxcity(prov){
    console.log(prov);
    if(prov != ""){
    document.getElementById("city").innerHTML="<option value=\"\">Please Wait...</option>";
    document.getElementById("city").disabled=true;
    document.getElementById("kurir").innerHTML="<option value=\"\">Courier</option>";
    document.getElementById("layanan").innerHTML="<option value=\"\">Service</option>";
    document.getElementById("firstaddress").value="";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("city").innerHTML=this.responseText;
            document.getElementById("city").disabled=false;
        }
        
    }
        xhttp.open("GET","/user/city/"+prov,true);
        xhttp.send();
    }else{
        document.getElementById("kurir").innerHTML="<option value=\"\">Curier</Option>";
        document.getElementById("city").innerHTML="<option value=\"\">City</option>";
        document.getElementById("layanan").innerHTML="<option value=\"\">Service</option>";
        totalharga(0);
        document.getElementById("ongkir").value="Rp. 0";
    }
        
}

function citychange(val){
    if(val != ""){
        document.getElementById("kurir").innerHTML="<option value=\"\">Courier</option><option value=\"jne\">Jne</option><option value=\"tiki\">Tiki</option><option value=\"pos\">Pos</option>";
        document.getElementById("layanan").innerHTML="<option value=\"\">Service</option>";
        document.getElementById("ongkir").value="Rp. 0";
        totalharga(0);
    }else{
        document.getElementById("kurir").innerHTML="<option value=\"\">Courier</option>";
        document.getElementById("layanan").innerHTML="<option value=\"\">Service</option>";
        document.getElementById("ongkir").value="Rp. 0";
        totalharga(0);
    }
}

function ajaxkurir(kurir){
    if(document.getElementById("kurir").value == ""){

        document.getElementById("layanan").selectedIndex ="<option value=\"\">Service</option>";
        document.getElementById("layanan").innerHTML="<option value=\"\">Service</option>";
        document.getElementById("ongkir").value="Rp. 0";
        totalharga(0);
    }else{
        document.getElementById("layanan").innerHTML="<option>Please Wait...</option>"
        document.getElementById("layanan").disabled=true;
        city = document.getElementById("city").value;
        provinsi = document.getElementById("provinsi").value;
        weight = document.getElementById("")
        var cost = new XMLHttpRequest();
        cost.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var layanan =JSON.parse(this.responseText);
                document.getElementById("layanan").innerHTML=layanan.text;
                document.getElementById("layanan").disabled=false;
            }
        }
        cost.open("GET","/user/cost/"+provinsi+"/"+city+"/"+kurir+"/"+berat,true);
        cost.send();
    }
}

function simpanharga(index){
    if(index == ""){
        index = 0;
        totalharga(index);
    }
    var	reverse = index.toString().split('').reverse().join(''),
	    ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        rupiah = "Rp. "+ribuan;
    document.getElementById("ongkir").value=rupiah;
    totalharga(index);
}

function totalharga(harga){
    total_payment = parseInt(total_harga) + parseInt(harga);
    var	reverse = total_payment.toString().split('').reverse().join(''),
	    ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        rupiah = "Rp. "+ribuan;
    document.getElementById("totalpaye").value=rupiah;
}

function ribuan(harga){
    var	reverse = harga.toString().split('').reverse().join(''),
	    ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        rupiah = "Rp. "+ribuan;
        document.getElementById("totalhar").value=rupiah;
}
var status = 0;
function buttonclick(){
    if(status == 0){
        document.getElementById("total").style.height="530px";
        document.getElementById("warn").style.opacity="1";
        status = 1;
    }else{
    document.getElementById("hiddenbutton").click();
    }
}

function firstinstall(){
    document.getElementById("firstprov").click();
    document.getElementById("first").click();
    document.getElementById("first").click();
    document.getElementById("firstkurir").click();
    document.getElementById("firstlayanan").click();
    console.log("first");
}