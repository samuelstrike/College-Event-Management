@extends('layout')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li class="active">User Manual</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="panel-body">
		<h2><strong>College Event Management System</strong></h2>
  		<em>We recommend our user for easy access to our system</em>
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">View Event</a>
        </h4>
      </div>
	   <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Event can be viewed by guest user and the member secretary responsible for scheduling the event.<br>Guest user can view the event without login with less user privileges whereas member secretary can have full privileges in managing the event
        <br><br>
        <h4 class="panel-title"><a data-toggle="collapse" ><Strong>Guest User</Strong></a></h4>
           <div id="collapse1" class="panel-collapse collapse in">
			Guest user can simply log in to system and can view the event on calender but the user does not have the privileges to the system.<br> User can view event scheduled by monthly,weekly and current day on simultaneous month by clicking on navigation arrow
		    <h4>Calender view for guest user</h4>
			<img class="img-responsive" src="{{url('/images/calender.png')}}" alt="calendar" width="700" height="550"> 
		   </div><br>
		
		<h4 class="panel-title"><a data-toggle="collapse" ><strong>Member Secretary</strong></a></h4>
            <div id="collapse1" class="panel-collapse collapse in">
			Member Secretary have to register in the system and can sign in to access the system functionalities and the privileges are given based on the information stored after registration.<br> He/She have privileges to view as well as added functionality to add event 
		     
			</div>
        </div>
	 </div>
	 
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Add Event</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Once member secretary have full access to system,he/she is  directed to add/delete event form where event details like event name,time,date,venue and attendee are managed.
		While adding event,system provide time,venue and member clashes if member secretary tends to schedule the event on given time,venue and member.<br>
		The secretary also can go to add Event List that are added and can also edit or delete if necessary.
		<h4>Form for Adding Event </h4>
	    <img class="img-responsive" src="{{url('/images/addevent.png')}}" alt="addEvent" width="700" height="550"> 
		</div>
      </div>
    </div>
	
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Email Notification</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">When Member secretary register for the event,he/she is given to fill up email_id so that once event is scheduled can send email notifications to the attendee whoever present or the guest user</div>
      </div>
    </div>
	</div> 
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Meeting Information</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Meeting Information consist of various meeting details with meeting agenda which is uploaded or downloaded in form of file.</div>
         <h4>File upload and download</h4>
         <em>All the events' agenda are uploaded while creating the event by the event secretary. Users can download the various agenda of the particular event.</em>
	  </div>
    </div>
	
</div>



	</div>
</div>
@endsection