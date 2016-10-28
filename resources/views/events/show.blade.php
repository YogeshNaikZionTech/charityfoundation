@extends('layouts.main')

@section('title', '| Events')
@section('stylesheets')
    <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
  <div class="main container-fluid" id="content">
    <div class="main" id="content">
        @if(Session::has('EventCreated'))
            <div class="alert alert-success" role="alert">
                <strong>{{\Session::get('EventCreated')}}</strong>
            </div>
        @endif

        <div class="h">
            <h2>Events</h2>
        </div>
        <hr>
                <div id="eventDetails" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header create">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                                <div class="modal-body">
                                  <img src="" atl='event_Image' class="eimg img-responsive" height="250px" width="250px">
                                  <div class="right">
                                    <h2 style="color: green">Venue: <span class="loc"></span> </h2> <br>
                                    <h3 style="color: green">Date: <span class="dat"></span> </h3> <br>
                                    <h4 style="color: green">From: <span class="tim1"></span></h4> <br>
                                    <h4 style="color: green">To: <span class="tim2"></span></h4>
                                  </div>
                                    <p class="des"><p>
                                </div>
                                <div class="modal-footer">
                                   <a href="{{url('/donates/create')}}"> <input type="button" class="btn btn-success" value="Volunteer"></a>
                                </div>
                        </div>
                    </div>
                </div>
        <div class="container-fluid">
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
            <li><a data-toggle="tab" id="completedTab" href="#completed">Completed Events</a></li>
          </ul>
          <div class="tab-content">

            <div id="upcoming" class="tab-pane fade in active">
              <div class="upcomingContent">
              <!-- Upcoming events will get populated here -->
             </div>
                            <!-- Pagination -->
              <div class="row">
                <div class="col-md-12 page">
                    <ul class="pagination" id="upPages">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </ul>
                </div>
              </div>
            </div>  <!-- End of upcoming tab -->

            <div id="completed" class="tab-pane fade">
                <div class="completedContent">
                <!-- Completed events will get populated here -->
                </div>
                            <!-- Pagination -->
               <div class="row">
                 <div class="col-md-12 page">
                      <ul class="pagination" id="comPages">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </ul>
                  </div>
              </div> 
            </div> <!-- End of completed tab -->
          </div> <!-- End of Tab content -->
        </div>

    </div> <!-- End of main content -->



