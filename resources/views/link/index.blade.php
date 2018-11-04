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
                    <div class="flex-grow-1 p-1">
                        <a href="{{ route('link.show', $link->id) }}">
                            <h2>{{$link->description}}</h2>
                        </a>

                    </div>
                    <div class="p-1">
                        <a class="btn btn-success" href="{{route('link.edit', $link->id)}}">Edit link</a>
                    </div>
                    <div class="p-1">
                        {!! Form::model($link, ['route' => ['link.destroy', $link], 'method' => 'DELETE']) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
