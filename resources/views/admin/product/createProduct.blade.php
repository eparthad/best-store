@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <hr/>
            <div class="well">
                {{--<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">--}}
                {!! Form::open(['url'=>'product/store', 'method'=>'POST','class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="productName">
                        <span class="text-danger">{{ $errors->has('productName')?$errors->first('productName'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="categoryId">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->has('categoryId')?$errors->first('categoryId'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="manufacturerId">
                            <option value="">Select Category</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->has('manufacturerId')?$errors->first('manufacturerId'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="productPrice" min="0">
                        <span class="text-danger">{{ $errors->has('productPrice')?$errors->first('productPrice'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="productQuantity" min="0">
                        <span class="text-danger">{{ $errors->has('productQuantity')?$errors->first('productQuantity'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Short Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productShortDescription" rows="5"></textarea>
                        <span class="text-danger">{{ $errors->has('productShortDescription')?$errors->first('productShortDescription'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Long Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="productLongDescription" rows="8"></textarea>
                        <span class="text-danger">{{ $errors->has('productLongDescription')?$errors->first('productLongDescription'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Product Image</label>
                    <div class="col-sm-10">
                        {{--<input type="file" name="productImage" accept="image/*">--}}
                        <span class="btn btn-block btn-primary btn-file">
                            Browse <input type="file"   name="productImage" accept="image/*">
                        </span>
                        <span class="text-danger">{{ $errors->has('productImage')?$errors->first('productImage'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publicationStatus">
                            <option value="">Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{--<button type="submit" name="btn" class="btn btn-success btn-block">Save Category</button>--}}
                        <input class="btn btn-success btn-block" name="btn" value="Save Product" type="submit">
                    </div>
                </div>
                {{--</form>--}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection