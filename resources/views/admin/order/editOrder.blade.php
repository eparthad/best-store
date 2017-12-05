@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            {{--<h3 class="text-center text-success">{{ Session::get('message') }}</h3>--}}
            <hr/>
            <div class="well">
                {{--<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">--}}
                {!! Form::open(['url'=>'/order/update', 'method'=>'POST','class'=>'form-horizontal','name'=>'editOrderForm']) !!}

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Customer Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $order_info->first_name.' '.$order_info->last_name }}" readonly>
                        <input type="hidden" class="form-control" name="order_id" value="{{ $order_info->id }}">

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Total price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $order_info->order_total}}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Order Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="{{ $order_info->created_at}}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Order Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="orderStatus">
                            {{--<option value="">Select Publication Status</option>--}}
                            <option value="delivered">Delivered</option>
                            <option value="processing">Processing</option>
                            <option value="pending">Pending</option>
                        </select>
                        <span class="text-danger">{{ $errors->has('orderStatus')? $errors->first('orderStatus'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{--<button type="submit" name="btn" class="btn btn-success btn-block">Save Category</button>--}}
                        <input class="btn btn-success btn-block" name="btn" value="Save Order" type="submit">
                    </div>
                </div>
                {{--</form>--}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        document.forms['editOrderForm'].elements['orderStatus'].value ="{{ $order_info->order_status }}"
    </script>
@endsection