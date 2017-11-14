@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12">
        <h2>
            <strong>#{{ $product->id }}</strong> {{ $product->name }}
            <a href="{{ route('products.index') }}" class="btn btn-default pull-right">		Go back
            </a>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-3">Code</th>
                        <th class="col-md-3">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->price }}</td>
                </tbody>
            </table>
        </div>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary col-md-1 pull-right">
            Edit
        </a>
    </div>
@endsection