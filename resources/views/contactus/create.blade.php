@extends('layouts.main')

@section('title', '|Contact Us')
@section('stylesheets')
    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('/public/css/style.css')}}" >
@endsection
@section('content')
    <div class="media1 container">
        <div class="fa-header">
            <h2>Contact</h2>
            <hr class="container col-lg-11">
        </div>
        <div class="container" style="margin-bottom: 5px;">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-map-marker"></span>
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Charity Foundation</h3>
                        Address: Street Number,<br/>
                        city, state, <br/> Country, Zipcode
                    </div>
                </div>

            </div>

            <div class="media col-lg-6 col-md-6 col-xs-12 col-sm-6">
                <div class="media col-lg-10 col-md-10 col-sm-10">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-earphone"></span>
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Office Contact Details</h3>
                        +1 234-567-8901<br/>
                        +1 234-567-8901

                    </div>
                </div>
                <div class="media col-lg-10 col-md-10 col-sm-10">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </div>
                    <div class="media-body " >
                        <h3 class="media-heading col-xs-9">Office Contact Details</h3>
                        Example.email.com<br/>
                        Example.email.com

                    </div>
                </div>

            </div>
        </div>
        <div class="container" >
            <p class="para">We would love to hear from You!If you have any queries or would like to send a suggestion on how we can help more people.<br/>
                If you are interested in volunteering for an event, share your availability so we will get in touch with you. </p>
        </div>
        <div class="container " >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-11">
                <form class="form-horizontal" name="contact">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-right:3px;">
                        <input  id="firstname" required type="text" class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-10" placeholder="First Name *" />
                    </div>

                    <!--</form>-->
                    <!--<form class="form-horizontal">-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="padding-right:3px;">
                        <input id="lastname" required type="text" class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-10" placeholder="Last Name *"  />
                    </div>

                    <!--</form>-->
                    <!--<form class="form-horizontal">-->
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input  id="email" required type="email" class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-10" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email *" />
                    </div>





                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-11">
                <form class="form-horizontal" name="suggestion">
                    <div class="form-group col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <textarea  id="message"  class="form-control col-lg-10 col-md-10 col-sm-10 col-xs-10" placeholder="Suggest a new project or event or share your availability timing for volunteer work" rows="9">
                    </textarea>
                    </div>

                </form>
            </div>
        </div>
        <div class="checkbox container">
            <label><input type="checkbox" value="">I'm interested in volunteering</label>
            <button class="btn  btn-success pull-right">SUBMIT</button>
        </div>
    </div>
    @endsection