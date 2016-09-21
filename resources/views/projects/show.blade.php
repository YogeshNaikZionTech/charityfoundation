@extends('layouts.main')

@section('title', '| Projects')
@section('stylesheets')
    <link href="{{URL::asset('/css/projects.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="main content">
    <div class="h">
        <h2>Projects</h2>
         <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEvent">+ Create New Project</button>
        <div id="createEvent" class="modal fade" role="dialog">
          <div class="modal-dialog">
                    <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Project</h4>
              </div>
              <form class="form-group" action="{{url('')}}" action="POST">
                <div class="modal-body">
                  <label>Project Name</label>
                    <input type="text" class="form-control">
                  <!-- <label>Date</label>
                    <input type="date" class="form-control">
                  <label>Start Time</label>
                    <input type="time" class="form-control">
                     <label>End Time</label>
                    <input type="time" class="form-control">
                   --><label>Project Description</label>
                    <textarea placeholder="Description of the project" class="form-control"></textarea>
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
            <div class="col-md-12">

                <div class="container-fluid">
                    <!-- <h2>Events</h2> -->

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Projects</a></li>
                        <li><a data-toggle="tab" href="#completed">Completed Projects</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="upcoming" class="tab-pane fade in active">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event1">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event2">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="projectDesc" id="desc">
                                <h2>Project Name</h2>
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
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event1">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event2">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                               <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#" class="btn btn-primary pull-right" role="button">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="projectDesc" id="desc">
                                <h2>Project Name</h2>
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
   </div>
</div> 

    @endsection



@section('scripts')

            <script type="text/javascript">
                $(document).ready(function(){

$('.nav li:first').removeClass('active');
$('.nav li:nth-child(3)').addClass('active');

                    $(".projectDesc").hide();
                    $(".eNAme").click(function(){
                        $(".projectDesc").toggle();
                    });
                });
            </script>
    @endsection

