@extends('category.layout')

@section('content')
{{-- Create Product --}}
    <div class="row">
        <div class="col-lg-12">
            
            <form action="{{ route('index')}}" method="GET">
                <div class="form-group">
                    <input type="search" name="query" class="form-control" placeholder="Search Name or ID">
                </div>
                <button class="btn btn-primary">Search</button>
                
            </form>
            @if($category != '')
                <div class="pull-right my-3">
                    <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
                </div>
            
            @endif
            <div class="pull-left my-3">
                <a class="btn btn-secondary" href="{{ route('category.index') }}"> Return To Dashboard </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
{{-- Show Data Layout --}}
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone No</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->phone_number}}</td>
            <td>
                <form action="{{ route('category.destroy',$data->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('category.show',$data->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('category.edit',$data->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $category->links() }}


@endsection