@extends('frontEnd.master')

@section('title')
    Shiping Information
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
    <div class="register">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Shipping Here</h3>
            <h3 class="text-center text-danger">{{ Session::get('message') }}</h3>
            <div class="login-form-grids">
                <h5 class="animated wow slideInUp" data-wow-delay=".5s">Shipping information</h5>
                {!! Form::open(['url'=>'/save-shipping', 'method'=>'POST','name'=>'shoppingAddressForm','class'=>'animated wow slideInUp','data-wow-delay'=>'.5s']) !!}
                {{--<form class="animated wow slideInUp" data-wow-delay=".5s">--}}
                <input type="text" name="first_name" placeholder="First Name..." required=" " value="{{$shippingAddress->first_name}}">
                <input type="text" name="last_name" placeholder="Last Name..." required=" " value="{{$shippingAddress->last_name}}">
                <input type="email"  name="email" placeholder="Email Address" required=" " value="{{$shippingAddress->email}}">
                <input type="text" name="company_name" placeholder="Company Name..." required=" " value="{{$shippingAddress->company_name}}">
                <textarea name="address" placeholder="Address..." name="" id="" cols="30" rows="10">{{$shippingAddress->address}}</textarea>
                <input class="mobile" name="mobile" type="text" placeholder="Mobile..." required=" " value="{{$shippingAddress->mobile}}">
                <input class="city" name="city" type="text" placeholder="City..." required=" " value="{{$shippingAddress->city}}">
                <input class="postal" name="zip_code" type="text" placeholder="Zip/Postal Code..." required=" " value="{{$shippingAddress->zip_code}}">
                <select class="country" name="country" name="country" id="">
                    <option value="">Select a Country...</option>
                    <option value="Bangladesh">Bangladesh</option>
                </select>
                <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox" required><i> </i>I accept the terms and conditions</label>
                    </div>
                </div>
                <input id="c_button" type="submit" value="Continue">
                {!! Form::close() !!}


            </div>
            <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                <a href="index.html">Home</a>
            </div>
        </div>
    </div>
    <script>
        document.forms['shoppingAddressForm'].elements['country'].value ={{ $shippingAddress->country }}
    </script>
    <!-- //register -->

@endsection