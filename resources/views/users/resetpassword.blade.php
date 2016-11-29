@extends('layouts.main')
@section('title', '| reset Password')

@section('stylesheets')
    <link href="{{URL::asset('/css/resetpassword.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container resetpage" id="content">
        <form id="resetPassword" class="form-horizontal" action="{{url('/userprofile/preset')}}" method="POST">

             <!-- Reset Password section -->
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                    <label for="username" class="col-md-3 control-label">Name :</label>
                    <div class="col-lg-6">
                        <input class="form-control" id="username" name="username" value=" {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}" pattern="/^[a-zA-Z]+$/" type="text" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email :</label>
                    <div class="col-lg-6">
                        <input class="form-control" id="email" value="{{ Auth::user()->email }}" type="email" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Current Password* :</label>
                    <div class="col-md-6">
                        <input id="opassword" type="password" class="form-control" name="opassword" required />
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-3    control-label">New Password* :</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required />
                    <i class="fa fa-lock"></i>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-3 control-label">Confirm Password* :</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success">
                        Reset Password
                    </button>
                    <button type="reset" class="btn btn-warning">
                        Clear
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endsection
@section('scripts')
    <script src="{{URL::asset('/js/nav.js')}}"></script>

@endsection