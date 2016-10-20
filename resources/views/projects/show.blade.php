@extends('layouts.main')

@section('title', '| Projects')
@section('stylesheets')
    <link href="{{URL::asset('/css/projects.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="main container-fluid" id="content">
        <div class="h">
            <h2>Projects</h2>
            @if(Auth::check()&& Auth::user()->isAdmin)
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEvent">+ Create New Project</button>
            <div id="createEvent" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Project</h4>
                        </div>
                        <form class="form-group" action="{{url('/projects')}}" action="POST">
                            <div class="modal-body">
                                <label>Project Name</label>
                                <input id="pname" type="text" class="form-control">
                                <label>Project Description</label>
                                <textarea id="pdescription" placeholder="Description of the project" class="form-control"></textarea>
                                <label>Upload an image</label>
                                <input id="piamge" type="file" Name="pic" accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" data-dismiss="modal">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <hr>
        <div class="container-fluid">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a data-toggle="tab" href="#current">Current Projects</a></li>
                <li><a data-toggle="tab" href="#upcoming">Upcoming Projects</a></li>
                <li><a data-toggle="tab" href="#completed">Completed Projects</a></li>
            </ul>
            <div class="tab-content">
                <div id="current" class="tab-pane fade in active">
                  <div class="row">
    <div class="col-md-3">
        <div class="thumbnail">
            <div class="image">
                <img src="{{URL::asset('/images/background.jpg')}}" class="img-responsive">
                <a href=""><div class="title">Project Name</div></a>
                   <a href="{{url('/donates/create')}}"><button type="button" class="btn btn-warning">Donate Now</button></a>
        </div>
        </div>
    </div>
     <div class="col-md-3">
        <div class="thumbnail">
                <div class="image">
                    <img src="{{URL::asset('/images/education1.jpg')}}" class="img-responsive">
                      <a href="{{url('/donates/create')}}"><button type="button" class="btn btn-warning">Donate Now</button></a>
                    <a href=""><div class="title">Project Name</div></a>
                </div>
        </div>
    </div>
     <div class="col-md-3">
        <div class="thumbnail">
                <div class="image">
                    <img src="{{URL::asset('/images/slide-2.jpg')}}" class="img-responsive">
                    <a href=""><div class="title">Project Name</div> </a>
                    <a href="{{url('/donates/create')}}"><button type="button" class="btn btn-warning">Donate Now</button></a>
                </div>
        </div>
    </div>
     <div class="col-md-3">
        <div class="thumbnail">
                <div class="image">
                    <img src="{{URL::asset('/images/slider4.jpg')}}" class="img-responsive">
                     <a href="{{url('/donates/create')}}"><button type="button" class="btn btn-warning">Donate Now</button></a>
                    <a href=""><div class="title">Project Name</div></a>
                </div>
        </div>
    </div>
    
