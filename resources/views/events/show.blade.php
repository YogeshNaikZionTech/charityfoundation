@extends('layouts.main')

@section('title', '| Events')
@section('stylesheets')
    <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div class="main container-fluid" id="content">
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
                                    <input type="time" name='stime' class="form-control">
                                    <label>End Time</label>
                                    <input type="time" name='etime' class="form-control">
                                    <label>Event Description</label>
                                    <textarea placeholder="Description of the event" name='description' class="form-control"></textarea>
                                    <label>Upload an image</label>
                                    <input type="file" name="eimage" accept="image/*">
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
            <div class="upcomingContent">
        
           </div>

              <!-- Pagination -->
              <div class="row">
              <div class="col-md-12">
                    <ul class="pagination" id="upPages">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           <!--          <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li> 

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li> -->
                    </ul>
              </div>
              </div>
                    </div>  <!-- End of upcoming tab -->

            <div id="completed" class="tab-pane fade">
                @foreach($events_c->chunk(3) as $chunk)
                  <div class="row">
                  @foreach($chunk as $event)
              <div class="eve">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail">
                  <div class="image">
                    <img src="/images/{{$event->event_Image}}" alt="event2">
                      <a href="{{url('/donates/create')}}" id="vol" role="button"><button type="button" class="btn btn-warning">Read More</button></a>
                  </div>
                  <div class="caption col-md-12 col-sm-12 col-xs-12">
                    <div class="date col-md-2">
                      <h3>{{date("M j", strtotime($event->event_StartTime))}}</h3>
                    </div>
                    <div class="details col-md-10" style="margin: 0px">
                      <a>
                        <p>
                          <h3 id="desc" class="eName">{{substr($event->event_Title,0,20)}}</h3> 
                        </p>
                      </a>
                      <p>
                        <h6><span class="glyphicon glyphicon-map-marker"></span>{{$event->event_Location}} &nbsp; &nbsp; &nbsp; <span class="glyphicon glyphicon-time"></span>{{date("h:ia", strtotime($event->event_StartTime))}} - {{date("h:ia", strtotime($event->event_StartTime))}}</h6>
                      </p>
                    </div>
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
            @endforeach
              </div>
            @endforeach

                      <!-- Pagination -->
               <div class="row">
                 <div class="col-md-12">
                      <ul class="pagination" id="comPages">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    </ul>
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
              var eventValue = $(this).closest('.thumbnail').find('#desc').text();
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
  <script>
      $(document).ready(function(){
          var scroll_start = 5;
          var startChange = $('.nav1');
          var offset = startChange.offset();
          $(document).scroll(function() {
              scroll_start = $(this).scrollTop();
              if(scroll_start > offset.top) {
                  $('.nav1').css('background-color', 'rgba(34,34,34,0.9)');
              } else {
                  $('.nav1').css('background-color', 'transparent');
              }
          });
      });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
 $.ajaxSetup({
      headers:
      {
          'X-CSRF-Token': $('input[name="_token"]').val()
      }
    });


      //Calculating the number of pages based on Event Count
      $.ajax({
      url : 'events/lists/count',
      type: 'GET',
      datatype: 'JSON',
      success: function(response){
          response = JSON.parse(response);
          var upcomingPages = Math.ceil(response.events_Future/8);
          var completedPages = Math.ceil(response.events_Completed/8);

          for( var i=1; i<=upcomingPages; i++){
              $('#upPages').append('<li><a class="upPageClick" name=' +i+   '>'+i+'</a></li>');
          }
          for( var i=1; i<=completedPages; i++){
              $('#comPages').append('<li><a class="comPageClick" name=' +i+   '>'+i+'</a></li>');
          }
        $('#upPages').children('li:first').addClass('active');
        }

      });

      // Load the upcoming events
      $.ajax({
        url: 'events/page/future/',
        type: 'POST',
        data: {'id': 1},
        datatype: 'JSON',
        success: function (response) {
                      var output ="";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var eDate = new Date(val.event_Date);
                  eDate1 = eDate.getDate();
                  locale = "en-us";
                  eDate2 = eDate.toLocaleDateString("en-us",{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;

                   output += "<div class='col-md-4'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' id='vol' role='button'><button type='button' class='btn btn-warning'>Volunteer</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px'> <a><p><h3 id='desc' class='eName'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                  $('.upcomingContent').html(output);
        }
      });



      //Getting the content based on Page number

    $('body').on('click', '.upPageClick', function(){
   
     var id =  $(this).attr('name');
                  $.ajax({
                    url: 'events/page/get/',
                    type: 'POST',
                    data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                      var output ="";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var eDate = new Date(val.event_Date);
                  eDate1 = eDate.getDate();
                  locale = "en-us";
                  eDate2 = eDate.toLocaleDateString("en-us",{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;

                   output += "<div class='col-md-4'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' id='vol' role='button'><button type='button' class='btn btn-warning'>Volunteer</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px'> <a><p><h3 id='desc' class='eName'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                  $('.upcomingContent').html(output);
                    }
                  });
                  $('#upPages').children('li').removeClass('active');
                  $('#upPages').find("a[name="+id+"]").closest('li').addClass('active');
                  // $('#upPages').children("li a[name="+id+"]").addClass('active');
              });


    });
  </script>
@endsection