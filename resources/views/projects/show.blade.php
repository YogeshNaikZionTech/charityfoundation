@extends('layouts.main')

@section('title', '| Projects')
@section('stylesheets')
    <link href="{{URL::asset('/css/projects.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="main container-fluid" id="content">
    @if(Session::has('ProjectCreated'))
        <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('ProjectCreated')}}</strong>
        </div>
    @endif
  <div class="h">
      <h1 class="page-header">Projects</h1>
  <hr>
  </div>
  <div class="descModal">
    <div id="projectDetails" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-header create" style="background-image: {{URL::asset('/images/mountain.jpg')}};background-color: rgba(0,0,0,0.5)">
              <button type="button" class="btn pull-right close" data-dismiss="modal" >&times;</button>
              <h4 class="modal-title mTitle"></h4>
            </div>
            <div class="modal-body">
              <p class="des"></p>
              <h2 style="color: green">Location: <span class="loc"></span> </h2>
              <h3 style="color: green">Project Start Date: <span class="std"></span> </h3>
            </div>
            <div class="modal-footer">
              <input type="button" id="donateBtn" style="display: none" class="btn btn-success" data-dismiss="modal" value="Donate Now" projId=''>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <ul class="nav nav-tabs nav-justified projectTabs" role="tablist">
      <li class="active"><a data-toggle="tab" href="#current">Current Projects</a></li>
      <li><a data-toggle="tab" id="futureTab" href="#future">Future Projects</a></li>
      <li><a data-toggle="tab" id="completedTab" href="#completed">Completed Projects</a></li>
    </ul>
    <div class="tab-content">
      <div id="current" class="tab-pane fade in active">
        <div class="currentContent row"> </div>
                  <!-- Pagination -->
          <div class="row">
            <div class="col-md-12 page" >
              <ul class="pagination" id="cuPages">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              </ul>
            </div>
          </div> 
      </div>
      <div id="future" class="tab-pane fade">
        <div class="futureContent row"></div>
                   <!-- Pagination -->
          <div class="row">
            <div class="col-md-12 page">
              <ul class="pagination" id="fuPages">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              </ul>
            </div>
          </div>
      </div>
      <div id="completed" class="tab-pane fade">
        <div class="completedContent row"></div>
                    <!-- Pagination -->
          <div class="row">
            <div class="col-md-12 page">
              <ul class="pagination" id="comPages">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              </ul>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>              
@endsection

@section('scripts')
<script type="text/javascript" src="{{URL::asset('/js/nav.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
    sessionStorage.removeItem('event');

        $('body').on('click','.donate', function () {
            sessionStorage.removeItem('event');
            var projectValue = $(this).closest('.image').find('.title').attr('name');
            sessionStorage.setItem('project', projectValue);
        });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
  $.ajaxSetup({
    headers:
    {
        'X-CSRF-Token': $('input[name="_token"]').val()
    }
  });

   //Calculating the number of pages based on Project Count
