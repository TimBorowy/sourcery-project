@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>Links</h1>
                <div>
                    <a class="btn btn-primary" href="{{route('link.create')}}">Create link</a>
                </div>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($links as $link)
                <li class="list-group-item d-flex">
                    <div class="col">
                        <a class="btn btn-success" href="{{route('link.upvote', $link->id)}}">^</a>
                        <a class="btn btn-success" href="{{route('link.upvote', $link->id)}}">v</a>
                        <span style="display: block;">Score: {{$link->score}}</span>
                    </div>
                    <div class="col">
                        <a href="{{ route('link.show', $link->id) }}">
                            <h2>{{$link->linkAddress}}</h2>
                        </a>

                    </div>
                    <div>
                        <a class="btn btn-success" href="{{route('link.edit', $link->id)}}">Edit link</a>
                    </div>
                </li>
                @endforeach

                <li class="list-group-item">Vestibulum at eros</li>
            </ul>

        </div>
    </div>
@endsection