@endsection
@section('scripts')
<script type="text/javascript" src="{{URL::asset('/js/nav.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          sessionStorage.removeItem('project');
          // sessionStorage.removeItem('event');

          $( 'body').on('click', '#vol', function(){
              sessionStorage.removeItem('project');
              var eventValue = $(this).closest('.thumbnail').find('.eName').attr('name');
              sessionStorage.setItem('event', eventValue);
          });


          $(".eName").click(function(){
              $('.test2').hide();
              var d = $(this).closest('.eve').find('.eventDesc').html();
              $(this).closest('.row').after('<div class="test2">' + d + '</div>');
          });

          $('body').on('click', '.close', function(){
              $(this).closest('.test').fadeOut();
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
        }

      });

      // Load the upcoming events on load
      $.ajax({
        url: 'events/page/future/',
        type: 'POST',
        data: {'id': 1},
        datatype: 'JSON',
        success: function (response) {
                      var output ="";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var dateWithTimeZone = val.event_Date + "PST";
                  var dateObject = new Date(dateWithTimeZone);
                  // var eDate = new Date(val.event_Date);
                  eDate1 = dateObject.getDate();
                  locale = "en-us";
                  eDate2 = dateObject.toLocaleDateString(locale,{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;
// 
                   output += "<div class='col-md-4 col-sm-6'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' id='vol' role='button'><button type='button' class='btn btn-warning'>Volunteer</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px'> <a><p><h3 id='desc' class='eName' name='"+val.id+"'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                  $('.upcomingContent').html(output);
        $('#upPages').children('li:first').addClass('active');

        }
      });

//Loading Completed Events on load

$.ajax({
        url: 'events/page/current/',
        type: 'POST',
        data: {'id': 1},
        datatype: 'JSON',
        success: function (response) {
                      var output ="";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var dateWithTimeZone = val.event_Date + "PST";
                  var dateObject = new Date(dateWithTimeZone);
                  // var eDate = new Date(val.event_Date);
                  eDate1 = dateObject.getDate();
                  locale = "en-us";
                  eDate2 = dateObject.toLocaleDateString(locale,{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;

                   output += "<div class='col-md-4 col-sm-6'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' role='button'><button type='button' class='btn btn-warning'>Read More</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px'> <a><p><h3 id='desc' class='eName' name='"+val.id+"'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                  $('.completedContent').html(output);
        $('#comPages').children('li:first').addClass('active');

        }
      });


      //Getting the content based on Page number for upcoming

    $('body').on('click', '.upPageClick', function(){
   
     var id =  $(this).attr('name');
                  $.ajax({
                    url: 'events/page/future/',
                    type: 'POST',
                    data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                      var output ="";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var dateWithTimeZone = val.event_Date + "PST";
                  var dateObject = new Date(dateWithTimeZone);
                  eDate1 = dateObject.getDate();
                  locale = "en-us";
                  eDate2 = dateObject.toLocaleDateString(locale,{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;

                   output += "<div class='col-md-4 col-sm-6'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' id='vol' role='button'><button type='button' class='btn btn-warning'>Volunteer</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px'> <a><p><h3 id='desc' class='eName' name='"+val.id+"'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                  $('.upcomingContent').html(output);
                    }
                  });
                  $('#upPages').children('li').removeClass('active');
                  $('#upPages').find("a[name="+id+"]").closest('li').addClass('active');
              });

      //Getting the content based on Page number for upcoming
          $('body').on('click', '.comPageClick', function(){
   
               var id =  $(this).attr('name');
                  $.ajax({
                    url: 'events/page/current/',
                    type: 'POST',
                    data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                      var output ="<div class='row'>";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  var dateWithTimeZone = val.event_Date + "PST";
                  var dateObject = new Date(dateWithTimeZone);
                  // var eDate = new Date(val.event_Date);
                  eDate1 = dateObject.getDate();
                  eDate2 = dateObject.toLocaleDateString("en-us",{month: "short"});
                  var start = new Date(val.event_StartTime);
                  var end = new Date(val.event_EndTime);
                  var title = val.event_Title;

                   output += "<div class='col-md-4 col-sm-6'>    <div class='thumbnail'> <div class='image'> <img src='/images/"+ val.event_Image+"'><a href='{{url('donates/create')}}' role='button'><button type='button' class='btn btn-warning'>Read More</button></a> </div> <div class='caption col-md-12'> <div class='date col-md-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>  <div class='details col-md-10' style='margin:0px' > <a><p><h3 id='desc' class='eName' name='"+val.id+"'>"+title+"</h3></p></a> <p><h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+"<span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString()+"-"+end.toLocaleTimeString()+"</h6></p> </div>      </div></div></div>"
                 });
                 output+= "</div>";
                  $('.completedContent').html(output);
                    }
                  });
                  $('#comPages').children('li').removeClass('active');
                  $('#comPages').find("a[name="+id+"]").closest('li').addClass('active');
              });
    });
  </script>
    <script type="text/javascript">
    $(document).ready(function(){

        //Pop up for Event Description Details
         $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
        });

            //Call to get the description details based on event id 
         $('body').on('click','.eName', function(){
           
               
            var id = $(this).attr('name');
            $.ajax({
                url: 'events/'+id,
                type: 'GET',
                datatype: 'JSON',
                success: function(response){

                       response = JSON.parse(response);
                        var dateWithTimeZone = response[0].event_Date + "PST";
                  var dateObject = new Date(dateWithTimeZone);
                  eDate1 = dateObject.getDate();
                  eDate2 = dateObject.toLocaleDateString("en-us",{month: "long"});
                  eDate3 = dateObject.getFullYear();

                  var start = new Date(response[0].event_StartTime);
                  var end = new Date(response[0].event_EndTime);

                  var imgstr = '/images/'+ response[0].event_Image;
                  // var title = val.event_Title;
                  $('.eimg').attr('src', imgstr)
                    $('.modal-title').html(response[0].event_Title);
                    $('.des').html(response[0].event_Description) ;
                    $('.loc').html(response[0].event_Location);
                    // $('.dat').html(response[0].event_Date);
                    $('.dat').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
                    $('.tim1').html(start.toLocaleTimeString());
                    $('.tim2').html(end.toLocaleTimeString());

                }
            });
            $('#eventDetails').modal('show');
         });
 });
    </script>
@endsection