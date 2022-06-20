@extends('category.layout')

@section('content_category')
{{-- Create Product --}}
    <div class="row">
        <div class="col-lg-12">
            
            <form action="{{ route('category.index')}}" method="GET">
                <div class="form-group">
                    <input type="search" name="query" class="form-control" placeholder="Search Name or ID">
                </div>
                <button class="btn btn-primary">Search</button>
                
            </form>
            
                <div class="pull-right my-3">
                    <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
                </div>
            
            {{-- <div class="pull-left my-3">
                <a class="btn btn-secondary" href="{{ route('category.index') }}"> Return To Dashboard </a>
            </div> --}}
            <div class="pull-left my-3">
                <a class="btn btn-secondary" href="{{ route('products.index') }}"> Return to Product Homepage </a>
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
            <th>Model No</th>
            <th>Android Version</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->category->android_version}}</td>
            <td>{{ $product->details }}</td>
            <td>
            
                <form action="{{ route('category.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('category.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('category.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{-- {{ $categories>links() }} --}}


@endsection