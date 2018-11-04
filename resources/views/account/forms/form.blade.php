<div class="form-group">
    {!! Form::label('name', 'Username:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'name'])
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail address:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'email'])
</div>

<div class="form-group">
    {!! Form::label('password', 'New password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'password'])
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm your password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @include('errors.validation', ['error' => 'password_confirmation'])
</div>



<div class="form-group">
    <button class="form-control btn btn-primary">Submit</button>
</div>