@extends('layout')

@section('content')
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/events') }}">Events</a></li>
			<li class="active">{{ $event->title }}</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-head-line">{{ $event->title }} <small><em>created by {{ $event->name }}</em></small></h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<p>Venue:{{$event->venue}} <br></p>
		
		<p>Time: <br>
		{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
		</p>
		<p>Duration: <br>
		{{ $duration }}
		</p>
		<p>
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/download')}}">
				<span class="glyphicon glyphicon-download"></span> Download Event Agenda</a>
		</p>
		@if(Auth::user())
		<p>
			<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</form>
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Edit</a> 
			
			
		</p>
		@endif
	</div>
</div>
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