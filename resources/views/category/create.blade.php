@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Create Category</h1>
                    <a class="btn btn-primary" href="{{route('category.index')}}">Back</a>
                </div>
                {!! Form::open(['route' => 'category.store']) !!}
                @include('category.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection