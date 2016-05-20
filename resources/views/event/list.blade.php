@extends('layout')

@section('content')
<div class="row">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li class="active"><a href="{{ url('/events') }}">Events</a></li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="content-wrapper">
	<div class="container">
	<div class="col-lg-12">
    <h4 class="page-head-line">Event List</h4>
      <div class="panel panel-default">
      	 <div class="panel-heading">
               Event List
          </div>
		<div class="panel-body">
        <div class="table-responsive">

		@if($events->count() > 0)
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Event Title</th>
					<th>Start</th>
					<th>End</th>
					<th>Venue</th>	
					<th>Action</th>
					<th>Action</th> 
					 

				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($events as $event)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td><a href="{{ url('events/' . $event->id) }}">{{ $event->title }}</a></td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					<td>{{$event->venue}}</td>
					<td>
						<a class="btn btn-primary btn-xs" href="{{ url('events/' . $event->id . '/edit')}}">
							<span class="glyphicon glyphicon-edit"></span> Edit</a> 
					</td>
					<td>	
						<form action="{{ url('events/' . $event->id) }}" style="display:inline" method="POST">
							<input type="hidden" name="_method" value="DELETE" />
							{{ csrf_field() }}
							<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</form>
						
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@else
			<h2>No event yet!</h2>
		@endif
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
