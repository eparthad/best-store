@extends('frontEnd.master')

@section('title')
   Payment Method
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
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Payment Here</h3>
            <div class="login-form-grids">
                <h5 class="animated wow slideInUp" data-wow-delay=".5s">Payment Method</h5>
                {{--{!! Form::open(['url'=>'/save-shipping', 'method'=>'POST','name'=>'shoppingAddressForm','class'=>'animated wow slideInUp','data-wow-delay'=>'.5s']) !!}--}}
                {{--<form class="animated wow slideInUp" data-wow-delay=".5s">--}}
                {{--<input type="text" name="first_name" placeholder="First Name..." required=" " value="{{$shippingAddress->first_name}}">--}}

                {{--{!! Form::close() !!}--}}
                {!! Form::open(['url'=>'/place-order', 'method'=>'POST','class'=>'animated wow slideInUp','data-wow-delay'=>'.5s']) !!}
                    <input type="radio" name="payment_type" value="cash_on_delivery" checked> Cash On Delivery <br>
                    <input type="radio" name="payment_type" value="paypal"> Paypal
                    <div class="confirmButton"><br>
                        <button class="btn btn-success" type="submit" >Continue</button>
                    </div>
                {!! Form::close() !!}

                    <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s"><br><br>
                        <h5 class="animated wow slideInUp text-success" data-wow-delay=".5s">Order Review</h5>
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product</th>
                                <th>Quality</th>
                                <th>Product Name</th>
                                {{--<th>Service Charges</th>--}}
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                            </thead>


                            <?php $i=1; ?>
                            @foreach($contents as $content)
                                <tr class="rem1">
                                    <td class="invert">{{ $i++ }}</td>
                                    <td class="invert-image"><a href="single.html"><img src="{{ asset($content->options->image) }}" alt=" " class="img-responsive" /></a></td>
                                    <td class="invert">
                                        <div class="quantity">
                                            {{--<div class="quantity-select">--}}
                                            {{--<div class="entry value-minus">&nbsp;</div>--}}
                                            {{--<div class="entry value"><span>{{ $content->qty }}</span></div>--}}
                                            {{--<div class="entry value-plus active">&nbsp;</div>--}}
                                            {{--</div>--}}
                                            {!! Form::open(['url'=>'/update-cart', 'method'=>'POST','class'=>'form-horizontal']) !!}
                                            <input type="number" name="quantity" min="1" max="{{ $content->options->totalQty }}" value="{{ $content->qty }}" >
                                            <input type="hidden" name="rowId" value="{{ $content->rowId }}">

                                            <button class="btn btn-success" type="submit">
                                                <div class="button-group">
                                                    <span>Update</span>
                                                </div>
                                            </button>
                                            {!! Form::close() !!}

                                        </div>
                                    </td>
                                    <td class="invert">{{ $content->name }}</td>
                                    {{--<td class="invert">$5.00</td>--}}
                                    <td class="invert">{{ $total = $content->price * $content->qty }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ url('/delete-to-cart/'.$content->rowId) }}"><div class="close1"> </div></a>
                                        </div>
                                        {{--<script>$(document).ready(function(c) {--}}
                                        {{--$('.close1').on('click', function(c){--}}
                                        {{--$('.rem1').fadeOut('slow', function(c){--}}
                                        {{--$('.rem1').remove();--}}
                                        {{--});--}}
                                        {{--});--}}
                                        {{--});--}}
                                        {{--</script>--}}
                                    </td>
                                </tr>
                                @endforeach

                                        <!--quantity-->
                                {{--<script>--}}
                                {{--$('.value-plus').on('click', function(){--}}
                                {{--var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;--}}
                                {{--divUpd.text(newVal);--}}
                                {{--});--}}

                                {{--$('.value-minus').on('click', function(){--}}
                                {{--var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;--}}
                                {{--if(newVal>=1) divUpd.text(newVal);--}}
                                {{--});--}}
                                {{--</script>--}}
                                <!--quantity-->
                        </table>
                    </div>

            </div>
            <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                <a href="index.html">Home</a>
            </div>
        </div>
    </div>
    <script>
        {{--document.forms['shoppingAddressForm'].elements['country'].value ={{ $shippingAddress->country }}--}}
    </script>
    <!-- //register -->

@endsection