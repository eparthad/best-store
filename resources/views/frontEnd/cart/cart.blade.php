@extends('frontEnd.master')

@section('title')
    Cart
@endsection

@section('homeContent')

        <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">
            @if(Session::get('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ Session::get('message') }}</strong>
            </div>
            @endif
            <?php
            $contents = Cart::content();

            ?>


            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span>{{ (count($contents)) }} Products</span></h3>
            <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
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
            <div class="checkout-left">
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                    <h4>Continue to basket</h4>
                    <ul>
                    <?php $total= 0; ?>
                    @foreach($contents as $content)
                        <li>{{ $content->name }}<i>-</i> <span>{{ $item_total = $content->price * $content->qty }}</span></li>
                        <?php $total = $total + $item_total; ?>
                    @endforeach
                    <li class="total-prize">Total <i>-</i> <span>{{ $total }}</span></li>
                    </ul>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="{{ URL::previous() }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //checkout -->

@endsection

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>