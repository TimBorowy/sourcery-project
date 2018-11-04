@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>Categories</h1>
                <div>
                    <a class="btn btn-primary" href="{{route('category.create')}}">Create category</a>
                </div>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($categories as $category)
                <li class="list-group-item d-flex">
                    <div class="p-1 flex-grow-1">
                        <a href="{{ route('category.show', $category->id) }}">
                            <h2>{{$category->name}}</h2>
                        </a>

                    </div>
                    <div class="p-1">
                        <a class="btn btn-success" href="{{route('category.edit', $category->id)}}">Edit category</a>
                    </div>
                    <div class="p-1">
                        {!! Form::model($category, ['route' => ['category.destroy', $category], 'method' => 'DELETE']) !!}
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
