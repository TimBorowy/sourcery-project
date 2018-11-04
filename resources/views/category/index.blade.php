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
                </li>
                @endforeach

                <li class="list-group-item">Vestibulum at eros</li>
            </ul>

        </div>
    </div>
@endsection
