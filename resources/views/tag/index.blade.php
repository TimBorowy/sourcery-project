@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>Tags</h1>
                <div>
                    <a class="btn btn-primary" href="{{route('tag.create')}}">Create Tag</a>
                </div>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($tags as $tag)
                <li class="list-group-item d-flex">
                    <div class="col">
                        <a href="{{ route('tag.show', $tag->id) }}">
                            <h2>{{$tag->name}}</h2>
                        </a>

                    </div>
                    <div>
                        <a class="btn btn-success" href="{{route('tag.edit', $tag->id)}}">Edit tag</a>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
