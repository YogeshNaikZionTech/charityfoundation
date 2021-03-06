@extends('layouts.main')
@section('title', '| Register')
@section('stylesheets')
    <link href="{{URL::asset('/css/auth.css')}}" rel="stylesheet" type="text/css"/>
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="reg-form" id= "content">
    <h1>AA Foundation User Registration</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 panelbody">
            <div class="panel panel-info">
                <div class="panel-heading">Register</div>
                <div class="panel-body" >
                    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 pull-left">
                        <a class="btn btn-link" href="{{ url('/login') }}">
                            <b>Already a member ?<span class="loginregister">&nbsp;Please login here</span></b>
                        </a>
                        <br/>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
                    <form id="registerForm" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name* :</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Last Name* :</label>

                            <div class="col-md-6 ">
                                <input id="name" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address* :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <i class="fa fa-user"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password* :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <i class="fa fa-lock"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password* :</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Country* :</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State* :</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required autofocus>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    Clear
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="js/nav.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#registerForm')
                    .on('init.field.fv', function(e, data) {
                        var field  = data.field,        // Get the field name
                                $field = data.element,      // Get the field element
                                bv     = data.fv;           // FormValidation instance

                        // Create a span element to show valid message
                        // and place it right before the field
                        var $span = $('<small/>')
                                .addClass('help-block validMessage')
                                .attr('data-field', field)
                                .insertAfter($field)
                                .hide();

                        // Retrieve the valid message via getOptions()
                        var message = bv.getOptions(field).validMessage;
                        if (message) {
                            $span.html(message);
                        }
                    })
                    .bootstrapValidator({
                        framework: 'bootstrap',
                        feedbackIcons:{

                            valid:'glyphicon glyphicon-ok',
                            invalid:'glyphicon glyphicon-remove',
                            validating:'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            country: {
                                validMessage: 'The country looks great',
                                validators: {
                                    notEmpty:{
                                        message: 'Please enter your country name '
                                    },

                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The country can only consist of alphabets'
                                    }
                                }
                            },
                            email : {

                                validators: {
                                    notEmpty: {
                                        message: 'Please enter your email id'
                                    }

                                }
                            },
                            firstname:{
                                validators:{
                                    notEmpty:{
                                        message: 'Please enter your name '
                                    },
                                    regexp:{
                                        regexp:/^[A-Za-z\s]+$/,
                                        message: 'Name can have only alphabets'
                                    }
                                }
                            }, //Name
                            lastname:{
                                validators:{
                                    notEmpty:{
                                        message: 'Please enter your last name '
                                    },
                                    regexp:{
                                        regexp:/^[A-Za-z\s]+$/,
                                        message: 'Name can have only alphabets'
                                    }
                                }
                            }, //Name

                            state: {
                                validMessage: 'The state looks great',

                                validators: {
                                    notEmpty:{
                                        message: 'Please enter your state name '
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The state can only consist of alphabets'
                                    }
                                }
                            }

                        }
                    })
                    .on('success.field.fv', function(e, data) {
                        var field  = data.field,        // Get the field name
                                $field = data.element;      // Get the field element

                        // Show the valid message element
                        $field.next('.validMessage[data-field="' + field + '"]').show();
                    })
                    .on('err.field.fv', function(e, data) {
                        var field  = data.field,        // Get the field name
                                $field = data.element;      // Get the field element

                        // Show the valid message element
                        $field.next('.validMessage[data-field="' + field + '"]').hide();
                    });
        });


    </script>
@endsection