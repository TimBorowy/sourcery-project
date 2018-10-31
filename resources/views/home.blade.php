@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['link.search'], 'method' => 'POST']) !!}

            <b>{!! Form::label('searchQuery', 'Zoekterm') !!}</b>
            {!! Form::text('searchQuery', isset($searchQuery) ? $searchQuery : null, ['class' => 'form-control']) !!}
            <p><b>Tags:</b></p>
            @foreach($tags as $tag)
                <div class="form-check">
                    {!! Form::label('tags[]', $tag->name) !!}
                    @if(isset($filterTags))
                    {!! Form::checkbox('tags[]', $tag->name, in_array($tag->name, $filterTags) ? true : false) !!}
                    @else
                        {!! Form::checkbox('tags[]', $tag->name) !!}
                    @endif
                </div>
            @endforeach

            {{ Form::submit('Zoek link', ['class' => 'btn btn-default']) }}

            {{ Form::close() }}

        </div>
        <ul class="list-group list-group-flush">
            @if(!$links->isEmpty())
            @foreach($links as $link)
                <li class="list-group-item d-flex">
                    <div class="p-1">
                        <a class="btn btn-secondary" href="{{route('link.upvote', $link->id)}}">^</a>
                        <a class="btn btn-secondary" href="{{route('link.upvote', $link->id)}}">v</a>
                        <span style="display: block;">Score: {{$link->score}}</span>
                    </div>
                    <div class="p-1 flex-grow-1">
                        <a href="{{ route('public.link.show', $link->id) }}">
                            <h2>{{$link->description}}</h2>
                        </a>

                    </div>
                </li>
            @endforeach
            @else
                <li class="list-group-item">
                    <h1>solly, niks gevonden</h1>

                </li>
            @endif

            <li class="list-group-item">De beste link is de link die nog geplaatst moet worden.</li>
        </ul>
    </div>
</div>
@endsection
