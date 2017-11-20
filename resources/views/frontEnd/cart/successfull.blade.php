@extends('frontEnd.master')

@section('title')
   Order Successfull
@endsection

@section('homeContent')

    <script type="text/javascript">
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

//        function makeRequest(email,objID)
//        {
//            serverPage = '/ajax-email-check/'+email;
//
//            xmlhttp.open("GET",serverPage);
//            xmlhttp.onreadystatechange = function()
//            {
//                // alert(xmlhttp.readyState);
//                // alert(xmlhttp.status);
//                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
//                {
//                    document.getElementById(objID).innerHTML = xmlhttp.responseText;
//
//                    if(xmlhttp.responseText == email+" already exit."){
////                        document.getElementById('c_button').disabled=true;
//                        document.getElementById('c_button').setAttribute("disabled","disabled");
//                    }else{
//                        document.getElementById('c_button').removeAttribute("disabled");
//                    }
//                }
//
//            }
//            xmlhttp.send(null);
//        }



    </script>

    <!-- register -->
    <?php
    $contents = Cart::content();

    ?>
    <div class="register">
        <div class="container">
            <h2 class="animated wow zoomIn" data-wow-delay=".5s">Thank you. Your order successfully placed. Please check
            your email.</h2>

        </div>
    </div>
    <script>
        {{--document.forms['shoppingAddressForm'].elements['country'].value ={{ $shippingAddress->country }}--}}
    </script>
    <!-- //register -->

@endsection