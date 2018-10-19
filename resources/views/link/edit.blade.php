@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Update link</h1>
                    <a class="btn btn-primary" href="{{route('link.index')}}">Back</a>
                    <a class="btn btn-primary" href="{{route('link.create')}}">New Link</a>
                </div>
                {!! Form::model($link, ['route' => ['link.update', $link], 'method' => 'patch']) !!}
                @include('link.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection