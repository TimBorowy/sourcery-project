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
                <div class="form-group form-check">
                    @if(isset($filterTags))
                        {!! Form::checkbox('tags[]', $tag->name, in_array($tag->name, $filterTags) ? true : false, ['class' => 'form-check-input', 'id' => $tag->name]  ) !!}
                    @else
                        {!! Form::checkbox('tags[]', $tag->name, null, ['class' => 'form-check-input', 'id' => $tag->name]) !!}
                    @endif
                    {!! Form::label($tag->name, $tag->name, ['class' => 'form-check-label']) !!}
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
                        {!! Form::open(['route' => ['link.vote', $link->id], 'method' => 'POST', 'style' => 'display:inline-block']) !!}
                            {!! Form::hidden('vote', 1) !!}
                            <button class="btn {{$link->userVote() > 0 ? 'btn-success' : 'btn-secondary'}}">^</button>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['link.vote', $link->id], 'method' => 'POST', 'style' => 'display:inline-block']) !!}
                            {!! Form::hidden('vote', -1) !!}
                            <button class="btn {{$link->userVote() < 0 ? 'btn-success' : 'btn-secondary'}}">v</button>
                        {!! Form::close() !!}
                        <span style="display: block;">Score: {{$link->score()}}</span>
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
