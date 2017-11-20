@extends('frontEnd.master')

@section('title')
    Check Out
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

        function makeRequest(email,objID)
        {
            serverPage = '/ajax-email-check/'+email;

            xmlhttp.open("GET",serverPage);
            xmlhttp.onreadystatechange = function()
            {
                // alert(xmlhttp.readyState);
                // alert(xmlhttp.status);
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById(objID).innerHTML = xmlhttp.responseText;

                    if(xmlhttp.responseText == email+" already exit."){
//                        document.getElementById('c_button').disabled=true;
                        document.getElementById('c_button').setAttribute("disabled","disabled");
                    }else{
                        document.getElementById('c_button').removeAttribute("disabled");
                    }
                }

            }
            xmlhttp.send(null);
        }


                function checkPassword(pass,passAgain,objID)
                {
                    serverPage = '/ajax-password-check/'+pass+'/'+passAgain;

                    xmlhttp.open("GET",serverPage);
                    xmlhttp.onreadystatechange = function()
                    {
                        // alert(xmlhttp.readyState);
                        // alert(xmlhttp.status);
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            document.getElementById(objID).innerHTML = xmlhttp.responseText;

                            if(xmlhttp.responseText == email+" already exit."){
        //                        document.getElementById('c_button').disabled=true;
                                document.getElementById('c_button').setAttribute("disabled","disabled");
                            }else{
                                document.getElementById('c_button').removeAttribute("disabled");
                            }
                        }

                    }
                    xmlhttp.send(null);
                }



    </script>

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Register Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
            {{--<p class="est animated wow zoomIn" data-wow-delay=".5s"></p>--}}
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <spain class="text-center text-danger">{{ Session::get('message') }}</spain>
                {!! Form::open(['url'=>'/customer-login', 'method'=>'POST']) !!}
                    <input type="email" name="email" placeholder="Email Address" required=" " >
                    <input type="password" name="password" placeholder="Password" required=" " >
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- //login -->

    <!-- register -->
    <div class="register">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
            <div class="login-form-grids">
                <h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5>
                {{--<form class="loginForm animated wow slideInUp" data-wow-delay=".5s">--}}
                {{--<input type="text" placeholder="First Name..." required=" " >--}}
                {{--<input type="text" placeholder="Last Name..." required=" " >--}}
                {{--</form>--}}
                {{--<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">--}}
                {{--<div class="check">--}}
                {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>--}}
                {{--<form class="animated wow slideInUp" data-wow-delay=".5s">--}}
                {{--<input type="email" placeholder="Email Address" required=" " >--}}
                {{--<input type="password" placeholder="Password" required=" " >--}}
                {{--<input type="password" placeholder="Password Confirmation" required=" " >--}}
                {{--<div class="register-check-box">--}}
                {{--<div class="check">--}}
                {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<input type="submit" value="Register">--}}
                {{--</form>--}}
                {!! Form::open(['url'=>'/customer-save', 'method'=>'POST','class'=>'animated wow slideInUp','data-wow-delay'=>'.5s']) !!}
                {{--<form class="animated wow slideInUp" data-wow-delay=".5s">--}}
                <input type="text" name="first_name" placeholder="First Name..." required=" " >
                <input type="text" name="last_name" placeholder="Last Name..." required=" " >
                <input type="email" onblur="makeRequest(this.value,'res')" name="email" placeholder="Email Address" required=" " >
                <span id="res"></span>

                <input type="password" id="password" name="password" placeholder="Password" required=" " >
                <input type="password" onblur="checkPassword(document.getElementById('password').value,this.value,'passCheck')" name="password_again" placeholder="Password Confirmation" required=" " >
                <span id="passCheck"></span>
                <input type="text" name="company_name" placeholder="Company Name..." required=" " >
                <textarea name="address" placeholder="Address..." name="" id="" cols="30" rows="10"></textarea>
                <input class="mobile" name="mobile" type="text" placeholder="Mobile..." required=" " >
                <input class="city" name="city" type="text" placeholder="City..." required=" " >
                <input class="postal" name="zip_code" type="text" placeholder="Zip/Postal Code..." required=" " >
                <select class="country" name="country" name="country" id="">
                    <option value="">Select a Country...</option>
                    <option value="Bangladesh">Bangladesh</option>
                </select>
                <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox" required><i> </i>I accept the terms and conditions</label>
                    </div>
                </div>
                <input id="c_button" type="submit" value="Register">
                {!! Form::close() !!}


            </div>
            <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                <a href="index.html">Home</a>
            </div>
        </div>
    </div>
    <!-- //register -->

@endsection