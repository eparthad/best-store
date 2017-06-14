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
                        <th>No</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Action</th>
                    </tr>
                    <?php $i=1; ?>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ url('/user/'.$user->id.'/edit/') }}" class="btn btn-success" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ url('/user/'.$user->id.'/delete/') }}" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete This!');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="pull-right">
                    {{ $users->count() }} users out of {{ $users->total() }}
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection