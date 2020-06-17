function del(id_item,price){ 
    var formid = document.getElementById("form"+id_item).value;
    console.log(formid+"value");
    if(formid == 1){
        buttonklik(id_item,price);
        console.log('formid'+formid);
    }
    document.getElementById('form'+id_item).value="delete";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("itemlist").innerHTML=this.responseText;
        }
    }
    xhttp.open("GET","/user/del/"+id_item,true);
    xhttp.send();
}