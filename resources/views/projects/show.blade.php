@extends('layouts.main')

@section('title', '| Projects')
@section('stylesheets')
    <link href="{{URL::asset('/css/projects.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="main container-fluid" id="content">
        <div class="h">
            <h2>Projects</h2>
      
        </div>
        <hr>
        <div class="descModal">
            <!-- <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEvent">+ New Project</button> -->
            <div id="createEvent" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header create">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <!-- <form class="form-group" action="{{url('/projects')}}" action="POST"> -->
                            <div class="modal-body">
                                <p class="des"><p>
                                <h2 style="color: green">Location: <span class="loc"></span> </h2>
                                <h3 style="color: green">Project Start Date: <span class="std"></span> </h3>

                            </div>
                            <div class="modal-footer">
                            <div class="modal-location"></div>
                                <input type="button" class="btn btn-success" data-dismiss="modal" value="Donate Now">
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a data-toggle="tab" href="#current">Current Projects</a></li>
                <li><a data-toggle="tab" id="futureTab" href="#future">Future Projects</a></li>
                <li><a data-toggle="tab" id="completedTab" href="#completed">Completed Projects</a></li>
            </ul>
            <div class="tab-content">
                <div id="current" class="tab-pane fade in active">
                <div class="currentContent"> </div>
   
      <!-- Pagination -->
               <div class="row">
                 <div class="col-md-12 page" >
                      <ul class="pagination" id="cuPages">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    </ul>
                  </div>
              </div> 
                </div>


                <div id="future" class="tab-pane fade">
                <div class="futureContent"></div>
                 
                         <!-- Pagination -->
               <div class="row">
                 <div class="col-md-12 page">
                      <ul class="pagination" id="fuPages">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    </ul>
                  </div>
              </div>
                        </div>

                        <div id="completed" class="tab-pane fade">
                        <div class="completedContent"></div>
               
                          <!-- Pagination -->
               <div class="row">
                 <div class="col-md-12 page">
                      <ul class="pagination" id="comPages">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    </ul>
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

            $('body').on('click','.donate', function () {
                sessionStorage.removeItem('event');
                var projectValue = $(this).attr('id');
                sessionStorage.setItem('project', projectValue);
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

         //Calculating the number of pages based on Project Count
      $.ajax({
      url : 'projects/lists/count',
      type: 'GET',
      // datatype: 'JSON',
      success: function(response){
          response = JSON.parse(response);
          var currentPages = Math.ceil(response.projects_Current/8);
          var futurePages = Math.ceil(response.projects_Future/8);
          var completedPages = Math.ceil(response.projects_Completed/8);
            for( var i=1; i<=currentPages; i++){
              $('#cuPages').append('<li><a class="cuPageClick" name=' +i+   '>'+i+'</a></li>');
              }
            for( var i=1; i<=futurePages; i++){
              $('#fuPages').append('<li><a class="fuPageClick" name=' +i+   '>'+i+'</a></li>');
              }
            for( var i=1; i<=completedPages; i++){
              $('#comPages').append('<li><a class="comPageClick" name=' +i+   '>'+i+'</a></li>');
              }
        }

      });
        // Load the current projects on load

//Loading Future Projects on load

$.ajax({
        url: 'projects/page/future/'+1,
        type: 'GET',
        // data: {'id': 1},
        datatype: 'JSON',
        success: function (response) {
                    var output ="<div class='row'>";
                 response = JSON.parse(response);
                    $.each(response, function (key,val) {

                   output += "<div class='col-md-3 col-sm-6'>  <div class='thumbnail'> <div class='image'><img src='/images/"+ val.project_Image+"' class='img-responsive'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <button class='btn btn-warning noclick'>Coming Soon!</button> </div></div></div>"
                 });
                 output+="</div>";
                  $('.futureContent').html(output);
        $('#fuPages').children('li:first').addClass('active');

        }
      });
//Loading Completed Projects on load

$.ajax({
        url: 'projects/page/completed/'+1,
        type: 'GET',
        // data: {'id': 1},
        datatype: 'JSON',
        success: function (response) {
                    var output ="<div class='row'>";
                 response = JSON.parse(response);
                 
                 $.each(response, function (key,val) {

                   output += "<div class='col-md-3 col-sm-6'>  <div class='thumbnail'> <div class='image'><img src='/images/"+ val.project_Image+"' class='img-responsive'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a href='{{url('donates/create')}}'><button type='button' class='btn btn-warning'>Read More</button></a> </div></div></div>";
                 });
                 output+="</div>";
                  $('.completedContent').html(output);
        $('#comPages').children('li:first').addClass('active');

        }
      });
 //Getting the content based on Page number for current
          $('body').on('click', '.cuPageClick', function(){
   
               var id =  $(this).attr('name');
                  $.ajax({
                    url: 'projects/page/current/'+id,
                    type: 'GET',
                    // data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                     
                      var output ="<div class='row'>";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  
                  output += "<div class='col-md-3 col-sm-6'>  <div class='thumbnail'> <div class='image'><img src='/images/"+ val.project_Image+"' class='img-responsive'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a href='{{url('donates/create')}}'><button type='button' class='btn btn-warning'>Donate Now</button></a> </div></div></div>";
                 });
                 output+= "</div>";
                  $('.currentContent').html(output);
                    }
                  });
                  $('#cuPages').children('li').removeClass('active');
                  $('#cuPages').find("a[name="+id+"]").closest('li').addClass('active');
              });
 //Getting the content based on Page number for Future
          $('body').on('click', '.fuPageClick', function(){
   
               var id =  $(this).attr('name');
                  $.ajax({
                    url: 'projects/page/future/'+id,
                    type: 'GET',
                    // data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                        
                      var output ="<div class='row'>";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  
                   output += "<div class='col-md-3 col-sm-6'>  <div class='thumbnail'> <div class='image'><img src='/images/"+ val.project_Image+"' class='img-responsive'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <button class='btn btn-warning noclick'>Coming Soon!</button> </div></div></div>"
                 });
                 output+= "</div>";
                  $('.futureContent').html(output);
                    }
                  });
                  $('#fuPages').children('li').removeClass('active');
                  $('#fuPages').find("a[name="+id+"]").closest('li').addClass('active');
              });
          //Getting the content based on Page number for Completed
          $('body').on('click', '.comPageClick', function(){
   
               var id =  $(this).attr('name');
                  $.ajax({
                    url: 'projects/page/completed/'+id,
                    type: 'GET',
                    // data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                    
                      var output ="<div class='row'>";
                 response = JSON.parse(response);
                 $.each(response, function (key,val) {
                  
                output += "<div class='col-md-3 col-sm-6'>  <div class='thumbnail'> <div class='image'><img src='/images/"+ val.project_Image+"' class='img-responsive'> <a href='#'><div class='title' name='"+val.id+"'>"+val.project_Title+"</div></a> <a href='{{url('donates/create')}}'><button type='button' class='btn btn-warning'>Read More</button></a> </div></div></div>";
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

        //Pop up for Event Description
         $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
        });

            //Call to get the description details based on project id 
         $('body').on('click','.title', function(){
           
               
            var id = $(this).attr('name');
            $.ajax({
                url: 'projects/'+id,
                type: 'GET',
                datatype: 'JSON',
                success: function(response){
                       response = JSON.parse(response);
                  
                    $('.modal-title').html(response.project_Title);
                    $('.des').html(response.project_Description) ;
                    $('.loc').html(response.project_Location);
                    $('.std').html(response.project_Date);

                }
            });
            $('#createEvent').modal('show');
         });
 });
    </script>
@endsection