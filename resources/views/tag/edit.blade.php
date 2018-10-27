@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Update tag</h1>
                    <a class="btn btn-primary" href="{{route('tag.index')}}">Back</a>
                    <a class="btn btn-primary" href="{{route('tag.create')}}">New Link</a>
                </div>
                {!! Form::model($tag, ['route' => ['tag.update', $tag], 'method' => 'patch']) !!}
                @include('tag.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection