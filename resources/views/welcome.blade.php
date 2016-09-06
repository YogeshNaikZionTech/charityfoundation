@extends('layouts.main')

@section('title', '| Welcome')
@section('content')
    <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="IMG/image1.png" alt="First Slide">
            </div>
            <div class="item">
                <img src="IMG/image1.png" alt="Second Slide">
            </div>
            <div class="item">
                <img src="IMG/image1.png" alt="Third Slide">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">UPCOMING EVENTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">CURRENT EVENTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">PAST EVENTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
    </div>
</div><br>
<!-- <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-md navbar-right ">
      <h2>OUR TOP DONORS</h2>
      <p>
      </p>
      <br><br>

    </div>
    <br> -->


<div class="col-sm-2 sidenav navbar-right">
    <div class="well">
        <p></p>
    </div>
    <div class="well">
        <p></p>
    </div>
</div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">UPCOMING PROJECTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">CURRENT PROJECTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">PAST PROJECTS</div>
                <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer"><button class="btn btn-success btn-md">See more </button></div>
            </div>
        </div>
    </div>
</div><br><br>
@endsection