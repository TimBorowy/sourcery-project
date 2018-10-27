@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 topMargin">
                <h1>{{$tag->name}}</h1>

                {!! Form::model($tag, ['route' => ['tag.destroy', $tag], 'method' => 'DELETE']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}

                <h3>Links</h3>


                @foreach($tag->links as $link)
                    <a href="{{route('link.show', $link->id)}}">{{$link->description}}</a>
                @endforeach
            </div>

        </div>
    </div>

@endsection