@extends('layouts.main')

@section('title', '| Welcome')
@section('stylesheets')

<style>
.panel-footer{
    color:#000000;
}
</style>
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
    </script>
    <div id="content">

    <div class="container" id="quotes">

        <blockquote><h2>To ease another’s heartache is to forget one’s own.<div id="author">-Abraham Lincoln</div></h2></blockquote>
    </div>

<!--     <div class="bs-example">
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
</div> -->
<hr style="border-top: 1px solid black; margin-top: 75px; width: 100%">
        <div class="container div2">
            <div class="row">
                <div class="col-md-9">
                    
                 @foreach($projects_c as $cproject)
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">{{$cproject->project_Status}}</div>
                                    <div class="panel-body"><img src="images/{{$cproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>

                                    <div class="panel-footer"><button class="btn btn-success btn-md"  title={{$cproject->project_Title}} data-toggle="popover" data-placement="right" data-content={{$cproject->project_Description}}>See more </button></div>
                                </div>
                            </div>
                    @endforeach


                     {{--<div class="text-center">--}}
                         {{--{!! $projects_c->links() !!}--}}
                     {{--</div>--}}




                        {{--@foreach($projects_f->slice(0,3) as $fproject)--}}
                            {{--<div class="col-md-4">--}}
                                {{--<div class="panel panel-primary">--}}
                                    {{--<div class="panel-heading">{{$fproject->project_Status}}</div>--}}
                                    {{--<div class="panel-body"><img src="images/{{$fproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>--}}
       {{--<div class="panel-footer"><button class="btn btn-success btn-md"  title="Future Event title" data-toggle="popover" data-placement="right" data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy ">See more </button></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}



                                {{--@foreach($projects_p->slice(0,3) as $pproject)--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="panel panel-primary">--}}
                                            {{--<div class="panel-heading">{{$pproject->project_Status}}</div>--}}
                                            {{--<div class="panel-body"><img src="images/{{$pproject->project_Image}}" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>--}}

       {{--<div class="panel-footer"><button class="btn btn-success btn-md"  title="Completed Event title" data-toggle="popover" data-placement="right" data-content="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy ">See more </button></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}

                            </div>



                                <div class="col-md-3 donors btn btn-success">Total Number of Donations<hr style="margin:0px"> 
                                <div style="padding-bottom:5px"><span style="font-size:40px; padding-bottom:5px"> 123,456,789</span></div>   
                                  </div>
                                <div class="col-md-3 suggest"><h2>Suggestions</h2><hr style="margin:0px"> 
                                <textarea style="border-radius:4px;color:black"rows="8" cols="40" placeholder="We would like to hear your ideas"></textarea> 
                                <button class="btn btn-success" type="submit" id="suggest">Submit</button>  
                                  </div>
                                </div>
                                </div>




  
                                <!-- <div class="row" style="border: #ddd 1px solid;">

                                    <div class="col-md-6 suggest">  
                                    <textarea rows="10" cols="100">  </textarea>
                                    
                                    </div>
<div class="col-md-3 col-md-offset-1 donor">Total Number of Donations<hr style="margin:0px"> 
                                <div style="padding-bottom:5px"><span style="font-size:40px; padding-bottom:5px"> 123,456,789</span></div>   
                                  </div>
                                </div>  -->
                </div>
            </div>
    </div>
    </div>

@endsection