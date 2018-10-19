<div class="form-group">
    {!! Form::label('linkAddress', 'Link address:') !!}
    {!! Form::text('linkAddress', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'title'])
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'slug'])
</div>

<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>