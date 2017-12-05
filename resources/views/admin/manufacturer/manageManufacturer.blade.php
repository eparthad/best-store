@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">All Manufacturer</h3>

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
                        <th>Manufacturer ID</th>
                        <th>Manufacturer Title</th>
                        <th>Manufacturer Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td>{{$manufacturer->id}}</td>
                        <td>{{ $manufacturer->manufacturerName }}</td>
                        <td>{{ strip_tags($manufacturer->manufacturerDescription) }}</td>
                        <td>
                            {{ $manufacturer->publicationStatus==1? 'Published':'Unpublished' }}
                        </td>
                        <td>
                            <a href="{{ url('/manufacturer/'.$manufacturer->id.'/edit/') }}" class="btn btn-success" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/manufacturer/'.$manufacturer->id.'/delete/') }}" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete This!');">
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