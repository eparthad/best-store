@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <hr/>

            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

            <div class="well">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Product Name</th>
                        <th>{{ $product->productName }}</th>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <th>{{ $product->categoryName }}</th>
                    </tr>
                    <tr>
                        <th>Manufacturer Name</th>
                        <th>{{ $product->manufacturerName }}</th>
                    </tr>
                    <tr>
                        <th>Product Price</th>
                        <th>{{ $product->productPrice}}</th>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <th>{{ $product->productQuantity }}</th>
                    </tr>
                    <tr>
                        <th>Product Short Description</th>
                        <th>{{ strip_tags($product->productShortDescription) }}</th>
                    </tr>
                    <tr>
                        <th>Product Long Description</th>
                        <th>{{ strip_tags($product->productLongDescription) }}</th>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <th><img src="{{ asset($product->productImage) }}" alt="{{ $product->productName }}" height="200" width="200"></th>
                    </tr>
                    <tr>
                        <th>Product Status</th>
                        <th>
                            @if( $product->publicationStatus === 1)
                                published
                            @elseif( $product->publicationStatus === 0)
                                Unpublished
                            @endif
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection