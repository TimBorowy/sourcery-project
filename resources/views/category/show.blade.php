@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 topMargin">
                <h1>{{$category->name}}</h1>


                {!! Form::model($category, ['route' => ['category.destroy', $category], 'method' => 'DELETE']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remove', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}

            </div>

        </div>
    </div>

@endsection