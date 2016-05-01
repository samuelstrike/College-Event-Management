@section('content')


@foreach($event as $event)
 <a href="public/upload/{{$event->agenda}}" download="{{$report->agenda}}">{{$report-agenda}}</a>
@endforeach
@endsection