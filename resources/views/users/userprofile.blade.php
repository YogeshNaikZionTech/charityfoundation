@extends('layouts.main')

@section('title', '| Update Profile')
@section('stylesheets')
    <link href="{{URL::asset('/css/userprofile.css')}}" rel="stylesheet" type="text/css"/>
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
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
            <form enctype="multipart/form-data" id="userForm" class="form-horizontal" action="{{url('/userprofile')}}" method="POST">

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">

                        <img src="/images/avatars/{{Auth::user()->avatar}}" class="avatar img-circle img-thumbnail" name="profileimg" id="profileimg"/>
                        <h6>Upload New Picture</h6>

                        <input type="file" name="avatar" class="text-center center-block well well-sm" onchange="readURL(this);">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @if(!(Auth::user()->avatar =='default.png'))
                        <input type="checkbox" id="checkbox"  name="removeimage"  />
                            <label for="checkbox" class="col-md-10 col-sm-10 col-xs-10">Click here to remove the picture</label>
                        @endif
                    </div>

                </div>

                <!-- Personal Info -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                    <h2>Personal info</h2>
                    <div class="form-group">
                        <label for="username" class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" id="username" name="username" value=" {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}" pattern="/^[a-zA-Z]+$/" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" id="email" value="{{ Auth::user()->email }}" type="email" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phonenum" class="col-lg-3 control-label">Phone Number:</label>
                        <div class="col-lg-8">
                            <input  class="form-control" id="phonenum" name="phonenum" maxlength="10"  placeholder="Enter your 10 digit phone number" value="{{ Auth::user()->phonenum }}" type="tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <span class="pwd pull-left">********</span>
                            <span><a href="{{url('/userprofile/preset')}}"><input class="btn btn-info pull-right" value="Reset" type="button"/></a></span>
                            {{ csrf_field() }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="street" class="col-md-3 control-label" >Address :</label>
                        <div class="col-md-8">
                            <input class="form-control" id="street" name="street" value="{{ Auth::user()->street }}"  placeholder="Enter Your Street Name" type="text">

                        </div>
                    </div>
                    <div class="form-group">
                        <label id="aptNo" class="col-md-3 control-label">Address2 :</label>
                        <div class="col-md-8">
                            <input class="form-control" id="aptNo"  name="aptNo" value="{{ Auth::user()->aptNo }}"  placeholder="Enter Your aptNo" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-md-3 control-label">State:</label>
                        <div class="col-md-8">
                            <input class="form-control" id="state" name="state" value="{{ Auth::user()->state }}" placeholder="Enter State Name" type="text">

                        </div>
                    </div>
                    <div class="form-group" >
                        <label id="country" class="col-md-3 control-label">Country:</label>
                        <div class="col-md-8" data-tip="please input 3 digits of country code, ex:USA" >
                            <input class="form-control" id="country" name="country" value="{{ Auth::user()->country }}"   placeholder="Enter Country Name" type="text">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="col-md-3 control-label">Zipcode:</label>
                        <div class="col-md-8">
                            <input id="zip" class="form-control" title="zipcode" maxlength="5" name="zipcode"  value="{{ Auth::user()->zipcode }}"  type="text" placeholder="Enter your 5 digit zipcode">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">

                            <input class="btn btn-success" value="Save Changes" type="submit" >
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
        //Call to read the uploaded image URL
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profileimg').attr('src', e.target.result)
                            .width(200)
                            .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        // Function to get the checkbox is checked or not
        $(document).ready(function(){
                $("#checkbox").click(function() {
                    var checkbox = document.getElementById('checkbox');
                    if (checkbox.checked) {
                        document.getElementsByName("removeimage").value = 'true' ;
                    }
                });
                document.getElementsByName("removeimage").value = 'false' ;
        });

        $($(document).ready(function(){
            $('input:file').change(
                    function(){
                        if ($(this).val()) {
                            $('input:submit').attr('disabled',false);
                        }
                    }
            );
        }));
        //Function for footer
        $(function()
        {
            $('#main-content') .css({'height': (($(window).height()) - 361)+'px'});
            $(window).bind('resize', function(){
                $('#main-content') .css({'height': (($(window).height()) - 361)+'px'});
            });
        });

    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript">
        //Function to validate the form fields
        $(document).ready(function() {
            $('#userForm')
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

                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The country can only consist of alphabets'
                                    }
                                }
                            },
                            state: {
                                validMessage: 'The state looks great',

                                validators: {
                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The state can only consist of alphabets'
                                    }
                                }
                            },
                            phonenum: {
                                validators: {
                                     phone: {
                                        country: 'US',
                                        message: 'The phone number is not valid'
                                    },
                                    regexp: {
                                        regexp: /^\d{10}$/,
                                        message: 'The phone number  can only consist of 10 Numbers'
                                    }
                                }
                            },
                            zipcode: {
                                validators: {
//                                    notEmpty: {
//                                        message: 'The zipcode is required and cannot be empty'
//                                    },
                                    zipcode: {
                                        country: 'US',
                                        message: 'The value is not valid zipcode'
                                    },
                                    regexp: {
                                        regexp: /^\d{5}$/,
                                        message: 'The zip code  can only consist of 5 Numbers'
                                    }
                                }
                            },
                            street: {
                                icon: 'false',
                                validators: {
//                                    notEmpty: {
//                                        message: 'If you fill your address that should be great'
//                                    },
//                                    regexp: {
//                                        regexp: /(\d+) ((\w+)+ )/,
//                                        message: 'The address should be like Ex: "2933 Glen Crow Court"'
//                                    }
                                }
                            },
                            aptNo: {
                                icon: false,
                                validators: {
//
                                    regexp: {
                                        regexp: /^[1-9]\d/,
                                        message: 'integers only'
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

    <script src="{{URL::asset('/js/nav.js')}}"></script>

@endsection