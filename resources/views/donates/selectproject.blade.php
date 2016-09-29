@extends('layouts.main')

@section('title', '|Select Project')


@section('content')

    <div class="container" id="content">
        @if(Session::has('successLogin'))
            <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('successLogin')}}</strong>
            </div>
        @endif
          
                <h2>What cause would you like to donate to?</h2>

 <ul class="nav nav-tabs" role="tablist">
    <li class="active"><a data-toggle="tab" href="#projects">Projects</a></li>
    <li><a data-toggle="tab" href="#events">Events</a></li>
</ul>
<form name="selectProj" action="{{url('donates/create')}}" method="get">
    <div class="tab-content">


        <div id="projects" class="tab-pane fade in active">
             <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj1"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj2"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj3"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj4"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj5"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj6"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj7"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel proj"><input type="radio" name="project" value="Proj8"><img src="{{URL::asset('/images/thumb.jpg')}}" height="150px" width="150px"><br>Project Title</label>
                </div>
            </div> 
        </div>
        <div id="events" class="tab-pane fade">
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve1"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve2"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve3"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve4"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve5"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve6"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve7"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
                </div>
            </div><div class="col-md-3">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn sel eve"><input type="radio" name="event" value="Eve8"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Event Name</label>
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


    <div class="col-md-1 col-md-offset-5">
    
            <input type="submit" class="btn btn-success" value="Continue" style="margin-bottom:10px">
        
    </div>
</form>
    </div>
            @endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

$('.nav li:first').removeClass('active');
$('.nav li:nth-child(5)').addClass('active');


        $('.sel').on('click',function(){
            $('.sel').removeClass('active');
            $(this).addClass('active');
        });


$('.proj').click(function(){
sessionStorage.removeItem('event');
    var projectValue = $("label.active").find('input').attr('value');
    sessionStorage.setItem('project', projectValue);
});

$('.eve').click(function(){
sessionStorage.removeItem('project');

     var eventValue = $("label.active").find('input').attr('value');
     sessionStorage.setItem('event', eventValue);

});

    });
</script>

@endsection

