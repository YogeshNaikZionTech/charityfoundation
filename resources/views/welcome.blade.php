@extends('layouts.main')

@section('title', '| Welcome')
@section('stylesheets')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
@endsection
@section('content')
    <div id="content">
        @if(\Session::has('suggest_Success'))
            <div class="alert alert-success" role="alert">
                <strong>Thank you, {{\Session::get('suggest_Success')}}</strong>
            </div>
        @endif
        <div id="myCarousel" class="carousel slide" data-ride="carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active ">
                    <img class="first-slide img-responsive" src="{{URL::asset('/images/homeimages/slider6.jpg')}}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption first col-md-7  col-lg-7 col-sm-6 col-xs-6" >
                            <h1>Project1: Education Programs</h1>
                            <p>"Well-educated citizens are better-equipped for significant economic production. "</p>
                            <a class="btn btn-lg btn2" href="{{url('projects')}}" role="button">Read More</a>

                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-5 pull-right" >
                            {{--<h2>Urgent Cause</h2>--}}
                            <div class="donors1 col-md-12 col-lg-12 col-xs-12 col-sm-12" >
                                <p>Total number of donors</p>
                                <span class="count">123</span>
                            </div>
                            {{--<a href="{{url('/select')}}" class="btn btn-lg btn2">DONATE</a>--}}

                        </div>

                    </div>
                </div>
                <div class="item">
                    <img class="second-slide img-responsive" src="{{URL::asset('/images/homeimages/education3.jpg')}}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption second col-md-7 col-lg-7 col-sm-6 col-xs-6" >
                            <h1 >Project2:Digitize classrooms</h1>
                            <p>We make a LIVING by what we GET but we make a LIFE by what we GIVE</p>
                            <a class="btn btn2 btn-lg" href="{{url('projects')}}" role="button">Read More</a>
                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-5 pull-right" >

                            <div class="donors1 col-md-10 col-lg-10 col-xs-12 col-sm-10">
                                <p>Founder take care of all the administrative cost</p>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="item">
                    <img class="third-slide img-responsive" src="{{URL::asset('/images/homeimages/education2.jpg')}}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption third col-md-7 col-lg-7 col-sm-6 col-xs-6">
                            <h1>Project3:Green school initiative</h1>
                            <p>We rise by "LIFTING OTHERS"</p>
                            <a class="btn btn2 btn-lg" href="{{url('projects')}}" role="button">Read More</a>
                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-5 pull-right" >

                            <div class="donors1 col-md-10 col-lg-10 col-xs-12 col-sm-10">
                                <p>Together we can make difference .&nbsp;'Join with US'</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <section id="section03" class="demo">
                <a href="#header_education"><span></span></a>
            </section>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <div class=" container-fluid header_education" id="header_education">
            <h1> Educate yourself</h1>
            <div>

                <iframe class="col-lg-8 col-xs-12 col-sm-8 col-md-8" src="https://www.youtube.com/embed/6Q5Ndz0RQa4" frameborder="0" allowfullscreen></iframe>

            </div>
            <div class="col-lg-4 col-xs-12 col-md-10 col-sm-4 pull-left">
                <h2>Video title</h2>
                <p>Some description  about video ,Main theme of the video</p>

                <a href="{{url('/education')}}" class="btn btn-lg">Explore more</a>

            </div>
        </div>

        <div class="container-fluid header_projects" id="projects">
            <h1>Our Projects</h1>
            <div class="container-fluid div2">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" >
                    <div id="createProject" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header create">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                {{--<form class="form-group" action="{{url('/projects')}}" action="POST"> --}}
                                <div class="modal-body">
                                    <p class="des"><p>
                                    <h2 style="color: green">Location: <span class="loc"></span> </h2>
                                    <h3 style="color: green">Project Start Date: <span class="std"></span> </h3>

                                </div>
                                <div class="modal-footer">
                                    <div class="modal-location"></div>
                                    <input type="button" class="btn btn2 btn-success" data-dismiss="modal" value="Donate Now">
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    @foreach($projects_c as $cproject)
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="homeprojects" >

                                <div class="head">{{$cproject->project_Status}}</div>
                                <div class="project_image ">
                                    <img class="image" src="images/projects/{{$cproject->project_Image}}" class="img-responsive" style="" alt="Image" ></div>
                                <div><h3 class="title">{{$cproject->project_Title}}</h3></div>
                                <div><p class="description">{{$cproject->project_Description}}</p></div>
                                <div><a   class="btn btn2 btn-lg seemore" name="{{$cproject->id}}" style="right:30%">See more </a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class=" pull-right"><a  href="{{url('projects')}}"><button  class=" btn"><span>Explore more</span></button></a></div>

        </div>

        <div class=" container-fluid header_Events" >
            <h1>Our Events </h1>
            <div class="container-fluid div2">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div id="eventDetails" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header create">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <img src="" alt='event_Image' class="eimg img-responsive col-lg-6 col-md-6 col-xs-12 col-sm-6" height="250px" width="250px">
                                    <div class="right col-lg-6 col-md-6 col-xs-12 col-sm-6   ">
                                        <h2 class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="color: green">Venue: <span class="loc"></span> </h2> <br>
                                        <h3 class="col-lg-8 col-md-8 col-xs-12 col-sm-8" style="color: green">Date: <span class="dat"></span> </h3> <br>
                                        <h4 class="col-lg-8 col-md-8 col-xs-12 col-sm-8" style="color: green">From: <span class="tim1"></span></h4> <br>
                                        <h4 class="col-lg-8 col-md-8 col-xs-12 col-sm-8" style="color: green">To: <span class="tim2"></span></h4>

                                    </div>

                                    <p class="des col-lg-12 col-md-12 col-xs-12 col-sm-12"><p>


                                </div>
                                <div class="modal-footer">
                                    <a href="{{url('/donates/create')}}"> <input type="button" class="btn btn2 btn-success" value="Volunteer"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--For ecah statement for the Events--}}
                    @foreach($events_c as $cevent)
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="homeEvents">
                                <div class="head">{{$cevent->event_Status}}</div>
                                <div class="project_image image"><img src="images/events/{{$cevent->event_Image}}" class="img-responsive" style="width:100%;max-height: 250px;" alt="Image"></div>

                                <div class="description_event">
                                    <div><h3 class="title">{{$cevent->event_Title}}</h3></div>
                                    <div><p class="description">{{$cevent->event_Description}}</p></div>

                                    <a  name="{{$cevent->id}}" class="btn btn2 btn-lg eveseemore">See more </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>


            <div class="pull-right"><a  href="{{url('events')}}"><button  class=" btn"><span>Explore more</span></button></a></div>



        </div>

        <div class="suggest_donors container-fluid">
            <div class="row">

                <div class="suggest1 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-md-7 col-lg-7 col-xs-12 col-sm-7">
                    <h2>Suggest Here</h2>
                    <form class="form-horizontal col-md-12 col-lg-10 col-xs-11 col-sm-12" id="suggestform" action="{{url('/suggestion')}}" method="post">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-right: 10px;">
                            <input class="form-control name " name="username" minlength="3"  placeholder="Name :*" >  </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control email  " name="email" type="email"  placeholder="Email :*"></div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea rows="5" cols="30" class="form-control suggestarea" name="suggestarea"   placeholder="Suggestion :*"> </textarea>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <button class="btn btn2 col-lg-offset-12 btn-md" type="submit">Suggest</button></div>
                    </form>
                </div>

            </div>
            <div class=" col-md-2 col-lg-2 col-xs-3 col-sm-2 col-lg-offset-9 pull-right" >
                <a href="#" class="scrollToTop"><img style="bottom: 0;" src="{{URL::asset('/images/homeimages/back_to_top_icon.png')}}"/></a>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('/js/nav.js')}}"></script>
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();
                    // Store hash
                    var hash = this.hash;
                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
        $(document).ready(function(){
            //Bootstrap form  validation stats from here  for Suggest form
            $("#suggestform").bootstrapValidator({
                feedbackIcons:{
                    valid:'glyphicon glyphicon-ok',
                    invalid:'glyphicon glyphicon-remove',
                    validating:'glyphicon glyphicon-refresh'
                },
                fields:{
                    suggestarea:{
                        validators:{
                            notEmpty:{
                                message: 'cannot submit empty suggestions'
                            },
                            stringLength:{
                                max: 500,
                                message: 'Suggestions should be less than 500 characters'
                            },
                            regexp:{
                                regexp: /^[A-Za-z0-9\s]+$/i,
                                message: 'Only alphanumeric characters.'
                            }
                        }
                    },
                    username:{
                        validators:{
                            notEmpty:{
                                message: 'Please enter your name'
                            },
                            regexp:{
                                regexp:/^[A-Za-z\s]+$/,
                                message: 'Name can have only alphabets'
                            }
                        }
                    },
                    email:{
                        validators:{
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },
                            notEmpty:{
                                message:'Email ID is required'
                            }
                        }
                    }
                }
            });
        });
        //Bootstrap form  validation stats ends here  for Suggest form
        //        Number Counting functionality for Total nunber of donors
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        $(document).ready(function(){
            //Pop up for Event Description
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            //Call to get the projects from the database when you click on the button  by USING AJAX based on project ID
            $('body').on('click','.seemore', function(){
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
                $('#createProject').modal('show');
            });
        });
        $(document).ready(function(){
            //Pop up for Event Description Details
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            //Call to get the projects from the database when you click on the button  by USING AJAX based on  ID
            $('body').on('click','.eveseemore', function(){
                var id = $(this).attr('name');
                $.ajax({
                    url: 'events/'+id,
                    type: 'GET',
                    datatype: 'JSON',
                    success: function(response){
                        console.log(response);
                        response = JSON.parse(response);
                        var eDate = new Date(response[0].event_Date);
                        eDate1 = eDate.getDate();
                        eDate2 = eDate.toLocaleDateString("en-us",{month: "long"});
                        eDate3 = eDate.getFullYear();
                        var start = new Date(response[0].event_StartTime);
                        var end = new Date(response[0].event_EndTime);
                        var imgstr = '/images/events/'+ response[0].event_Image;
                        // var title = val.event_Title;
                        $('.eimg').attr('src', imgstr);
                        $('.modal-title').html(response[0].event_Title);
                        $('.des').html(response[0].event_Description) ;
                        $('.loc').html(response[0].event_Location);
                        // $('.dat').html(response[0].event_Date);
                        $('.dat').html(eDate1 + ' ' +eDate2 + ' ' + eDate3);
                        $('.tim1').html(start.toLocaleTimeString());
                        $('.tim2').html(end.toLocaleTimeString());
                    }
                });
                $('#eventDetails').modal('show');
            });
        });
    </script>


@endsection