$.ajax({
url : 'projects/lists/count',
type: 'GET',
// datatype: 'JSON',
success: function(response){
    response = JSON.parse(response);

    if (response.projects_Current > 0){
    var currentPages = Math.ceil(response.projects_Current/8);
    if(currentPages > 1){
      for( var i=1; i<=currentPages; i++){
        $('#cuPages').append('<li><a class="cuPageClick" name=' +i+   '>'+i+'</a></li>');
        }
      }
      //load the current projects
      loadcurrentprojects();
    }
    else if (response.projects_Current == 0){
      // load 'no projects to show' page
      $('.currentContent').html("<h3 class='noprojects'> We're still working on this and will update our current projects soon! </h3> <br> <h5 class='noprojects'>If you have any ideas/suggestions please get in touch with us <a href='{{url('/contact')}}' >here</a>. </h5>")
    }
    if(response.projects_Future > 0){
    var futurePages = Math.ceil(response.projects_Future/8);
     if(futurePages > 1){
      for( var i=1; i<=futurePages; i++){
        $('#fuPages').append('<li><a class="fuPageClick" name=' +i+   '>'+i+'</a></li>');
        }
      } 
      //load the future projects
      loadfutureprojects();
    }
      else if (response.projects_Future == 0){
      // load 'no projects to show' page
      $('.futureContent').html("<h3 class='noprojects'> We're still working on this and will update our future projects soon! </h3> <br> <h5 class='noprojects'>If you have any ideas/suggestions please get in touch with us <a href='{{url('/contact')}}' >here</a>. </h5>")
    }
    if(response.projects_Completed > 0){
    var completedPages = Math.ceil(response.projects_Completed/8);
      if(completedPages > 1){
      for( var i=1; i<=completedPages; i++){
        $('#comPages').append('<li><a class="comPageClick" name=' +i+   '>'+i+'</a></li>');
        }
      }
      //load completed projects
      loadcompletedprojects();
    }
      else if (response.projects_Completed == 0){
      // load 'no projects to show' page
      $('.completedContent').html("<h3 class='noprojects'> We're still working on this and will update our completed projects soon! </h3> <br> <h5 class='noprojects'>If you have any ideas/suggestions please get in touch with us <a href='{{url('/contact')}}' >here</a>. </h5>")
    }
  }
});
  // Load the current projects on load (only if current projects exists i.e count > 0)
  function loadcurrentprojects(){
  $.ajax({
          url: 'projects/page/current/'+1,
          type: 'GET',
          datatype: 'JSON',
          success: function (response) {
//            console.log(response);
              var time =0 ;
              response = JSON.parse(response);
                  $.each(response, function (key,val) {
                    setTimeout(function(){

                      var output = "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"' > <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a href='{{url('donates/create')}}'><button type='button' class='btn btn-warning donate'>Donate Now</button></a> </div></div></div>";
                         
                      var k = $('<div>'+output+'</div>').hide();
            $('.currentContent').append(k);
            k.show().animateCss('fadeInUp');
              }, time);
                time+= 175;
                          });
             $('#cuPages').children('li:first').addClass('active');
          }
       });
}
//Loading Future Projects on load
function loadfutureprojects(){
$.ajax({
  url: 'projects/page/future/'+1,
  type: 'GET',
  // data: {'id': 1},
  datatype: 'JSON',
  success: function (response) {
              
           response = JSON.parse(response);
           var time=0;
              $.each(response, function (key,val) {
                // setTimeout(function(){

             var output = "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"' > <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <button class='btn btn-warning noclick'>Coming Soon!</button> </div></div></div>"
           
           var k = $('<div class="row">'+output+'</div>').hide();
            $('.futureContent').append(output);
            k.fadeIn();
                });
  $('#fuPages').children('li:first').addClass('active');
  }
      });
}
//Loading Completed Projects on load
function loadcompletedprojects(){
$.ajax({
  url: 'projects/page/completed/'+1,
  type: 'GET',
  // data: {'id': 1},
  datatype: 'JSON',
  success: function (response) {
              var output ="<div class='row'>";
           response = JSON.parse(response);
           $.each(response, function (key,val) {
             output += "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a><button name='"+val.id+"' type='button' class='btn btn-warning readMore'>Read More</button></a> </div></div></div>";
           });
           output+="</div>";
            $('.completedContent').html(output);
  $('#comPages').children('li:first').addClass('active');
  }
      });
}
 //Getting the content based on Page number for current
  $('body').on('click', '.cuPageClick', function(){
    $('.currentContent').empty();
   var id =  $(this).attr('name');
      $.ajax({
        url: 'projects/page/current/'+id,
        type: 'GET',
        // data: {'id' : id},
        datatype: 'JSON',
        success: function(response){
         var time = 0;
          // var output ="<div class='row'>";
     response = JSON.parse(response);
     $.each(response, function (key,val) {
       setTimeout(function(){
                var output = "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"' > <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a href='{{url('donates/create')}}'><button type='button' class='btn btn-warning donate'>Donate Now</button></a> </div></div></div>";

  var k = $('<div>'+output+'</div>').hide();
          $('.currentContent').append(k);
          k.show().animateCss('fadeInUp');
            }, time);
              time+= 175;
                        });

         // output+= "</div>";
          // $('.currentContent').html(output);
            }
            
          });
          $('#cuPages').children('li').removeClass('active');
          $('#cuPages').find("a[name="+id+"]").closest('li').addClass('active');
      });

 //Getting the content based on Page number for Future
$('body').on('click', '.fuPageClick', function(){
        $('.futureContent').empty();

     var id =  $(this).attr('name');
        $.ajax({
          url: 'projects/page/future/'+id,
          type: 'GET',
          // data: {'id' : id},
          datatype: 'JSON',
          success: function(response){
            var time = 0;  
            // var output ="<div class='row'>";
       response = JSON.parse(response);
       $.each(response, function (key,val) {
        setTimeout(function(){
         var output = "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <button class='btn btn-warning noclick'>Coming Soon!</button> </div></div></div>";


var k = $('<div>'+output+'</div>').hide();
        $('.futureContent').append(k);
        k.show().animateCss('fadeInUp');
          }, time);
            time+= 175;

       });
       // output+= "</div>";
        // $('.futureContent').html(output);
          }
        });
        $('#fuPages').children('li').removeClass('active');
        $('#fuPages').find("a[name="+id+"]").closest('li').addClass('active');
    });

