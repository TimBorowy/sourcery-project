@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Update Category</h1>
                    <a class="btn btn-primary" href="{{route('category.index')}}">Back</a>
                    <a class="btn btn-primary" href="{{route('category.create')}}">New category</a>
                </div>
                {!! Form::model($category, ['route' => ['category.update', $category], 'method' => 'patch']) !!}
                @include('category.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection