@extends('layouts.main')

@section('title', '|Update Profile')
@section('stylesheets')
    <link rel="stylesheet"  type="text/css" href="/public/css/userprofile.css">
@endsection
@section('content')
<div class="container">
    <h1 class="page-header" style="color: #d9534f;">Edit Profile</h1>
    <div class="row">
        <!-- Profile Image -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="IMG/charity.jpg" height="200px" width="200px" class="avatar img-circle img-thumbnail" id="profileimg"/>
                <h6>Upload New Picture</h6>
                <input type="file" class="text-center center-block well well-sm" onchange="readURL(this);">
                <input class="btn btn-warning" value="Submit" type="Submit" id="submit" onclick="hide()" disabled>
                <input class="btn btn-success" value="OK" type="Submit" id="save" onclick="show()">
            </div>
        </div>
        <!-- Personal Info -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

            <h3>Personal info</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="Full Name" type="text" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="example@domain.com" type="text" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone Number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="(999)-999-9999" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <span class="pwd pull-left">********</span>
                        <span><a href=""><input class="btn btn-info pull-right" value="Reset" type="button"/></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address1:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="Enter Your Street Address" rows="1"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Address2:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" placeholder="APT/BLDG/SUITE" rows="1"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Country:</label>
                    <div class="col-md-8">
                        <select name="country" id="country" class="dropdown form-control input-sm">
                            <option value="">United States</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">State:</label>
                    <div class="col-md-8">
                        <select name="state" id="state" class="dropdown form-control input-sm">
                            <option value="">California</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Zipcode:</label>
                    <div class="col-md-8">
                        <input class="form-control" value="" type="text" placeholder="Zipcode">
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-success" value="Save Changes" type="button">
                        <span></span>
                        <input class="btn btn-danger" value="Cancel" type="reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection