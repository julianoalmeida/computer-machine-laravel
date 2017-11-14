@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12">
        <h2>
            Edit product
            <a href="{{ route('products.index') }}" class="btn btn-default pull-right">		Go back
            </a>
        </h2>
        <hr>
        @include('products.partials.errors')
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}

        @include('products.partials.form')

        {!! Form::close() !!}
    </div>
@endsection