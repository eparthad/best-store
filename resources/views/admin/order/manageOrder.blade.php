@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">All Orders</h3>

            <hr/>

            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

            <div class="well">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($order_info as $order)
                    <tr>
                        <td>{{$order['order_id']}}</td>
                        <td>{{ $order['first_name'].' '.$order['last_name'] }}</td>
                        <td>{{ $order['order_total'] }}</td>
                        <td>{{ $order["created_at"] }}</td>
                        <td>{{ $order['order_status'] }}</td>
                        {{--<td>--}}
                             {{--@if( $order->publicationStatus === 1)--}}
                                {{--published--}}
                             {{--@elseif( $order->publicationStatus === 0)--}}
                                {{--Unpublished--}}
                             {{--@endif--}}
                        {{--</td>--}}
                        <td>
                            <a href="{{ url('/view-invoice/'.$order['order_id']) }}" class="btn btn-info" title="Product Info">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a href="{{ url('/order/'.$order['order_id'].'/edit/') }}" class="btn btn-success" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/order/'.$order['order_id'].'/delete/') }}" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete This!');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection