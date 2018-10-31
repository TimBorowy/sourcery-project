@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h1>Update your account</h1>
                </div>
                {!! Form::model($user, ['route' => ['account.update', $user], 'method' => 'patch']) !!}
                @include('account.forms.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection