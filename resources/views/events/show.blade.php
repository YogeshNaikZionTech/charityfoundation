@extends('layouts.main')

@section('title', '| Events')
@section('stylesheets')
    <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
  <div class="main container-fluid" id="content">
    @if(Session::has('EventCreated'))
      <div class="alert alert-success" role="alert">
        <strong>{{\Session::get('EventCreated')}}</strong>
      </div>
    @endif
    <div class="h">
      <h1 class="page-header">Events</h1>
    </div>
    <hr>
    <!-- Event Description Modal -->
    <div id="eventDetails" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header create">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="mTitle"></h4>
          </div>
        <div class="modal-body">
        <div class="row">
          <div class="col-md-5 col-lg-5">
          <img src="" atl='event_Image' class="eimg img-responsive" > <!-- height="250px" width="250px" -->
          </div>
          <div class="right col-md-7 col-lg-7">
            <h3>Venue: <span class="loc"></span> </h3> <br>
            <h3>Date: <span class="dat"></span> </h3> <br>
            <h4>From: <span class="tim1"></span></h4> <br>
            <h4>To: <span class="tim2"></span></h4>
          </div>
        </div>
          
          <p class="des"></p>
        </div>
        <div class="modal-footer">
          <a href="{{url('/donates/create')}}"> <input type="button" class="btn btn-success volunt" value="Volunteer"></a>
        </div>
        </div>
      </div>
    </div> <!-- Event Description Modal Ends Here -->
    <div class="container-fluid">
      <ul class="nav nav-tabs nav-justified eventTabs" role="tablist">
        <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
        <li><a data-toggle="tab" id="completedTab" href="#completed">Completed Events</a></li>
      </ul>
      <div class="tab-content">
        <div id="upcoming" class="tab-pane fade in active">
          <div class="upcomingContent row">
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
          <div class="completedContent row">
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
    sessionStorage.removeItem('event');
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
        if(response.events_Future > 0){
          var upcomingPages = Math.ceil(response.events_Future/8);
          if(upcomingPages > 1){
            for( var i=1; i<=upcomingPages; i++){
              $('#upPages').append('<li><a class="upPageClick" name=' +i+   '>'+i+'</a></li>');
            }
          }
          //load the upcoming events
          loadupcomingevents();
        }
        else if (response.events_Future == 0){
          // load 'no events to show' page
          $('.upcomingContent').html("<h3 class='noevents'> We're still working on this and will update our upcoming events soon! </h3> <br> <h5 class='noevents'>If you have any ideas/suggestions please get in touch with us <a href='{{url('/contact')}}' >here</a>. </h5>")
        }
        if(response.events_Completed > 0){
          var completedPages = Math.ceil(response.events_Completed/8);
          if(completedPages > 1){
            for( var i=1; i<=completedPages; i++){
              $('#comPages').append('<li><a class="comPageClick" name=' +i+   '>'+i+'</a></li>');
            }
          }
          //load completed events
          loadcompletedevents();
        }
        else if (response.events_Completed == 0){
          // load 'no events to show' page
          $('.completedContent').html("<h3 class='noevents'> We're still working on this and will update our completed events soon! </h3> <br> <h5 class='noevents'>If you have any ideas/suggestions please get in touch with us <a href='{{url('/contact')}}' >here</a>. </h5>")
        }
      }
    });
    

      // Load the upcoming events on load
  function loadupcomingevents(){
    $.ajax({
      url: 'events/upcomming/'+1,
      type: 'GET',
    //data: {'id': 1},
      datatype: 'JSON',
      success: function (response) {
        var time = 0;
        //var output ="";
        response = JSON.parse(response);
        $.each(response, function (key,val) {
          setTimeout(function(){
          var dateArray = val.event_Date.split('-');
          eDate1 = getMonth(dateArray[1]);
          eDate2 = dateArray[2];
          eDate3 = dateArray[0];
          var start = new Date(val.event_StartTime);
          var end = new Date(val.event_EndTime);
          var title = val.event_Title;
         var output = "<div class='col-md-4 col-sm-6 col-xs-12'> <div class='thumbnail'>  <div  class='image'> <img class='img-click' name='"+val.id+"' src='/images/events/"+ val.event_Image+"'> <a href='{{url("donates/create")}}' id='vol' role='button'>  <button type='button' class='btn btn-warning volBtn' name='"+val.id+"'>Volunteer</button>   </a>      </div>    <div class='caption1 col-md-12 col-sm-12 col-xs-12'>           <div class='date col-md-2 col-sm-2 col-xs-2'>    <div class='month col-xs-12 col-sm-12 col-md-12 col-lg-12'>  <h3>"+eDate1+"</h3> </div>  <div class='day col-xs-12 col-sm-12 col-md-12 col-lg-12'> <h3>"+eDate2+"</h3> </div> <div class='year col-xs-12 col-sm-12 col-md-12 col-lg-12'> <h3>"+eDate3+"</h3> </div>      </div>          <div class='details col-md-10 col-sm-10 col-xs-10' style='margin:0px'> <div class='title col-md-12 col-sm-12 col-xs-12'>              <a><h3 class='eName' name='"+val.id+"'>"+title+"</h3></a> </div> <div class='location col-md-12 col-lg-12 col-sm-12 col-xs-12'> <h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"</h6> </div>  <div class='time col-md-12 col-lg-12 col-sm-12 col-xs-12'>   <h6><span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+" - "+end.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+" "+"IST</h6>   </div>  </div> </div>  </div></div>"
         var k = $('<div>'+output+'</div>').hide();
          $('.upcomingContent').append(k);
          k.fadeIn();
        },time);
          time+= 175;
        });
        $('#upPages').children('li:first').addClass('active');
      }
    });
  } //End of loadupcomingevents function

