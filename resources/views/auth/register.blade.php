@extends('layout')
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
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

{!! Form::open(array('url' => URL::to('/auth/register'), 'method' => 'post', 'autocomplete'=>'off')) !!}
{!! csrf_field() !!}
            <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">
                <label class="control-label">Name</label>
                <div class="controls">
                    {!! Form::text('username', null, array('class' => 'form-control',)) !!}
                </div>
            </div>
             <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label">E-Mail Address</label>
                <div class="controls">
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('registration') ? 'has-error' : '' }}">
                <label class="control-label">Registration #</label>
                <div class="controls">
                    {!! Form::text('registration',null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">
                <label class="control-label" name="department">Department</label>
                
                <select class="form-control" name="department">
                    <option selected disabled>------------select the department--------------</option>
                    <option value="Civil and Architecture">Civil and Architecture</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Electronic and Communication">Electronic and Communication</option>
                    <option value="Information Technology">Information Technology</option>
                    

                </select>
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label">Password</label>
                <div class="controls">
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label class="control-label"> Confirm Password</label>
                <div class="controls">
                    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                </div>
            </div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
    Register
</button>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection