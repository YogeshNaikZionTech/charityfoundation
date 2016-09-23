@extends('layouts.main')

@section('title', '|Update Profile')
@section('stylesheets')
    <link href="{{URL::asset('/css/userprofile.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container" id="content">
        @if(Session::has('profileUpdated'))
            <div class="alert alert-success" role="alert">
                <strong>{{\Session::get('profileUpdated')}}</strong>
            </div>
        @endif
        <h1 class="page-header" style="color: #d9534f;">Edit Profile</h1>
        <div class="row">
            <!-- Profile Image -->
            <form enctype="multipart/form-data" action="{{url('/userprofile')}}" method="POST">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">

                        <img src="/avatars/{{Auth::user()->avatar}}" height="200px" width="200px"  class="avatar img-circle img-thumbnail" name="profileimg" id="profileimg"/>
                        <h6>Upload New Picture</h6>

                        <input type="file" name="avatar" class="text-center center-block well well-sm" onchange="readURL(this);">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
                    </div>
                </div>
                <!-- Personal Info -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                    <h3>Personal info</h3>
                    <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="username" value=" {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}" pattern="/^[a-zA-Z]+$/" type="text" disabled>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ Auth::user()->email }}" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" type="email" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" required name="phonenum" maxlength="10"  placeholder="Enter your 10 digit phone number" pattern="\d+" value="{{ Auth::user()->phonenum }}" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <span class="pwd pull-left">********</span>
                            <span><a href="{{url('/password/reset')}}"><input class="btn btn-info pull-right" value="Reset" type="button"/></a></span>
                            {{ csrf_field() }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Address* :</label>
                        <div class="col-md-8">
                            <input class="form-control" required name="street" value="{{ Auth::user()->street }}"  placeholder="Enter Your Street Name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address2* :</label>
                        <div class="col-md-8">
                            <input class="form-control"  name="aptNo" value="{{ Auth::user()->aptNo }}"  placeholder="Enter Your aptNo" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">State:</label>
                        <div class="col-md-8">
                            <input class="form-control" name="state" required value="{{ Auth::user()->state }}" pattern="[A-Za-z]{2}" placeholder="Enter state 2 letter state code" type="text">
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-md-3 control-label">Country:</label>
                        <div class="col-md-8" data-tip="please input 3 digits of country code, ex:USA" >
                            <input class="form-control" name="country" required value="{{ Auth::user()->country }}" pattern="[A-Za-z]{3}"  placeholder="Enter three letter country code" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="col-md-3 control-label">Zipcode:</label>
                        <div class="col-md-8">
                            <input id="zip" class="form-control" title="zipcode" name="zipcode" required minlength="5" value="{{ Auth::user()->zipcode }}" pattern="(\d{5}([\-]\d{4})?)" type="text" placeholder="Enter your 5 digit zipcode">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-success" value="Save Changes" type="submit">
                            <span></span>
                            <input class="btn btn-danger" value="Cancel" type="reset">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')

     <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                 reader.onload = function (e) {
                    $('#profileimg').attr('src', e.target.result)
                     .width(200)
                    .height(200);
                 };

                 reader.readAsDataURL(input.files[0])
            }
             }
             $($(document).ready(function(){
                             $('input:file').change(
                                     function(){
                                        if ($(this).val()) {
                                            $('input:submit').attr('disabled',false);
                                            }
                                        }
                                     );
                            }));
        $(function()
                    {
                        $('#main-content') .css({'height': (($(window).height()) - 361)+'px'});
                        $(window).bind('resize', function(){
                        $('#main-content') .css({'height': (($(window).height()) - 361)+'px'});
                        });
               });
     </script>

@endsection