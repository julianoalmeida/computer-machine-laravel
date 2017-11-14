@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12">
        <h2>
            Products List
            <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">New</a>
        </h2>
        <hr>
        @include('products.partials.info')
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-3">Name</th>
                <th class="col-md-3">Code</th>
                <th class="col-md-3">Price</th>
                <th class="col-md-3">Category id</th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-link">
                            Show
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-link">
                            Edit
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-link">
                            Delete
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
@endsection