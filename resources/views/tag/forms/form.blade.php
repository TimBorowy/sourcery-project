<div class="form-group">
    {!! Form::label('name', 'tag name:') !!}
    {!! Form::select('name', $categories, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'name'])
</div>

<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>