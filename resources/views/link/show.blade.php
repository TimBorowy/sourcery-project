@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 topMargin">
                <h1>{{$link->description}}</h1>
                <a href="{{$link->linkAddress}}">{{$link->linkAddress}}</a>

                <p>Score: {{$link->score}}</p>
                <p>Category: {{$link->category->name}}</p>
                <h3>Tags</h3>
                @if(!empty($link->tags[0]))
                    @foreach($link->tags as $tag)
                        {{--<p>{{$tag->name}}</p>--}}
                    @endforeach
                @endif

            </div>

        </div>
    </div>

@endsection