</div>  
                </div>
                <div id="upcoming" class="tab-pane fade">
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event1">
                            <div class="caption">
                                <a href="#desc" class="eName1"><h3>Project Name</h3></a>
                                <p>Short summary of project description.</p>
                                <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="{{url('/donates/create')}}" class="btn btn-primary pull-right donate" id="Project 1" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event2">
                                    <div class="caption">
                                        <a href="" class="eName2"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="{{url('/donates/create')}}" class="btn btn-primary pull-right donate" id="Project 2" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eName3"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="{{url('/donates/create')}}" class="btn btn-primary pull-right donate" id="Project 3" role="button">Donate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/upcoming.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eName4"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>

                                            <a href="#" class="btn btn-default" role="button" style="visibility:hidden"></a>
                                            <a href="{{url('/donates/create')}}" class="btn btn-primary pull-right donate" id="Project 4" role="button">Donate</a>


                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--   <div class="projectDesc" id="desc">
                                  <h2>Project Name</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                  <h3>Venue</h3>
                                  <h3>Date & Time</h3>
                              </div> -->
                            <!--  -->
                        </div>

                        <div id="completed" class="tab-pane fade">
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event1">
                                    <div class="caption">
                                        <a href="#desc" class="eName1"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#desc" class="btn btn-primary pull-right" role="button" id="read1">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event2">
                                    <div class="caption">
                                        <a href="#desc" class="eName2"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#desc" class="btn btn-primary pull-right" role="button" id="read2">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eName3"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#desc" class="btn btn-primary pull-right" role="button" id="read3">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{URL::asset('/images/event.jpg')}}" alt="event3">
                                    <div class="caption">
                                        <a href="#desc" class="eName4"><h3>Project Name</h3></a>
                                        <p>Short summary of project description.</p>
                                        <p>
                                            <a href="#" class="btn btn-primary" role="button" style="visibility:hidden"></a>
                                            <a href="#desc" class="btn btn-primary pull-right" role="button" id="read4">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="projectDesc" id="desc">
                                <h2>Project Name</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <h3>Venue</h3>
                                <h3> Date & Time</h3>
                            </div> -->
                        </div>
                        <div class="eventDesc1" id="desc">
                            <h2>Project Name 2</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        </div>
                        <div class="eventDesc2" id="desc">
                            <h2>Project Name 2</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        </div>
                        <div class="eventDesc3" id="desc">
                            <h2>Project Name 3</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        </div>
                        <div class="eventDesc4" id="desc">
                            <h2>Project Name 4</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        </div>


                    </div>
                </div>
                </div>

@endsection



@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

// $('.nav li:first').removeClass('active');
// $('.nav li:nth-child(3)').addClass('active');

            $('.donate').on('click', function () {
                sessionStorage.removeItem('event');
                var projectValue = $(this).attr('id');
                sessionStorage.setItem('project', projectValue);
            });

            $(".eventDesc1").hide();
            $(".eventDesc2").hide();
            $(".eventDesc3").hide();
            $(".eventDesc4").hide();


            $(".eName1").click(function(){
                $(".eventDesc2").hide();
                $(".eventDesc3").hide();
                $(".eventDesc4").hide();

                if($(".eventDesc1").attr('style') == "display: none;"){
                    $(".eventDesc1").show();
                }
                else
                    $(".eventDesc1").hide();
            });


            $(".eName2").click(function(){
                $(".eventDesc1").hide();
                $(".eventDesc3").hide();
                $(".eventDesc4").hide();


                if($(".eventDesc2").attr('style') == "display: none;"){
                    $(".eventDesc2").show();
                }
                else
                    $(".eventDesc2").hide();
            });


            $(".eName3").click(function(){

                $(".eventDesc1").hide();
                $(".eventDesc2").hide();
                $(".eventDesc4").hide();

                if($(".eventDesc3").attr('style') == "display: none;"){
                    $(".eventDesc3").show();
                }
                else
                    $(".eventDesc3").hide();
            });

            $(".eName4").click(function(){

                $(".eventDesc1").hide();
                $(".eventDesc2").hide();
                $(".eventDesc3").hide();

                if($(".eventDesc4").attr('style') == "display: none;"){
                    $(".eventDesc4").show();
                }
                else
                    $(".eventDesc4").hide();
            });

            $('#read1').click(function(){
                $(".eventDesc2").hide();
                $(".eventDesc3").hide();
                $(".eventDesc4").hide();

                $(".eventDesc1").show();
            });
            $('#read2').click(function(){
                $(".eventDesc1").hide();
                $(".eventDesc3").hide();
                $(".eventDesc4").hide();

                $(".eventDesc2").show();
            });
            $('#read3').click(function(){
                $(".eventDesc1").hide();
                $(".eventDesc2").hide();
                $(".eventDesc4").hide();

                $(".eventDesc3").show();
            });
            $('#read4').click(function() {
                $(".eventDesc1").hide();
                $(".eventDesc2").hide();
                $(".eventDesc3").hide();
                $(".eventDesc4").show();
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