@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <hr/>
            <div class="well">
                {{--<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">--}}
                {!! Form::open(['url'=>'manufacturer/store', 'method'=>'POST','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="manufacturerName">
                        <span class="text-danger">{{ $errors->has('manufacturerName')? $errors->first('manufacturerName'):'' }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="manufacturerDescription" rows="8"></textarea>
                        <span class="text-danger">{{ $errors->has('manufacturerDescription')? $errors->first('manufacturerDescription'):'' }}</span>
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
                        <span class="text-danger">{{ $errors->has('publicationStatus')? $errors->first('publicationStatus'):'' }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{--<button type="submit" name="btn" class="btn btn-success btn-block">Save Category</button>--}}
                        <input class="btn btn-success btn-block" name="btn" value="Save Category" type="submit">
                    </div>
                </div>
                {{--</form>--}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection