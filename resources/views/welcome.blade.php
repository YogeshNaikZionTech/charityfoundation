@extends('layouts.main')

@section('title', '| Welcome')
@section('stylesheets')

    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
@endsection
@section('content')
    <div id="content">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active ">
                    <img class="first-slide img-responsive" src="{{URL::asset('/images/education3.jpg')}}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption first col-md-7  col-lg-7 col-sm-6 col-xs-6" >
                            <h1>CAUSE1: Education benefit society</h1>
                            <p>"Well-educated citizens are better-equipped for significant economic production. "</p>
                            <a class="btn btn-lg" href="{{url('projects')}}" role="button">Read More</a>

                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-6 pull-right" >
                            {{--<h2>Urgent Cause</h2>--}}
                            <div class="donors1 col-md-10 col-lg-10 col-xs-10 col-sm-10" >
                                <p>Total Number of Donors</p>
                                <span class="count">123</span>

                            </div>
                            <a href="{{url('/select')}}" class="btn btn-lg">DONATE</a>

                        </div>

                    </div>
                </div>
                <div class="item">
                    <img class="second-slide img-responsive" src="{{URL::asset('/images/slider6.jpg')}}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption second col-md-7 col-lg-7 col-sm-6 col-xs-6" >
                            <h1 >CAUSE2:Solar panels to Schools</h1>
                            <p>We make a LIVING by what we GET but we make a LIFE by what we GIVE</p>
                            <a class="btn btn-lg" href="{{url('projects')}}" role="button">Read More</a>
                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-6 pull-right" >
                            {{--<h2>Urgent Cause</h2>--}}
                            <div class="donors1 col-md-10 col-lg-10 col-xs-10 col-sm-10">
                                <p>Founder take care of all the administrative cost</p>

                            </div>
                            <a href="{{url('/select')}}" class="btn btn-lg">DONATE</a>
                        </div>

                    </div>
                </div>
                <div class="item">
                    <img class="third-slide img-responsive" src="{{URL::asset('/images/education2.jpg')}}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption third col-md-7 col-lg-7 col-sm-6 col-xs-6">
                            <h1>CAUSE3:Digitize Classrooms</h1>
                            <p>We rise by "LIFTING OTHERS"</p>
                            <a class="btn btn-lg" href="{{url('projects')}}" role="button">Read More</a>
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

        <div class="container-fluid header_education" id="header_education">
            <h1> Educate yourself</h1>
            <div >

                <iframe class="col-lg-8 col-xs-8 col-sm-8 col-md-8" src="https://www.youtube.com/embed/PHe0bXAIuk0"  frameborder="0" allowfullscreen></iframe>

            </div>
            <div class="col-lg-4 col-xs-4 col-md-4 col-sm-4 pull-left">
                <h2>Video title</h2>
                <p>Some description  about video ,Main theme of the video</p>
                <a href="{{url('/education')}}" class="btn btn-lg">See more</a>
            </div>
        </div>

        <div class=" container-fluid header_projects" id="projects">
            <h1>Our Projects</h1>
            <div class="container div2">
                <div class="col-lg-11 col-md-11 col-xs-12 col-sm-11">

                    @foreach($projects_c as $cproject)
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="homeprojects" >

                                <div class="head">{{$cproject->project_Status}}</div>
                                <div class="project_image image">
                                    <img src="images/{{$cproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>
                                    {{--<div><h3>Project Name</h3></div>--}}
                                    <div><h3>{{$cproject->project_Title}}</h3></div>
                                    <div><p>A community of lifelong learners, and champions of our own success.</p></div>
                                    <div style="padding-left: 10px;padding-bottom: 10px;"><a href="{{url('projects')}}" class="btn btn-lg"  style="right:30%" title={{$cproject->project_Title}} data-content={{$cproject->project_Description}}>See more </a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class=" container-fluid header_Events" >
            <h1>Our Events </h1>
            <div class="container div2">
                <div class="col-lg-11 col-md-11 col-xs-12 col-sm-11">
                    {{--For ecah statement for the Events--}}
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents">
                            <div class="head">Current</div>
                            <div class="project_image image"><img src="{{URL::asset('/images/people1.jpg')}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>

                                <a href="{{url('events')}}" class="btn btn-lg">See more </a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents">
                            <div class="head">Current</div>
                            <div class="project_image image">
                                <img src="{{URL::asset('/images/people1.jpg')}}" class="img-responsive"  alt="Image"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>

                                <a href="{{url('events')}}" class="btn btn-lg">See more </a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents ">
                            <div class="head">Current</div>
                            <div class="project_image image"><img src="{{URL::asset('/images/people.jpg')}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>
                                <a href="{{url('events')}}" class="btn btn-lg">See more </a></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="suggest_donors container-fluid">
            <div class="row">

                <div class="suggest1 col-lg-offset-4 col-md-6 col-lg-6 col-xs-9 col-sm-6">
                    <h2>Suggest Here</h2>
                    <form class="form-horizontal col-md-10 col-lg-10 col-xs-11 col-sm-10" id="suggestform">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10" style="margin-right: 10px;">
                        <input class="form-control name " name="username"  placeholder="Name :*" >  </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10">
                        <input class="form-control email  " name="email" type="email"  placeholder="Email :*"></div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-10">
                        <textarea class="form-control suggestarea" name="suggestarea"  placeholder="Suggestion :*"> </textarea></div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <button class="btn col-lg-offset-12 btn-md">Shoot It !</button></div>
                    </form>
                </div>
            </div>
            <div class=" col-md-3 col-lg-3 col-xs-3 col-sm-3 col-lg-offset-10">
                <a href="#" class="scrollToTop"><img src="{{URL::asset('/images/back_to_top_icon.png')}}"/></a>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
     <script>
         $(document).ready(function(){
             $(this).scrollTop(0);
         });
        $(document).ready(function(){
            var scroll_start = 1;
            var startChange = $('.nav1');
            var offset = startChange.offset();
            $(document).scroll(function() {
                scroll_start = ($(this).scrollTop()>0);
                if(scroll_start > offset.top) {
                    $('.nav1').css('background-color', '#2c7873');
                } else {
                    $('.nav1').css('background-color', 'transparent');
                }
            });
//        });
//        $(document).ready(function(){

            //Check to see if the window is top if not then display button
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });
            //Click event to scroll to top
            $('.scrollToTop').click(function(){
                $('html, body').animate({scrollTop : 0},1000);
                return false;
            });
        });
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


    </script>


@endsection
