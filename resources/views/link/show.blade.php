@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 topMargin">
                <h1>{{$link->description}}</h1>
                <a href="{{$link->linkAddress}}">{{$link->linkAddress}}</a>


                {!! Form::model($link, ['route' => ['link.destroy', $link], 'method' => 'DELETE']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}

                <p>Score: {{$link->score}}</p>
                <p>Category: {{$link->category->name}}</p>
                <h3>Tags</h3>
                @foreach($link->tags as $tag)
                    <p>{{$tag->name}}</p>
                @endforeach

            </div>

        </div>
    </div>

@endsection