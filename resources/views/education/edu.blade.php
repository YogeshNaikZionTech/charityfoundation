@extends('layouts.main')

@section('title', '| Education')
@section('stylesheets')
    <link href="{{URL::asset('/css/app2.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
   
    	
 	
	    <video src="https://s3.amazonaws.com/codecademy-content/projects/excursion/bg.mp4" autoplay muted loop></video>
    	

    
@endsection

@section('scripts')
<script type="text/javascript">
	

	$(document).ready(function(){

		$(".navbar.navbar-inverse").css({"margin-bottom":"0px","border-radius":"0px"});
		$("#content").css("margin-bottom","-5.37px")

	});
</script>
@endsection