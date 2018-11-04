<div class="form-group">
    {!! Form::label('linkAddress', 'Link address:') !!}
    {!! Form::text('linkAddress', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'linkAddress'])
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'description'])
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'category_id'])
</div>

<div class="form-group">
    @if(isset($inputTags))
        {!! Form::label('tags', 'Add new tag:') !!}
        {!! Form::text('tags', $inputTags, ['class' => 'form-control']) !!}
    @else
        {!! Form::label('tags', 'Add new tag:') !!}
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    @endif
    @include('errors.validation', ['error' => 'tags'])
</div>

{{--<div class="form-group">
    @foreach($tags as $tag)
        {{$tag->name}}
    @endforeach
</div>--}}

<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>

<script>
    var tags = [
        @foreach ($tags as $tag)
        {
            tag: "{{$tag}}"
        },
        @endforeach
    ];
</script>