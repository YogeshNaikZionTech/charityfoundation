@extends('layouts.main')

@section('title', '| Welcome')
@section('stylesheets')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
    <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
       
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{URL::asset('/images/IMG_5425-e1446473445680-1400x200.jpg')}}" class="images">
            </div>
            <div class="item">
                <img src="{{URL::asset('/images/wheat-banner1400x200.jpg')}}" class="images">
            </div>
            <div class="item">
                <img src="{{URL::asset('/images/xPicos2011-1400x200.jpg.pagespeed.ic.eD0CUoS-AZ.jpg')}}" class="images">
            </div>
        </div>
        
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

        <div class="container div2">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($projects_c as $cproject)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$cproject->project_Status}}</div>
                                    <div class="panel-body"><img src="images/{{$cproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                                    <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                        @foreach($projects_f as $fproject)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$fproject->project_Status}}</div>
                                    <div class="panel-body"><img src="images/{{$fproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>
                                    <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                                @foreach($projects_p as $pproject)
                                    <div class="col-md-3">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">{{$pproject->project_Status}}</div>
                                            <div class="panel-body"><img src="images/{{$pproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                                            <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                </div>
            </div>
    </div>


@endsection