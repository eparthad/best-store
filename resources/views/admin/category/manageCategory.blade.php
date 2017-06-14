@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">All Categories</h3>

            <hr/>

            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>

            <div class="well">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Title</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{ $category->categoryName }}</td>
                        <td>{{ strip_tags($category->categoryDescription) }}</td>
                        <td>
                             @if( $category->publicationStatus === 1)
                                published
                             @elseif( $category->publicationStatus === 0)
                                Unpublished
                             @endif
                        </td>
                        <td>
                            <a href="{{ url('/category/'.$category->id.'/edit/') }}" class="btn btn-success" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/category/'.$category->id.'/delete/') }}" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete This!');">
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