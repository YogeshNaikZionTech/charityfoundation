@extends('layouts.main')
@section('title', '| Login')
@section('stylesheets')
    <link href="{{URL::asset('/css/auth.css')}}" rel="stylesheet" type="text/css"/>
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="login-form" id ="content">
    <h1>Sign in to continue to AA Foundation</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 panelbody">
            <div class="panel panel-info">
                <div class="panel-heading">Login </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address* :</label>

                            <div class="col-md-6 formspacing">
                                   <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <i class="fa fa-user"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong> </span>

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                @endif
                            </div>
                            <label for="password" class="col-md-4 control-label">Password* :</label>

                            <div class="col-md-6 formspacing">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <i class="fa fa-lock"></i>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                            </div>
                            <div class="form-group ">
                            <div class="col-md-3 col-md-offset-2">
                                <a class="btn btn-link" href="{{ url('/register') }}">
                                    Not a member yet? <span class="loginregister">Please register here</span>
                                </a>
                            </div>
                                </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary log-btn">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/nav.js"></script>
@endsection


