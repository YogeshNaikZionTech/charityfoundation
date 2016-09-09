@extends('layouts.main')

@section('title', '|Select Project')
<link href="{{ asset('css/selectproject.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <div class="container">
        @if(Session::has('successLogin'))
            <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('successLogin')}}</strong>
            </div>
        @endif
        <h2>What cause would you like to donate to?</h2>
        <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">

                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>

                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
            </div>

        </div>


        <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>

                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
            </div>


        </div>


        <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">

                <label class="btn sel"><input type="radio" name="options"><img src="/public/images/charity.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>

                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
            </div> </div>
        <div class="col-md-3">
            <div class="btn-group" data-toggle="buttons">

                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>

                <label class="btn sel"><input type="radio" name="options"><img src="thumb.jpg" height="25px" width="25px" class="pull-left">Project Name</label>
            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-success pull-right" style="margin:20px 0px">Continue</button>
        </div>

    </div>
</div>
@endsection