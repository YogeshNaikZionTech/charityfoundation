@extends('layouts.main')

@section('title', '|Select Project')


@section('content')
    <div class="container">
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
            @foreach($events as $event)

            <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn sel proj">


                <input type="radio" name="project" value="{{$event->id}}"><img src="/images/{{$event->eventImage}}" height="150px" width="150px"><br>{{substr($event->eventTitle, 0, 25)}}</label>
            </div>
            </div>
            @endforeach
        </div>
         <div id="events" class="tab-pane fade">
           @for($i=0; $i<10;$i++)
            <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn sel proj">
                <input type="radio" name="project" value="$"><img src="{{URL::asset('/images/event.jpg')}}" height="150px" width="150px"><br>Project Title</label>
            </div>
            </div>
            @endfor
        </div>
    </div>  <!--End of tab-content -->
    <div class="col-md-11">
        <div class="container">
            <input type="submit" class="btn btn-success pull-right" value="Continue">
        </div>
    </div>
</form>
    </div>
            @endsection


