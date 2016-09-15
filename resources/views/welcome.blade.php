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
    <div class="col-md-9">
    <div class="row">
            
    

    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">UPCOMING EVENTS</div>
        <div class="panel-body"><img src="images/event2.png" class="img-responsive" style="width:100%" alt="Image" height="50px"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">CURRENT EVENTS</div>
        <div class="panel-body"><img src="images/event2.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">PAST EVENTS</div>
        <div class="panel-body"><img src="images/event2.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>


    </div>

    <div class="row">
      
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">UPCOMING PROJECTS</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">CURRENT PROJECTS</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">PAST PROJECTS</div>
        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
      </div>
    </div>

    </div>
  </div>

     <div class="col-md-3">
       <div class="container-fluid">
          <div class="thumbnail" id="dList">
            <div class="donors">
               <div class="list-group">
                    <a href="#" class="list-group-item active">Top Donors</a>
                    <a href="#" class="list-group-item">Name One</a>
                    <a href="#" class="list-group-item">Name Two</a>
                    <a href="#" class="list-group-item">Name Three</a>
                    <a href="#" class="list-group-item">Name Four</a>
                    <a href="#" class="list-group-item">Name Five</a>
                    <a href="#" class="list-group-item">Name Six</a>
                    <a href="#" class="list-group-item">Name Seven</a>
                    <a href="#" class="list-group-item">Name Eight</a>
              </div>
            </div>
        </div>
      </div>
    </div>





  </div>
</div><br>
@endsection