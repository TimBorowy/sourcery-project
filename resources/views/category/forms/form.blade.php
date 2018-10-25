<div class="form-group">
    {!! Form::label('name', 'Category name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'name'])
</div>

<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>