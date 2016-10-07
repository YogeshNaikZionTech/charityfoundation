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
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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
                  <input type="submit" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
    @endif
    </div>
    <hr>
        <div class="container-fluid">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
            <li><a data-toggle="tab" href="#completed">Completed Events</a></li>
          </ul>
          <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">

              @foreach($events_f as $i => $event)
              @if($i%4 == 0)
          
              <div class="row">
              @endif
          <div class="eve">
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <div class="thumbnail">
                    <img src="/images/{{$event->event_Image}}" alt="event2">
                    <div class="caption">
                      <a id="desc" class="eName"><h3>{{substr($event->event_Title,0,20)}}</h3></a>
                      <p>{{substr($event->event_Title, 0, 25)}}</p>
                      <!-- <p>ID is {{$event->event_id}}</p> -->
                      <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="{{url('/donates/create')}}" class="btn btn-success pull-right" id="vol" role="button">Volunteer</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="eventDesc" style="display: none">
                <div class="test" style="color: black" data-toggle="test">
                  <div>
                    <h2 style="display: inline-block;">Event Title: {{$event->event_Title}}</h2>
                    <span class="glyphicon glyphicon-remove pull-right close"  ></span>
                  </div>
                  <p>Description:{{$event->event_Description}}</p>
                  <h3>Event Venue: {{$event->event_Location}}</h3>
                  <h4>Start Time: {{date("M j, Y, h:ia", strtotime($event->event_StartTime))}}</h4>
                  <h4>End Time: {{date("M j, Y, h:ia", strtotime($event->event_StartTime))}}</h4>
                </div>
                </div>
              </div>


              @if($i%4 == 3)
              
              </div>
              @elseif ($i+1 == (count($events_f)))
          
              </div>
              @endif
               
            @endforeach

              <!-- Pagination -->
       <div class="row">
         <div class="col-md-12">
              <div class="text-center">
                {!! $events_f->links()!!}
              </div>
          </div>
      </div>

            </div>  <!-- End of upcoming tab -->

            <div id="completed" class="tab-pane fade">
              @foreach($events_c as $i=>$eventc)

                           @if($i%4 == 0)
          
              <div class="row">
              @endif
            <div class="eve">
                <div class="col-md-3">
                  <div class="thumbnail">
                    <img src="/images/{{$eventc->event_Image}}" alt="event2">
                    <div class="caption">
                      <a  class="eName"><h3>{{substr($eventc->event_Title,0,20)}}</h3></a>
                      <p>{{substr($eventc->event_Title, 0, 25)}}</p>
                      <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="{{url('/donates/create')}}" class="btn btn-success pull-right" role="button">Read More</a>
                      </p>
                    </div>
                  </div>
                </div>
               <div class="eventDesc" style="display: none">
                <div class="test" data-toggle="test">
                  <div>
                    <h2 style="display: inline-block;">Event Title: {{$eventc->event_Title}}</h2>
                    <span class="glyphicon glyphicon-remove pull-right close"  ></span>
                  </div>
                  <p>Description:{{$eventc->event_Description}}</p>
                  <h3>Event Venue: {{$eventc->event_Location}}</h3>
                  <h4>Start Time: {{date("M j, Y, h:ia", strtotime($eventc->event_StartTime))}}</h4>
                  <h4>End Time: {{date("M j, Y, h:ia", strtotime($eventc->event_StartTime))}}</h4>
                </div>
                </div>
            </div>

              @if($i%4 == 3)
              </div>
              @elseif ($i+1 == (count($events_c)))
              </div>
              @endif
              @endforeach

              <!-- Pagination -->
      <div class="row">
         <div class="col-md-12">
              <div class="text-center">
                {!! $events_c->links()!!}
              </div>
          </div>
      </div>

              


            </div> <!-- End of completed tab -->
          </div> <!-- End of Tab content -->
        </div>
  
  </div> <!-- End of main content -->



@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
            sessionStorage.removeItem('project');
            sessionStorage.removeItem('event');

$( '#vol').click(function(){
          sessionStorage.removeItem('project');
           var eventValue = $(this).parent().parent().find('a.eName').text()
            sessionStorage.setItem('event', eventValue);
        });
       

      $(".eName").click(function(){
       $('.test2').hide();
        var d = $(this).closest('.eve').find('.eventDesc').html();
     $(this).closest('.row').after('<div class="test2">' + d + '</div');
      });

$('body').on('click', '.close', function(){
        $(this).closest('.test').fadeOut();
});





    });
  </script>

@endsection