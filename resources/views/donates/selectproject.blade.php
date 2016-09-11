@extends('layouts.main')

@section('title', '|Select Project')
@section('content')
    <div class="container">
        @if(Session::has('successLogin'))
            <div class="alert alert-success" role="alert">
            <strong>{{\Session::get('successLogin')}}</strong>
            </div>
        @endif
            <h2>What cause would you like to donate to?</h2>
            <form name="selectProj" action="{{url('donates/setproject')}}" method="GET">
                <div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj1"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj2"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj3"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div><div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj4"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div><div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj5"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div><div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj6"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div><div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj7"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div><div class="col-md-3">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn sel"><input type="radio" name="options" value="Proj8"><img src="{{URL::asset('/images/charity.jpg')}}" height="150px" width="150px"></label>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <input type="submit" class="btn btn-success pull-right" value="Continue">
                    </div>
                </div>
            </form>
    </div>
    </div>
</div>
@endsection