//Getting the content based on Page number for Completed
$('body').on('click', '.comPageClick', function(){
        $('.completedContent').empty();

     var id =  $(this).attr('name');
        $.ajax({
          url: 'projects/page/completed/'+id,
          type: 'GET',
          // data: {'id' : id},
          datatype: 'JSON',
          success: function(response){
               var time = 0; 
            // var output ="<div class='row'>";
       response = JSON.parse(response);
       $.each(response, function (key,val) {
         setTimeout(function(){
         var output = "<div class='col-lg-4 col-md-4 col-sm-6'>  <div class='thumbnail'> <div class='image'><img class='img-click img-responsive' name='"+val.id+"' src='/images/projects/"+ val.project_Image+"' > <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a><button type='button' name='"+val.id+"' class='btn btn-warning readMore'>Read More</button></a> </div></div></div>";
        var k = $('<div>'+output+'</div>').hide();
        $('.completedContent').append(k);
        k.show().animateCss('fadeInUp');
          }, time);
            time+= 175;
       });
          }
        });
        $('#comPages').children('li').removeClass('active');
        $('#comPages').find("a[name="+id+"]").closest('li').addClass('active');
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){

        //Pop up for Project Description Details
         $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
        });

            //Call to get the description details based on project id (opens modal when title is clicked)
         $('body').on('click','.title', function(){
           
                      $('#donateBtn').hide();
               
            var id = $(this).attr('name');
            $.ajax({
                url: 'projects/'+id,
                type: 'GET',
                datatype: 'JSON',
                success: function(response){
                       response = JSON.parse(response);
                  var dateObject = new Date(response[0].project_Date + 'PST');
                  eDate1 = dateObject.getDate();
                  eDate2 = dateObject.toLocaleDateString("en-us",{month: "long"});
                  eDate3 = dateObject.getFullYear();
                  var imageSrc = "background-image: url('/images/projects/" +  response[0].project_Image +" ')";
                    $('.mTitle').html(response[0].project_Title);
                    $('.des').html(response[0].project_Description) ;
                    $('.loc').html(response[0].project_Location);
                    $('.std').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
                    $('.create').attr('style' , imageSrc);
                 $('#donateBtn').attr('projId', response[0].id);
                    if(response[0].project_Status == 'Current'){
                      $('#donateBtn').fadeIn("7000");
                    }
                    else{
                      $('#donateBtn').hide();
                    }
                }
            });
            $('#projectDetails').modal('show');
         });
              //Call to get the description details based on project id (opens modal when title is clicked)
         $('body').on('click','.img-click', function(){
           
                      $('#donateBtn').hide();
               
            var id = $(this).attr('name');
            $.ajax({
                url: 'projects/'+id,
                type: 'GET',
                datatype: 'JSON',
                success: function(response){
                       response = JSON.parse(response);
                  var dateObject = new Date(response[0].project_Date + 'PST');
                  eDate1 = dateObject.getDate();
                  eDate2 = dateObject.toLocaleDateString("en-us",{month: "long"});
                  eDate3 = dateObject.getFullYear();
                  var imageSrc = "background-image: url('/images/projects/" +  response[0].project_Image +" ')";
                    $('.mTitle').html(response[0].project_Title);
                    $('.des').html(response[0].project_Description) ;
                    $('.loc').html(response[0].project_Location);
                    $('.std').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
                    $('.create').attr('style' , imageSrc);
                 $('#donateBtn').attr('projId', response[0].id)
                    if(response[0].project_Status == 'Current'){
                      $('#donateBtn').fadeIn("7000");
                    }
                    else{
                      $('#donateBtn').hide();
                    }
                }
            });
            $('#projectDetails').modal('show');
         });

//Call to get the description details when 'Read More' is clicked on completed projects(opens modal)
 $('body').on('click','.readMore', function(){
    $('#donateBtn').hide();
    var id = $(this).attr('name');
    $.ajax({
        url: 'projects/'+id,
        type: 'GET',
        datatype: 'JSON',
        success: function(response){
               response = JSON.parse(response);
          var dateObject = new Date(response[0].project_Date + 'PST');
          eDate1 = dateObject.getDate();
          eDate2 = dateObject.toLocaleDateString("en-us",{month: "long"});
          eDate3 = dateObject.getFullYear();
          var imageSrc = "background-image: url('/images/projects/" +  response[0].project_Image +" ')";
            $('.modal-title').html(response[0].project_Title);
            $('.des').html(response[0].project_Description) ;
            $('.loc').html(response[0].project_Location);
            $('.std').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
            $('.modal-header').attr('style' , imageSrc);
         $('#donateBtn').attr('projId', response[0].id);
            if(response[0].project_Status == 'Current'){
              $('#donateBtn').fadeIn("7000");
            }
            else{
              $('#donateBtn').hide();
            }
        }
    });
    $('#projectDetails').modal('show');
 });

    //Redirecting to Donate Page from Modal's "Donate Now" Button
 $('body').on('click','#donateBtn', function(){
  var projectValue = $(this).attr('projId');
   sessionStorage.setItem('project', projectValue);
  window.location.href = "{{url('donates/create')}}";
         });
 });
    </script>
@endsection
