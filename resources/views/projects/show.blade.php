@extends('layouts.main')

@section('title', '| Projects')
@section('stylesheets')
    <link href="{{URL::asset('/css/events.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

  <div class="main">
  <div class="h">
    <h2>Projects</h2>
    @if(Auth::check()&& Auth::user()->isAdmin)
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createProject">+ Create Project</button>
      <div id="createProject" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Project</h4>
            </div>
              <form class="form-group" action="{{url('projects')}}" method="post">
                <div class="modal-body">
                  <label>Event Name</label>
                    <input type="text" name="ename" class="form-control">
                  <label>Venue</label>
                    <input type="text" name="Location" class="form-control">
                  <label>Date</label>
                    <input type="date" class="form-control">
                  <label>Start Time</label>
                    <input type="time" class="form-control">
                     <label>End Time</label>
                    <input type="time" class="form-control">
                  <label>Project Description</label>
                    <textarea placeholder="Description of the project" class="form-control"></textarea>
                  <label>Upload an image</label>
                    <input type="file" name="pic" accept="image/*">
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div> 
      </div>
    @endif
<hr>
    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#upcoming">Current Projects</a></li>
            <li><a data-toggle="tab" href="#completed">Completed Pojects</a></li>
          </ul>
          <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="project1">
                  <div class="caption">
                    <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                        <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                        <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="project2">
                  <div class="caption">
                    <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                      <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                      <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                   </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="project3">
                  <div class="caption">
                    <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                   <p>
                      <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                      <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
                   </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/upcomingEvent.jpg')}}" alt="project4">
                  <div class="caption">
                    <a href="#desc" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                   <p>
                      <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                      <a href="#" class="btn btn-success pull-right" role="button">Volunteer</a>
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
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="project1">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="project2">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="project3">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
		<div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{URL::asset('/images/completedEvent.jpg')}}" alt="project4">
                  <div class="caption">
                    <a href="#" class="eNAme"><h3>Project Name</h3></a>
                    <p>Short summary of project description.</p>
                    <p>
                         <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                         <a href="#" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                        </p>
                  </div>
                </div>
              </div>
              <div class="projectDesc">
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

 </div> 

    @endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $(".projectDesc").hide();
      $(".eNAme").click(function(){
        $(".projectDesc").toggle();
      });
    });
  </script>
  @endsection