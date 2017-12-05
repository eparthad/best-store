@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">All Categories</h3>

            <hr/>

            {{--<h3 class="text-center text-success">{{ Session::get('message') }}</h3>--}}

            @if(Session::get('message'))
                <div class="alert alert-success text-center" role="alert">
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

            <div class="well">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Product Title</th>
                        <th>Category Name</th>
                        <th>Manufacturer Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->categoryName }}</td>
                        <td>{{ $product->manufacturerName }}</td>
                        <td>TK. {{ $product->productPrice }}</td>
                        <td>{{ $product->productQuantity }}</td>
                        <td>
                             @if( $product->publicationStatus === 1)
                                published
                             @elseif( $product->publicationStatus === 0)
                                Unpublished
                             @endif
                        </td>
                        <td>
                            <a href="{{ url('/product/'.$product->id.'/view/') }}" class="btn btn-info" title="Product Info">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a href="{{ url('/product/'.$product->id.'/edit/') }}" class="btn btn-success" title="Product Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/product/'.$product->id.'/delete/') }}" class="btn btn-danger" title="Product Delete" onclick="return confirm('Are You Sure To Delete This!');">
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

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>