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
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/background.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 1</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/colorfull.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 2</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/aboutus.png')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 3</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/moutain.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 4</p>
                </a>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/people.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 5</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/shutterstock.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 6</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 7</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option project">
                    <img src="{{URL::asset('/images/people1.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Project Title 8</p>
                </a>
            </div>
</div>
            
        </div>
        <div id="events" class="tab-pane fade">
  <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/bg_contacts.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 1</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/event.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 2</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/event2.png')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 3</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/upcoming.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 4</p>
                </a>
            </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 5</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/shutterstock.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 6</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/thumb.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 7</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail option eve">
                    <img src="{{URL::asset('/images/background.jpg')}}" class="img-thumbnail img-responsive">
                    <p value="id">Event Title 8</p>
                </a>
            </div>
</div>
        </div>
    </div>  <!--End of tab-content -->





 <!--        <div id="projects" class="tab-pane fade in active">
            @foreach($projects as $project)

            <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn sel proj">


                <input type="radio" name="project" value="{{$project->id}}"><img src="/images/{{$project->project_Image}}" height="150px" width="150px"><br>{{substr($project->project_Title, 0, 25)}}</label>
            </div>
            </div>
            @endforeach
        </div>
         <div id="events" class="tab-pane fade">
             @foreach($events as $event)
            <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn sel proj">
                <input type="radio" name="project" value="{{$event->id}}"><img src="/images/{{$event->event_Image}}" height="150px" width="150px"><br>{{substr($event->event_Title, 0, 25)}}</label>
            </div>
            </div>
            @endforeach
        </div> -->


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

        $('.option').on('click',function(){
            $('.option').removeClass('selected');
            $(this).addClass('selected');
        });

        $('.project').click(function(){
            sessionStorage.removeItem('event');
            var projectValue = $(this).find('p').attr('value');
            sessionStorage.setItem('project', projectValue);
        });

        $('.default').click(function(){
            sessionStorage.removeItem('event');
            sessionStorage.removeItem('project');
            // var projectValue = $(this).find('p').attr('value');
            sessionStorage.setItem('foundation', 'AA Foundation');
        });

        $('.eve').click(function(){
            sessionStorage.removeItem('project');
             var eventValue = $("this").find('p').attr('value');
             sessionStorage.setItem('event', eventValue);

        });

        $('.thumbnail').click(function(){
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

@endsection