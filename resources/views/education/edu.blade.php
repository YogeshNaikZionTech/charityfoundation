@extends('layouts.main')

@section('title', '| Education')
@section('stylesheets')
    <link href="{{URL::asset('/css/app2.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

	    {{--<video src="https://s3.amazonaws.com/codecademy-content/projects/excursion/bg.mp4" autoplay muted loop></video>--}}
        <div class="videos">

            <video autoplay loop muted class="video-bg">
                <source src="https://s3.amazonaws.com/codecademy-content/projects/excursion/bg.mp4"  type="video/mp4" />

            </video>
        </div>
<div class="container-fluid header_education" id="content" >
    <h1> Educate yourself</h1>

    <div class="row container-fluid">
    <div class="container col-lg-12 col-md-12 col-xs-12 col-sm-12  "  >
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6" >
            <div class="col-lg-10 col-xs-12 col-md-10 col-sm-12 ">
                <h2>India the-future superpower reclaiming</h2>
                <p>Some description  about video or Main theme of the video</p>
            </div>
            <iframe class="col-lg-11 col-xs-12 col-sm-11 col-md-11 " src="https://www.youtube.com/embed/J_g7p5x-LUs" frameborder="0" allowfullscreen></iframe>



        </div>

        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6" >
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
                <h2>India the-future superpower reclaiming</h2>
                <p>Some description  about video or Main theme of the video</p>
            </div>
            <iframe  class="col-lg-11 col-xs-12 col-sm-11 col-md-11  " src="https://www.youtube.com/embed/Ndh58GGCTQo" frameborder="0" allowfullscreen></iframe>

        </div>

    </div>

    </div>


</div>

    
@endsection

@section('scripts')
<script type="text/javascript">
	

	$(document).ready(function(){

		$(".navbar.navbar-inverse").css({"margin-bottom":"0px","border-radius":"0px"});
		$("#content").css("margin-bottom","-5.37px")

	});
</script>
<script src="{{URL::asset('/js/nav.js')}}"></script>
@endsection