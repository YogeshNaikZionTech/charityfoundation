@extends('layouts.main')

@section('title', '| Events')
@section('stylesheets')
  <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

  <div class="main" id="content">
    <div class="h">
      <h2>Events</h2>
      @if(Auth::check()&& Auth::user()->isAdmin)
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEvent">+ Create Event</button>
        <div id="createEvent" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Event</h4>
              </div>
              <form class="form-group" action="{{url('events')}}" method="post">
                <div class="modal-body">
                  <label>Event Name</label>
                  <input type="text" name="ename" class="form-control">
                  <label>Venue</label>
                  <input type="text" name="Location" class="form-control">
                  <label>Date</label>
                  <input type="date" class="form-control">
                  <label>Start Time</label>
                  <input type="time" class="form-control">
                  <label>End Time</label>
                  <input type="time" class="form-control">
                  <label>Event Description</label>
                  <textarea placeholder="Description of the event" class="form-control"></textarea>
                  <label>Upload an image</label>
                  <input type="file" name="pic" accept="image/*">
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" data-dismiss="modal">
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    @endif
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
            <li><a data-toggle="tab" href="#completed">Completed Events</a></li>
          </ul>
          <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">

              @foreach($events_f as $event)
                <div class="col-md-3">
                  <div class="thumbnail">
                    <img src="/images/{{$event->event_Image}}" alt="event2">
                    <div class="caption">
                      <a href="#{{$event->event_id}}" class="eNAme"><h3>{{substr($event->event_Title,0,20)}}</h3></a>
                      <p>{{substr($event->event_Title, 0, 25)}}</p>
                      <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="eventDesc" id="{{$event->event_id}}">
                  <h2>Event Title: {{$event->event_Title}}</h2>
                  <p>Description:<br>{{$event->event_Description}}</p>
                  <h3>Event Location: {{$event->event_Location}}</h3>
                  <h3>Start Time: {{date('M j, Y, h:ia', strtotime($event->event_StartTime))}}</h3>
                  <h3>End Time: {{date('M j, Y, h:ia', strtotime($event->event_StartTime))}}</h3>

                </div>
            @endforeach
            {{--<div class="col-md-3">--}}
            {{--<div class="thumbnail">--}}
            {{--<img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="event3">--}}
            {{--<div class="caption">--}}
            {{--<a href="#desc" class="eNAme"><h3>Event Name</h3></a>--}}
            {{--<p>Short summary of event description.</p>--}}
            {{--<p>--}}
            {{--<a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>--}}
            {{--<a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="thumbnail">--}}
            {{--<img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="event3">--}}
            {{--<div class="caption">--}}
            {{--<a href="#desc" class="eNAme"><h3>Event Name</h3></a>--}}
            {{--<p>Short summary of event description.</p>--}}
            {{--<p>--}}
            {{--<a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>--}}
            {{--<a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            <!--  -->
              <div class="text-center">
                {!! $events_f->links()!!}
              </div>
            </div>

            <div id="completed" class="tab-pane fade">
              @foreach($events_c as $eventc)
                <div class="col-md-3">
                  <div class="thumbnail">
                    <img src="/images/{{$eventc->event_Image}}" alt="event2">
                    <div class="caption">
                      <a href="#{{$eventc->event_id}}" class="eNAme"><h3>{{substr($eventc->event_Title,0,20)}}</h3></a>
                      <p>{{substr($eventc->event_Title, 0, 25)}}</p>
                      <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="eventDesc" id="{{$eventc->event_id}}">
                  <h2>Event Title: {{$eventc->event_Title}}</h2>
                  <p>Description:<br>{{$eventc->event_Description}}</p>
                  <h3>Event Location: {{$eventc->event_Location}}</h3>
                  <h3>Start Time: {{date('M j, Y, h:ia', strtotime($eventc->event_StartTime))}}</h3>
                  <h3>End Time: {{date('M j, Y, h:ia', strtotime($eventc->event_StartTime))}}</h3>

                </div>
              @endforeach
              <div class="text-center">
                {!! $events_c->links()!!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $(".eventDesc").hide();
      $(".eNAme").click(function(){
        $(".eventDesc").toggle();
      });
    });
  </script>
<!--   <script type="text/javascript">
    $(document).ready(

            function() {
              $('.nav li:first').removeClass('active');
              $('.nav li:nth-child(4)').addClass('active');
            });
  </script> -->
@endsection


