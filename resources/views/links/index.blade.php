@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($links as $link)
                    <a href="{{ $link->id}}">
                        <div>
                            <h2>{{$link->LinkAddress}}</h2>
                            <p>Score: {{$link->score}}</p>
                            <p>Category: {{$link->category->name}}</p>
                            <h3>Tags</h3>
                            @foreach($link->tags as $tag)
                                <p>{{$tag->name}}</p>
                            @endforeach
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
