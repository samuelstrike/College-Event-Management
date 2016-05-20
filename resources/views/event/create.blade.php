@extends('layout')

@section('content')

<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">Events</a></li>
			<li class="active">Add new event</li>
		</ol>
	</div>
</div>

@include('message')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h3 class="page-head-line">Add Event </h3>
		<div class="panel panel-danger">
        <div class="panel-heading">Event</div>	
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
			
		<form action="{{ url('events') }}" method="POST" files="true" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
				<label for="name">Your Name</label>
			<div class="input-group">	
				<input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}">
				<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
                    </span>
            </div>
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" placeholder="Enter the title of the event" value="{{ old('title') }}">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Time</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" id="time" placeholder="Select your time" value="">
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
			<div class="form-group @if($errors->has('venue')) has-error has-feedback @endif">
				<label for="venue">Venue</label>
				<select class="form-control" name="venue">
					<option selected disabled><------------select the venue--------------></option>
    				<option value="Multipurpose hall">Multipurpose hall</option>
    				<option value="Conference hall 1">Conference hall 1</option>
    				<option value="Conference hall 2">Conference hall 2</option>
    				<option value="CR#8">CR#8</option>
    				<option value="CR#12">CR#12</option>
    				<option value="Dinning hall">Dinning hall</option>

    			</select>
				@if ($errors->has('venue'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('venue') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('agenda')) has-error has-feedback @endif">
				<label for="agenda">Agenda</label>
				<input type="file" class="form-control" name="agenda" placeholder="" value="">
				@if ($errors->has('agenda'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('agenda') }}
					</p>
				@endif
			</div> 
			
			
		<div id="dynamicInput" class="form-group">
			<!-- <input type="button" value="Add attendee" class="btn btn-primary" onClick="addInput('dynamicInput');"> -->
     	
		
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Member</button>


		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="exampleModalLabel">Add Member</h4>
		      </div>
		      <div class="modal-body">
		        <form>
		          <div class="form-group">
		            <label for="name" class="control-label">Name:</label>
		            <input type="text" class="form-control" id="name">
		          </div>
		          <div class="form-group">
		            <label for="email" class="control-label">Email:</label>
		            <input type="text" class="form-control" id="name">
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" >submit</button>
		      </div>
		    </div>
		  </div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>		
	</div>
	<!-- </div> -->
<!-- </div> -->
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
		"StartDate": moment('<?php echo date('Y-m-d G')?>'),		
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"alwaysShowCalendars": false,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
<script type="text/javascript">
	
	var counter = 1;
var limit = 20;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "attendee " + (counter + 0) + " <input type='text' name='myInputs[]' class='form-control' placeholder='attendee email address' required>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>
@endsection