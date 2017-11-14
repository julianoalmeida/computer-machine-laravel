<div class="form-group">
    {!! Form::label('name', 'Product name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('code', 'Product code') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Product price') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.2']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category id') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>