//Reading the date as a string
function getMonth(d){
var monthArray = ['Jan', 'Feb','Mar','Apr','May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov', 'Dec'];
return monthArray[d-1];
};

    //Loading Completed Events on load
  function loadcompletedevents(){
    $.ajax({
      url: 'events/page/completed/',
      type: 'POST',
//      data: {'id': 1},
      datatype: 'JSON',
      success: function(response) {
        var output ="";
        response = JSON.parse(response);
        $.each(response, function (key,val) {
        var dateArray = val.event_Date.split('-');
          eDate1 = getMonth(dateArray[1]);
          eDate2 = dateArray[2];
          var start = new Date(val.event_StartTime);
          var end = new Date(val.event_EndTime);
          output = "<div class='col-md-4 col-sm-6 col-xs-12'>    <div class='thumbnail'> <div class='image'> <img class='img-click' name='"+val.id+"' src='/images/events/"+ val.event_Image+"'><a role='button'><button type='button' class='btn btn-warning readMore' name='"+val.id+"'>Read More</button></a> </div> <div class='caption1 col-md-12 col-sm-12 col-xs-12'> <div class='date col-md-2 col-sm-2 col-xs-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>   <div class='details col-md-10 col-sm-10 col-xs-10' style='margin:0px'>     <div class='title col-md-12 col-sm-12 col-xs-12'>                      <a><h3 class='eName' name='"+val.id+"'>"+val.event_Title+"</h3></a>        </div>      <div class='location col-md-6 col-lg-6 col-sm-6 col-xs-6'>          <h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"</h6></div>        <div class='time col-md-6 col-lg-6 col-sm-6 col-xs-6'>        <h6> <span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+" - "+end.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+"</h6>   </div>  </div>      </div></div></div>";
        });
        $('.completedContent').html(output);
        $('#comPages').children('li:first').addClass('active');
      }
    });
  }; // End of loadcompleted events function

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
         var dateArray = val.event_Date.split('-');
          eDate1 = getMonth(dateArray[1]);
          eDate2 = dateArray[2];
          var start = new Date(val.event_StartTime);
          var end = new Date(val.event_EndTime);
          output += "<div class='col-md-4 col-sm-6 col-xs-12'> <div class='thumbnail'>  <div class='image'> <img class='img-click' name='"+val.id+"' src='/images/events/"+ val.event_Image+"'> <a href='{{url('donates/create')}}' id='vol' role='button'>  <button type='button' class='btn btn-warning volBtn' name='"+val.id+"'>Volunteer</button>   </a>      </div>    <div class='caption1 col-md-12 col-sm-12 col-xs-12'>           <div class='date col-md-2 col-sm-2 col-xs-2'>            <h3>"+eDate2+"<br>"+eDate1+"</h3>        </div>          <div class='details col-md-10 col-sm-10 col-xs-10' style='margin:0px'> <div class='title col-md-12 col-sm-12 col-xs-12'>              <a><h3 class='eName' name='"+val.id+"'>"+val.event_Title+"</h3></a> </div> <div class='location col-md-6 col-lg-6 col-sm-6 col-xs-6'> <h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"</h6> </div>  <div class='time col-md-6 col-lg-6 col-sm-6 col-xs-6'>   <h6><span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+" - "+end.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+"</h6>   </div>  </div> </div>  </div></div>";
        });
        $('.upcomingContent').html(output);
      }
    });
    $('#upPages').children('li').removeClass('active');
    $('#upPages').find("a[name="+id+"]").closest('li').addClass('active');
  });
      //Getting the content based on Page number for completed
  $('body').on('click', '.comPageClick', function(){
    var id =  $(this).attr('name');
    $.ajax({
      url: 'events/page/completed/',
      type: 'POST',
      data: {'id' : id},
      datatype: 'JSON',
      success: function(response){
        var output ="<div class='row'>";
        response = JSON.parse(response);
        $.each(response, function (key,val) {
          var dateArray = val.event_Date.split('-');
          eDate1 = getMonth(dateArray[1]);
          eDate2 = dateArray[2];
          var start = new Date(val.event_StartTime);
          var end = new Date(val.event_EndTime);
          output += "<div class='col-md-4 col-sm-6 col-xs-12'>    <div class='thumbnail'> <div class='image'> <img class='img-click' name='"+val.id+"' src='/images/events/"+ val.event_Image+"'><a role='button'><button type='button' class='btn btn-warning readMore' name='"+val.id+"'>Read More</button></a> </div> <div class='caption1 col-md-12 col-sm-12 col-xs-12'> <div class='date col-md-2 col-sm-2 col-xs-2'> <h3>"+eDate2+"<br>"+eDate1+"</h3></div>   <div class='details col-md-10 col-sm-10 col-xs-10' style='margin:0px'>     <div class='title col-md-12 col-sm-12 col-xs-12'>                      <a><h3 class='eName' name='"+val.id+"'>"+val.event_Title+"</h3></a>        </div>      <div class='location col-md-6 col-lg-6 col-sm-6 col-xs-6'>          <h6><span class='glyphicon glyphicon-map-marker'></span>"+val.event_Location+"</h6></div>        <div class='time col-md-6 col-lg-6 col-sm-6 col-xs-6'>        <h6> <span class='glyphicon glyphicon-time'></span>"+start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+" - "+end.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})+"</h6>   </div>  </div>      </div></div></div>";
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
   function getFullMonth(d){
var monthArray = ['January', 'February','March','April','May', 'June', 'July', 'August', 'September', 'October','November', 'December'];
return monthArray[d-1];
};

            //Call to get the description details based on event id (opens modal when click on name)
 $('body').on('click','.eName', function(){
   $('.volunt').hide();
    var id = $(this).attr('name');
    $.ajax({
        url: 'events/'+id,
        type: 'GET',
        datatype: 'JSON',
        success: function(response){
          console.log(response);
          response = JSON.parse(response);
          var dateArray = response[0].event_Date.split('-');
          eDate1 = getFullMonth(dateArray[1]);
          eDate2 = dateArray[2];
          eDate3 = dateArray[0];
          var start = new Date(response[0].event_StartTime);
          var end = new Date(response[0].event_EndTime);
          var imgstr = '/images/events/'+ response[0].event_Image;
          $('.eimg').attr('src', imgstr)
          $('.mTitle').html(response[0].event_Title);
          $('.des').html(response[0].event_Description) ;
          $('.loc').html(response[0].event_Location);
          // $('.dat').html(response[0].event_Date);
          $('.dat').html(eDate2 + ' ' +eDate1 + ' ' + eDate3);
          $('.tim1').html(start.toLocaleTimeString());
          $('.tim2').html(end.toLocaleTimeString());
          $('.volunt').attr('name', response[0].id);
          if(response[0].event_Status == 'future'){
            $('.volunt').fadeIn("7000");
          }
          else{
            $('.volunt').hide();
          }
        }
    });
  $('#eventDetails').modal('show');
});
            //Call to get the description details based on event id (opens modal when click on image)
 $('body').on('click','.img-click', function(){
   $('.volunt').hide();
    var id = $(this).attr('name');
    $.ajax({
        url: 'events/'+id,
        type: 'GET',
        datatype: 'JSON',
        success: function(response){
          console.log(response);
          response = JSON.parse(response);
          var dateArray = response[0].event_Date.split('-');
          eDate1 = getFullMonth(dateArray[1]);
          eDate2 = dateArray[2];
          eDate3 = dateArray[0];
          var start = new Date(response[0].event_StartTime);
          var end = new Date(response[0].event_EndTime);
          var imgstr = '/images/events/'+ response[0].event_Image;
          $('.eimg').attr('src', imgstr)
          $('.mTitle').html(response[0].event_Title);
          $('.des').html(response[0].event_Description) ;
          $('.loc').html(response[0].event_Location);
          // $('.dat').html(response[0].event_Date);
          $('.dat').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
          $('.tim1').html(start.toLocaleTimeString());
          $('.tim2').html(end.toLocaleTimeString());
          $('.volunt').attr('name', response[0].id);
          if(response[0].event_Status == 'future'){
            $('.volunt').fadeIn("7000");
          }
          else{
            $('.volunt').hide();
          }
        }
    });
  $('#eventDetails').modal('show');
});
 

    //Call to get description when 'Read More is clicked' (opens modal)
$('body').on('click','.readMore', function(){
 $('.volunt').hide();
     
  var id = $(this).attr('name');
  $.ajax({
      url: 'events/'+id,
      type: 'GET',
      datatype: 'JSON',
      success: function(response){
            console.log(response);

             response = JSON.parse(response);
              var dateWithTimeZone = response[0].event_Date + "PST";
        var dateObject = new Date(dateWithTimeZone);
        eDate1 = dateObject.getDate();
        eDate2 = dateObject.toLocaleDateString("en-us",{month: "long"});
        eDate3 = dateObject.getFullYear();

        var start = new Date(response[0].event_StartTime);
        var end = new Date(response[0].event_EndTime);

        var imgstr = '/images/events/'+ response[0].event_Image;
        // var title = val.event_Title;
        $('.eimg').attr('src', imgstr)
          $('.modal-title').html(response[0].event_Title);
          $('.des').html(response[0].event_Description) ;
          $('.loc').html(response[0].event_Location);
          // $('.dat').html(response[0].event_Date);
          $('.dat').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
          $('.tim1').html(start.toLocaleTimeString());
          $('.tim2').html(end.toLocaleTimeString());
          $('.volunt').attr('name', response[0].id)

          if(response[0].event_Status == 'future'){
            $('.volunt').fadeIn("7000");
          }
          else{
            $('.volunt').hide();
          }

      }
  });
  $('#eventDetails').modal('show');
});
  $('.volunt').on('click', function(){
  var eventValue = $(this).attr('name');
  sessionStorage.setItem('event', eventValue);
  sessionStorage.setItem('volunteer' , 'true');
  });
  $('body').on('click', '.volBtn', function(){
  $('#eventDetails').attr('style','display:none');
   var eventValue = $(this).attr('name');
  sessionStorage.setItem('event', eventValue);
  sessionStorage.setItem('volunteer' , 'true');
  });

});

    </script>
@endsection