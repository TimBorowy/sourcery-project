<div class="form-group">
    {!! Form::label('linkAddress', 'Link address:') !!}
    {!! Form::text('linkAddress', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'linkAddress'])
</div>

<div class="form-group">
    {!! Form::label('description', 'Beschrijving:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'description'])
</div>

<div class="form-group">
    {!! Form::label('allowVoting', 'Stemmen toestaan:') !!}
    {!! Form::checkbox('allowVoting', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'allowVoting'])
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'category_id'])
</div>

<div class="form-group">
    @foreach($tags as $tag)
        {{$tag->name}}
    @endforeach
</div>

<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>