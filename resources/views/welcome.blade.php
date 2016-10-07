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
                <div class="item active">
                    <img class="first-slide" src="{{URL::asset('/images/slide-2.jpg')}}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption" style="position: absolute">
                            <h1>CAUSE1: Education</h1>
                            <p>"Educate CHILDREN in RURAL area"</p>
                            <p><a class="btn btn-lg" href="#" role="button">Read More</a></p>

                        </div>
                        <div class="donate_carousel col-md-4  col-lg-4 col-sm-4 col-xs-10 pull-right" >
                            {{--<h2>Urgent Cause</h2>--}}
                            <div class="donors1 col-md-10 col-lg-10 col-xs-10 col-sm-10" style="padding-bottom: 30px;">
                                <h2>Total Number of Donors</h2>
                                <span>1,23,3456</span>

                            </div>
                            <button class="btn btn-lg"  style="border: 2px white solid;">DONATE</button>
                            {{--<div class="circle" id="circles-309">--}}
                                {{--<div class="circles-wrp" style="position: relative; display: inline-block;">--}}
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="166" height="166">--}}
                                        {{--<path fill="transparent" stroke="#FFF" stroke-width="10" d="M 82.98411349011178 5.000001617828204 A 78 78 0 1 1 82.89165956483042 5.000075241381751 Z" class="circles-maxValueStroke"></path>--}}
                                        {{--<path fill="transparent" stroke="#f8b864" stroke-width="10" d="M 82.98411349011178 5.000001617828204 A 78 78 0 0 1 87.81704624539476 5.148885265079684 " class="circles-valueStroke"></path></svg>--}}
                                    {{--<div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 58.1px; height: 166px; line-height: 166px;">--}}
                                        {{--<div class="text-inner">0<span class="small">%</span></div>--}}
                                        {{--<h4>Raised   |    Goal</h4>--}}
                                        {{--<button class="btn btn-md">DONATE</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </div>

                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="{{URL::asset('/images/slide3.jpg')}}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>CAUSE2:Solar panels to Schools</h1>
                            <p>We make a LIVING by what we GET but we make a LIFE by what we GIVE</p>
                            <p><a class="btn btn-lg" href="#" role="button">Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="third-slide" src="{{URL::asset('/images/slide1.jpg')}}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>CAUSE3:Digitize Classrooms</h1>
                            <p>We rise by "LIFTING OTHERS"</p>
                            <p><a class="btn btn-lg" href="#" role="button">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class=" container-fluid header_projects">
            <h1>Our Projects</h1>
            <div class="container-fluid div2">
                <div class="col-lg-11 col-md-11 col-xs-12 col-sm-11">

                    @foreach($projects_c as $cproject)
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">

                            <div class="homeprojects">

                                <div class="head">{{$cproject->project_Status}}</div>
                                <div class="project_image">
                                    <img src="images/{{$cproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                                <div>
                                </div>
                                    {{--<div><h3>Project Name</h3></div>--}}
                                    <div><h3>{{$cproject->project_Title}}</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>
                                    <button class="btn btn-lg"  title={{$cproject->project_Title}} data-content={{$cproject->project_Description}}>See more </button></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class=" container-fluid header_Events" >
            <h1>Our Events </h1>
            <div class="container-fluid div2">
                <div class="col-lg-11 col-md-11 col-xs-12 col-sm-11">
                    {{--For ecah statement for the Events--}}
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents">
                            <div class="head">Current</div>
                            <div class="project_image"><img src="{{URL::asset('/images/people1.jpg')}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>

                                <button class="btn btn-lg">See more </button></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents">
                            <div class="head">Current</div>
                            <div class="project_image"><img src="{{URL::asset('/images/people1.jpg')}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>

                                <button class="btn btn-lg">See more </button></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="homeEvents">
                            <div class="head">Current</div>
                            <div class="project_image"><img src="{{URL::asset('/images/people.jpg')}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                            <div>
                                <div><h3>Event Name</h3></div>
                                <div><p>A community of lifelong learners, and champions of our own success.</p></div>
                                <button class="btn btn-lg">See more </button></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="suggest_donors container-fluid">
            <div class="row">
                <div class="donors1 col-md-6 col-lg-6 col-xs-12 col-sm-6">
                    <h2>Our Members/Donors</h2>
                    <span>786</span>
                </div>
                <div class="suggest1 col-md-6 col-lg-6 col-xs-12 col-sm-6">
                    <h2>Suggest Here</h2>
                    <form class="form-horizontal col-md-10 col-lg-10 col-xs-11 col-sm-10">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10" style="margin-right: 10px;">
                        <input class="form-control " required placeholder="Name :*" >  </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-10">
                        <input class="form-control " required placeholder="Email :*"></div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" required placeholder="Suggestion :*"> </textarea></div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <button class="btn btn-md">Shoot It !</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
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
    <script>
        jQuery(function ($) {
            $(window).load(function(){
                setTimeout(function(){
                    var myCircle = Circles.create({
                        id:                  'circles-309',
                        radius:              83,
                        value:               0,
                        maxValue:            100,
                        width:               10,
                        text:                function(value){
                            return '<div class="text-inner">' + value + '<span class="small">%</span>' +
                                    '<span class="text">Complete</span></div>';
                        },
                        colors:              ['#FFF', '#f8b864'],
                        duration:            600,
                        wrpClass:            'circles-wrp',
                        textClass:           'circles-text',
                        valueStrokeClass:    'circles-valueStroke',
                        maxValueStrokeClass: 'circles-maxValueStroke',
                        styleWrapper:        true,
                        styleText:           true
                    });
                }, 3000);

            });
        });
    </script>
    <script type="text/javascript">

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
                                regexp: /^[a-z0-9]+$/i,
                                message: 'Only alphanumeric characters.'
                            }
                        }
                    }

                }

            });

        });

    </script>

    {{--<script type="text/javascript" id="hcb">--}}
    {{--/*<!--*/ if(!window.hcb_user){hcb_user={};} hcb_user.PAGE="http://localhost:8000/";--}}
    {{--(function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&mod=%241%24wq1rdBcg%244TFKaKX4UR2naHrnkpaM7."+"&opts=86&num=2&ts=1475256747035");--}}
    {{--if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); hcb_user.submit="submit";/*-->*/ </script>--}}
@endsection
