@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h1>Hello</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::check())
                        You are logged in!
                    @endif
                </div>
            </div>
        </div>


    </div>
    <div class="">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => ['link.search'], 'method' => 'POST']) !!}

                {!! Form::label('searchQuery', 'Zoekterm') !!}
                {!! Form::text('searchQuery', null, ['class' => 'form-control']) !!}

                {{ Form::submit('Zoek link', ['class' => 'btn btn-default']) }}

                {{ Form::close() }}

            </div>
            <ul class="list-group list-group-flush">
                @if(!$links->isEmpty())
                @foreach($links as $link)
                    <li class="list-group-item d-flex">
                        <div class="col">
                            <a class="btn btn-success" href="{{route('link.upvote', $link->id)}}">^</a>
                            <a class="btn btn-success" href="{{route('link.upvote', $link->id)}}">v</a>
                            <span style="display: block;">Score: {{$link->score}}</span>
                        </div>
                        <div class="col">
                            <a href="{{ route('link.show', $link->id) }}">
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
</div>
@endsection
