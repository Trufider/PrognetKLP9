function buttonklik(item,price){
    var formid = "form"+item;
    var forme = document.getElementById(formid).value;

    if (forme == 0){
        document.getElementById(item).style.backgroundColor
        ="green";
        document.getElementById(item).style.boxShadow="0px 0px 10px 2px green";
        document.getElementById(formid).value="1";
        tambahtotal(price);
        console.log(document.getElementById(formid).value,formid);
    }else if(forme == 1){
        document.getElementById(item).style.backgroundColor
        ="#212020";
        document.getElementById(item).style.boxShadow="";
        document.getElementById(formid).value="0";
        kurangtotal(price);
        console.log(document.getElementById(formid).value,formid);
    }
}

var total = 0;
function tambahtotal(price){
    total = total + price;
    var	reverse = total.toString().split('').reverse().join(''),
	    ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        rupiah = "Rp. "+ribuan;
    document.getElementById("total").innerHTML=rupiah;
}

function kurangtotal(price){
    total = total - price;
    var	reverse = total.toString().split('').reverse().join(''),
	    ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        rupiah = "Rp. "+ribuan;
    document.getElementById("total").innerHTML=rupiah;
}