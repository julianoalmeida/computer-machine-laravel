@extends('layout')

@section('content')
    <div class="col-xs-12 col-sm-12">
        <h2>
            New Product
            <a href="{{ route('products.index') }}" class="btn btn-default pull-right">Go back
            </a>
        </h2>
        <hr>
        @include('products.partials.errors')
        {!! Form::open(['route' => 'products.store']) !!}

        @include('products.partials.form')

        {!! Form::close() !!}
    </div>
@endsection