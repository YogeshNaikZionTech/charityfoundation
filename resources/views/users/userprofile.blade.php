@extends('layouts.main')

@section('title', '|Update Profile')
@section('stylesheets')

@endsection
@section('content')
    <div class="container">
    @if(Session::has('profileUpdated'))
        <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('profileUpdated')}}</strong>
        </div>
    @endif
    <h1 class="page-header" style="color: #d9534f;">Edit Profile</h1>
    <div class="row">
        <!-- Profile Image -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <form enctype="multipart/form-data" action="{{url('/userprofile')}}" method="POST">
                <img src="/avatars/{{Auth::user()->avatar}}" height="200px" width="200px"  class="avatar img-circle img-thumbnail" name="profileimg"/>
                <h6>Upload New Picture</h6>

                    <input type="file" name="avatar" class="text-center center-block well well-sm ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

            </div>
        </div>
        <!-- Personal Info -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

            <h3>Personal info</h3>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" value=" {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}" type="text" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value=" {{ Auth::user()->email }}" type="text" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone Number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="phonenum" value="{{ Auth::user()->phonenum }}" type="text">
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
                    <label class="col-md-3 control-label" >Address:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="street" value="{{ Auth::user()->street }}"  placeholder="Enter Your Street Name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Address2:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="aptNo" value="{{ Auth::user()->aptNo }}"  placeholder="Enter Your aptNo" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">State:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="state" value="{{ Auth::user()->state }}"  placeholder="Enter state" type="text">
                    </div>
                </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Country:</label>
                <div class="col-md-8">
                    <input class="form-control" name="country" value="{{ Auth::user()->country }}"  placeholder="Enter country" type="text">
                </div>
            </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Zipcode:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="zipcode" value="{{ Auth::user()->zipcode }}" type="text" placeholder="Zipcode">
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
            </form>
        </div>
    </div>
    </div>
    @endsection
