
var xmlhttp = false;

try{
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
// alert(e);
}

try{
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}catch(E){
// alert(e);
    xmlhttp = false;
}

if(!xmlhttp && typeof XMLHttpRequest !='undefined'){
    xmlhttp = new XMLHttpRequest();
}

function makeAjaxCart(objID)
{
    serverPage = '/ajax-cart-update/';

    xmlhttp.open("GET",serverPage);
    xmlhttp.onreadystatechange = function()
    {
    // alert(xmlhttp.readyState);
    // alert(xmlhttp.status);
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
        document.getElementById(objID).innerHTML = xmlhttp.responseText;
    }

    }
    xmlhttp.send(null);
}

