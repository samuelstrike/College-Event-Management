@extends('layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">You are here: Home</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-9">
		<h1 class="page-head-line">Calendar</h1>
		<div id='calendar'></div>
	</div>
	<div class="col-lg-3">
		<h1 class="page-head-line">Upcoming Events</h1>
	<div class="alert alert-success">
		<div id=''>1.FYP REVIEW II</div>
		<div id=''>2.Sport Meeting</div>
		<div id=''>3.Meeting 1</div>
		<div id=''>4.Football meeting</div>
	</div>
	<div class="alert alert-danger">

		<div></div>
	</div>
		
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		var base_url = '{{ url('/') }}';

		$('#calendar').fullCalendar({
			weekends: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: base_url + '/api',
				error: function() {
					alert("cannot load json");
				}
			}
		});
		
	});
</script>
@endsection
