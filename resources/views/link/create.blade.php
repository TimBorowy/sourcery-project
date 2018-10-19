@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Create Link</h1>
                    <a class="btn btn-primary" href="{{route('link.index')}}">Back</a>
                </div>
                {!! Form::open(['route' => 'link.store']) !!}
                @include('link.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection