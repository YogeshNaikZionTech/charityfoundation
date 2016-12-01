@extends('layouts.main')

@section('title', '| Education')
@section('stylesheets')
    <link href="{{URL::asset('/css/app2.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

        <div class="videos">

            <video autoplay loop muted class="video-bg">
                <source src="{{URL::asset('/video/Book.mp4')}}"  type="video/mp4" />

            </video>
        </div>
<div class="container-fluid header_education" id="content" >
    <h1> Educate yourself</h1>

    <div class="row container-fluid">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6" >
            <div class="col-lg-11 col-xs-12 col-md-10 col-sm-12 ">
                <h2>Are students failing or the system?! </h2>
                <p>Sonam Wangchuk shares his experience of bringing education reforms in the region of Ladakh, India.Sonam Wangchuk is the founder of Students' Educational & Cultural Movement of Ladakh (SECMOL). </p>
            </div>
            <iframe class="col-lg-11 col-xs-12 col-sm-11 col-md-11 " src="https://www.youtube.com/embed/qH1HCYy1NTc" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6" >
            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 ">
                <h2>Education in India - BBC </h2>
                <p>Sanjeev visits some impressive young students taking time out of their school day to help teach street children the same syllabus. That's recycled learning, Indian style, and it makes a big impression on our presenter in this BBC Worldwide video clip.</p>
            </div>
            <iframe class="col-lg-11 col-xs-12 col-sm-11 col-md-11  " src="https://www.youtube.com/embed/aKspt58JbsM" frameborder="0" allowfullscreen></iframe>

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