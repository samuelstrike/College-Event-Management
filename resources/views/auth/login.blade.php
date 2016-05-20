@extends('layout')
@section('content')

    <div class="container-fluid">
        <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
        <h1 class="page-head-line">Please Login to Add Event </h1>
        <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div style="float:right; font-size: 80%; position: relative; top:-30px">
        <a href="{{ URL::to('auth/register') }}" class="btn btn-danger btn-xs">Sign Up</a>
        </div>
        <div class="panel-body">
                     
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Sorry!!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('url' => URL::to('auth/login'), 'method' => 'post', 'autocomplete'=>'off')) !!}
{!! csrf_field() !!}
<div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
    <label class="control-label">UserName</label>
    <div class="controls">
        {!! Form::text('username', null, array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
    <label class="control-label">Password</label>
    <div class="controls">
        {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" name="remember"> Remember Me
</label>
</div>
</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
        Login
    </button>


<a href="{{ url('/password/email') }}">Forgot password?</a>
</div>
</div>
 {!! Form::close() !!}

</div>
</div>
</div>

</div>
</div>
@endsection
