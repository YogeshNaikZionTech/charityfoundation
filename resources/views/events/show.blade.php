@extends('layouts.main')

@section('title', '| Events')
@section('stylesheets')
    <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

  <div class="main">
  <div class="h">
    <h2>Events</h2>
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEvent">Add New Event +</button>
        <div id="createEvent" class="modal fade" role="dialog">
          <div class="modal-dialog">
                    <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Event</h4>
              </div>
              <form class="form-group" action="xyz.php" action="POST">
                <div class="modal-body">
                  <label>Event Name</label>
                    <input type="text" class="form-control">
                  <label>Venue</label>
                    <input type="text" class="form-control">
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
   
      


    <hr>
    <div class="row">
      <div class="col-md-9">
        <div class="container-fluid">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
            <li><a data-toggle="tab" href="#completed">Completed Events</a></li>
          </ul>
          <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="event1">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                    <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="event2">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                    <p>
                      <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                         </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="event3">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                   <p>
                      <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                         </p>
                  </div>
                </div>
              </div><div class="eventDesc">
                <h2>Event Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h3>Venue</h3>
                <h3>Date & Time</h3>
              </div>
              <!--  -->
            </div>

            <div id="completed" class="tab-pane fade">
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="event1">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="event2">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="event3">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Event Name</h3></a>
                    <p>Short summary of event description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="eventDesc">
                <h2>Event Name</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h3>Venue</h3>
                <h3> Date & Time</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="container-fluid">
          <div class="thumbnail" id="dList">
            <div class="donors">
              <div class="list-group">
                <a href="#" class="list-group-item active">Top Donors</a>
                <a href="#" class="list-group-item">Name One</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
                <a href="#" class="list-group-item">Name Two</a>
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
  @endsection