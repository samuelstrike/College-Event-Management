@extends('layout')

@section('content')
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">Events</a></li>
			<li class="active">Edit - {{ $event->title }}</li>
		</ol>
	</div>
</div>
<!-- <div class="jumbotron"> -->

<div class="row">
 <div id="" style="margin-top: 10px;" class="mainbox col-md-10 col-md-offset-1">
    <div class="panel panel-info">
    	<div class="panel-heading">
            <div class="panel-title"><span class="glyphicon glyphicon-plus"></span>Edit</div>
            
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
		
		<form action="{{ url('events/' . $event->id) }}" method="POST" files="true" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT" />
			<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
				<label for="name">Your Name</label>
				<input type="text" class="form-control" name="name" value="{{ $event->name }}" placeholder="E.g. Samuel">
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>

			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="{{ $event->title }}" placeholder="E.g. My event title">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('venue')) has-error has-feedback @endif">
				<label for="venue">Venue</label>
				<select class="form-control" name="venue" value='{{ $event->venue }}'>
					<option selected disabled>{{ $event->venue }}</option>
    				<option value="Multipurpose hall ">Multipurpose hall</option>
    				<option value="Conference hall 1 ">Conference hall 1</option>
    				<option value="Conference hall 2 ">Conference hall 2</option>
    				<option value="CR#8 ">CR#8</option>
    				<option value="CR#12 ">CR#12</option>
    				<option value="Dinning hall ">Dinning hall</option>

    			</select>
				@if ($errors->has('venue'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('venue') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('agenda')) has-error has-feedback @endif">
				<label for="agenda">Agenda</label>
				<input type="file" class="form-control" name="agenda"  value="{{ $event->agenda }}">
				@if ($errors->has('agenda'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('agenda') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Time</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" value="{{ $event->start_time . ' - ' . $event->end_time }}" >
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>
</div>
</div>
<!-- </div> -->
@endsection

@section('js')
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@endsection