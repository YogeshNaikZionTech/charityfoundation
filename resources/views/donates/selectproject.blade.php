@extends('layouts.main')

@section('title', '| Select Project')

@section('stylesheets')
  <link href="{{URL::asset('/css/selectproject.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="main container" id="content">
    
        @if(Session::has('successLogin'))
            <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('successLogin')}}</strong>
            </div>
        @endif

        <h2 id="support">Choose what your donation will support</h2>
        <h4>Where it is needed the most</h4>

        <div class="row">
            <div class="col-md-6 col-sm-9 col-xs-12 center-col">
                <a style="display: block" class="thumbnail option default">
                    <img src="{{URL::asset('/images/aa.png')}}" alt="AA Logo" class="img-thumbnail img-responsive">
                    <!-- <h1>AA Foundation</h1> -->
                    <p value="AA Foundation">AA Foundation</p>
                </a>
            </div> 
        </div>
        <div style="width: 100%; height: 20px; border-bottom: 1px solid darkgrey; text-align: center">
          <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;color: black">
            OR </span>
        </div>
                                              
        <div id="options">
            <h4>Select a specific cause</h4>
            <!-- <h2>What cause would you like to donate to?</h2> -->

            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a data-toggle="tab" href="#projects">Projects</a></li>
                <li><a data-toggle="tab" href="#events">Events</a></li>
            </ul>

            <form name="selectProj" action="{{url('donates/create')}}" method="get">
                <div class="tab-content">
                    <div id="projects" class="tab-pane fade in active">

                        <div id="projectcontent">
                        </div> <!--End of Project Content -->

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 page">
                                <ul class="pagination" id="currerntPages">
                                <!-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="events" class="tab-pane fade">
                        <div id="eventcontent">   
                        </div> <!--End of Event Content -->

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 page">
                                <ul class="pagination" id="eventPages">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>  <!--End of tab-content -->

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <input type="submit" class="btn btn-success" value="Continue" id="sub">
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div id="error"> </div>
                </div>
            </form>
        </div>
    </div>   
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            sessionStorage.removeItem('project');
            sessionStorage.removeItem('event');

            $('body').on('click','.option',function(){
                $('.option').removeClass('selected');
                $(this).addClass('selected');
            });

            $('body').on('click','.project',function(){
                sessionStorage.removeItem('event');
                var projectValue = $(this).find('p').attr('value');
                sessionStorage.setItem('project', projectValue);   
            });

            $('body').on('click','.default',function(){
                sessionStorage.removeItem('event');
                sessionStorage.removeItem('project');
                sessionStorage.setItem('foundation', 'AA Foundation');
            });

            $('body').on('click','.eve',function(){
                sessionStorage.removeItem('project');
                var eventValue = $(this).find('p').attr('value');
                sessionStorage.setItem('event', eventValue);
            });

            $('body').on('click','.thumbnail',function(){
                $('#error').html(""); 
            });

            $('form').submit(function(eve){
                if($('.selected')[0]){
                    $(this).unbind('submit').submit();
                }
                else{
                   eve.preventDefault();
                   $('#error').html("*Please make a selection to continue"); 
                }
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
    <script type="text/javascript">   // Ajax Calls
        $(document).ready(function(){
            var p = 1;
            $.ajaxSetup({
              headers:
              {
                'X-CSRF-Token': $('input[name="_token"]').val()
              }
            });
            //Calculating the number of pages based on Current Project Count
            $.ajax({
                url : 'projects/lists/count',
                type: 'GET',
                datatype: 'JSON',
                success: function(response){
                    response = JSON.parse(response);
                    // console.log(response);
                    var currentPages = Math.ceil(response.projects_Current/8);
                    for( var i=1; i<=currentPages; i++){
                    $('#currerntPages').append('<li><a class="cuPageClick" name=' +i+ '>'+i+'</a></li>');
                    }
                }
            });
            // Load the current projects on load
            $.ajax({
                url: 'projects/page/current/'+p,
                type: 'GET',
                // data: {'id': 1},
                datatype: 'JSON',
                success: function (response) {
                    console.log(response);
                    var output ="<div class='row'>";
                    response = JSON.parse(response);
                    $.each(response, function (key,val) {
                        output += "<div class='col-md-3'><a class='thumbnail option project'><img src='/images/"+val.project_Image+"' class='img-thumbnail img-responsive'><p value='"+val.id+"'>"+val.project_Title+"</p></a></div>";
                    });

                    output+="</div>";
                    $('#projectcontent').html(output);
                    $('#currerntPages').children('li:first').addClass('active');
                }
            });

            //Getting the content based on Page number for current projects
            $('body').on('click','.cuPageClick',function(){
                var c =  $(this).attr('name');
                $.ajax({
                    url: 'projects/page/current/'+c,
                    type: 'GET',
                    // data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                        var output ="<div class='row'>";
                        response = JSON.parse(response);
                        $.each(response, function (key,val) {
                        output += "<div class='col-md-3'><a class='thumbnail option project'><img src='/images/"+val.project_Image+"' class='img-thumbnail img-responsive'><p value='"+val.id+"'>"+val.project_Title+"</p></a></div>";
                        });
                    output+="</div>";
                    $('#projectcontent').html(output);
                    }

                });
                    $('#currerntPages').children('li').removeClass('active');
                    $('#currerntPages').find("a[name="+c+"]").closest('li').addClass('active');

            });
        
            //Calculating the number of pages based on Current Event Count
            $.ajax({
                url : 'events/lists/count',
                type: 'GET',
                datatype: 'JSON',
                success: function(response){
                    response = JSON.parse(response);
                    console.log(response);
                    var eventPages = Math.ceil(response.events_Current/8);
                    for( var i=1; i<=eventPages; i++){
                    $('#eventPages').append('<li><a class="evePageClick" name=' +i+ '>'+i+'</a></li>');
                    }
                }
            });

            $.ajax({
                url: 'events/page/current',
                type: 'POST',
                data: {'id': 1},
                datatype: 'JSON',
                success: function (response) {
                    console.log(response);
                    var output ="<div class='row'>";
                    response = JSON.parse(response);
                    $.each(response, function (key,val) {
                        output += "<div class='col-md-3'><a class='thumbnail option eve'><img src='/images/"+val.event_Image+"' class='img-thumbnail img-responsive'><p value='"+val.id+"'>"+val.event_Title+"</p></a></div>";
                    });

                    output+="</div>";
                    $('#eventcontent').html(output);
                    $('#eventPages').children('li:first').addClass('active');
                }
            });
            //Getting the content based on Page number for current projects
            $('body').on('click','.evePageClick',function(){
                var id =  $(this).attr('name');
                $.ajax({
                    url: 'events/page/current',
                    type: 'POST',
                    data: {'id' : id},
                    datatype: 'JSON',
                    success: function(response){
                        var output ="<div class='row'>";
                        response = JSON.parse(response);
                        $.each(response, function (key,val) {
                        output += "<div class='col-md-3'><a class='thumbnail option eve'><img src='/images/"+val.event_Image+"' class='img-thumbnail img-responsive'><p value='"+val.id+"'>"+val.event_Title+"</p></a></div>";
                    });
                    output+="</div>";
                    $('#eventcontent').html(output);
                    }
                });

                $('#eventPages').children('li').removeClass('active');
                $('#eventPages').find("a[name="+id+"]").closest('li').addClass('active');
            });
        }); //End of Ajax Calls
    </script>
@endsection