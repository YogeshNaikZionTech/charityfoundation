@extends('layouts.main')

@section('title', '| Donate')
@section('stylesheets')
    <link href="{{URL::asset('/css/donateRedraft.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

    <div class="container" id="content">
        <div class="row">
        
                <div class="col-md-3">
                    
                        <div class="contri-method">
                            <p>How would you like to contribute?</p>
                            <div class="donate-method onetime">
                            <label>
                                <input type="radio" name="donate" value="onetime" checked> One-Time Donation
                            </label>
                            </div>

                            <div class="donate-method monthly">
                            <label>
                                <input type="radio" name="donate" value="monthly" id="monthly"> Monthly Donation
                            </label>
                            <div id="note">Your donation will be made today and on the <span id="day"></span> of each following month. You may cancel or change this amount at any time.</div>
                            </div>

                            <div class="donate-method volunteer">
                            <label>
                                <input type="radio" name="donate" value="volunteer"> Volunteer
                            </label>
                            </div>
                        </div>
                </div>

                <div class="payment">
                    
                    <form id="paymentform" action="{{url('/recipte')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="proevent" class="form-control proevent" type="text"> <!--Event/Project from select page-->
                        <input id="dtype" class="form-control" type="text"><!--Donate Type-->
                        <div class="col-md-3 col-md-offset-1">
                            <div class="payment1">
                                <div class="form-group">
                                    <label for="PaymentAmount">Donate Amount</label>
                                        <div class="amount-placeholder">
                                          <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default" name="inputbtn" value="10">$10</button>
                                            <button type="button" class="btn btn-default" name="inputbtn" value="15">$15</button>
                                            <button type="button" class="btn btn-default" name="inputbtn" value="20">$20</button>
                                            <button type="button" class="btn btn-default" name="inputbtn" value="25">$25</button>
                                            <button type="button" class="btn btn-default" name="inputbtn" value="30">$30</button>
                                          </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                   <div class="input-group">
                                      <span class="input-group-addon">$</span>
                                      <input type="text" class="form-control" id="other-amt" name="otheramt" placeholder="Other Amount">
                                    </div>
                                </div>

                                <div class="form-group" id="cc_number">
                                    <label for="CreditCardNumber">Card number</label>
                                    <input id="CreditCardNumber" class="null card-image form-control" type="text" name="CreditCardNumber">
                                </div>

                                <div class="form-group">
                                    <label for="NameOnCard">Name on card</label>
                                    <input id="NameOnCard" class="form-control" type="text" maxlength="255" name="NameOnCard">
                                </div>

                                <div class="expiry-date-group form-group">
                                    <label for="ExpiryDate">Expiry date</label>
                                    <input id="ExpiryDate" class="form-control" type="text" placeholder="YYYY/MM" name="ExpiryDate">
                                </div>

                                <div class="security-code-group form-group">
                                    <label for="SecurityCode">Security code</label>
                                    <input id="SecurityCode" class="form-control" type="text" name="SecurityCode" >
                                </div>

                                <div class="zip-code-group form-group">
                                    <label for="ZIPCode">ZIP/Postal code</label>
                                    <input id="ZIPCode" class="form-control" type="text" maxlength="5" name="ZIPCode" >
                                </div>   
                            </div>
                        </div>
                    

                        <div class="col-md-3 col-md-offset-1">
                            <p>Review/Summary</p>

                            <div id="donatepay">
                                <p>You have decided to donate <span id="amt"></span> dollars for the <span class="title"></span></p>
                                <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                                    <span class="submit-button-lock"></span>
                                    <span class="align-middle">Donate</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            <div class="volform">
                    
                <form id="vform" action="" method="post">
                        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                    <input class="form-control proevent" type="text"> <!--Event/Project from select page-->
                    <input id="vtype" class="form-control" type="text"> <!--Donate Type-->
                    <div class="col-md-3 col-md-offset-1">
                        <label>Volunteer Form</label>
                            <div class="volunteer">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input id="Name" name="Name" class="form-control" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input id="Email" name="Email" class="form-control" type="email" maxlength="255">
                                </div>

                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input id="Phone" name="Phone" class="form-control" type="text" placeholder="(999) 999-9999">
                                </div>

                                <div class="form-group">
                                    <label for="Comments">Comments</label>
                                    <textarea id="Comments" name="Comments" class="form-control" type="text" rows="5"></textarea>
                                 </div>
                           </div>
                    </div>
                 
                    <div class="col-md-3 col-md-offset-1">
                        <p>Review/Summary</p>

                        <div id="vol">
                        <p>Thank you for volunteering for <span class="title"></span>, We will get back to you</p>
                        <button id="VolButton" name="submit2" class="btn btn-block btn-success submit-button" type="submit">
                            <span class="submit-button-lock"></span>
                            <span class="align-middle">Volunteer</span>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){

                    var damt=0;
                    $("#amt").html(damt);

                    $(".volform").hide();
                    $(".payment").show();
                    $("#note").hide();

                    $(".proevent").attr("style","display:none");
                    $("#dtype").attr("style","display:none");
                    $("#vtype").attr("style","display:none");


                    if(sessionStorage.getItem('project') != null){

                        var p = sessionStorage.getItem('project');
                         $('.proevent').val(p);
                         $(".title").html(p);
                    } 

                    else if(sessionStorage.getItem('event') != "null"){

                        var e = sessionStorage.getItem('event');
                        $(".monthly").attr("style","display:none")
                         // $("#proj").html(e.key);
                         $('.proevent').val(e);
                         $(".title").html(e);
                    }


                    // if (Session::has('project')) {
                    //  p = Session::get('project');
                    //  $("#title").html(p);
                    // }
                    // else if(Session::has('event')){
                    //   e = Session::get('event');
                    // $(".monthly").attr("style","display:none")
                    //  // $("#proj").html(e.key);
                    //  $("#title").html(e);
                    // }

                    $('button[name="inputbtn"]').click(function(){

                        $('button[name="inputbtn"]').removeClass("active");
                        $(this).addClass("active");

                    });


                    $(".donate-method").click(function(){

                        var a=$("input[name=donate]:checked").val();
                        var d= new Date();

                        $("#day").html(d.getDate()+"th");



                        if(a==="monthly"){

                            $("#note").show();
                            $(".payment").show();
                            $(".volform").hide();
                            $('#dtype').val(a);
                            
                        }
                        else if(a==="onetime"){

                            $("#note").hide();
                            $(".payment").show();
                            $(".volform").hide();
                            $('#dtype').val(a);
                            
                        }
                        else if(a==="volunteer"){
                            
                            $("#note").hide();
                            $(".payment").hide();
                            $(".volform").show();
                            $('#vtype').val(a);
                            
                            

                        }
                    });

                    function calamt(){

                        if ($("#other-amt").val() == '') {

                            $("button[name=inputbtn]").click(function(e){
                            damt = e.target.value;
                            $("#other-amt").val(damt);
                            $("#amt").html(damt);

                            });
                        }

                        else{

                            damt = $("#other-amt").val();
                            $("#amt").html(damt);
                            $('button[name="inputbtn"]').removeClass("active");



                        }

                    };

                    calamt();

                    $("#other-amt").change(function(){

                        calamt();

                    });

                    $("#other-amt").on("keyup", function(){

                        calamt();
                    });

                    $("#other-amt").on("keydown", function(){

                        calamt();
                    });

    }); //jQuery END --- 1

$(document).ready(function(){


    $('#paymentform').bootstrapValidator({ 

        feedbackIcons:{

              valid:'glyphicon glyphicon-ok',
              invalid:'glyphicon glyphicon-remove',
              validating:'glyphicon glyphicon-refresh'
        },

        fields:{

            CreditCardNumber: {
                    validators: {
                        notEmpty:{
                            message:"Enter Your 16 Digit Card Number"
                        },

                        creditCard:{
                                message: 'The credit card number is not valid'
                        }
                    }
                },
                                
            SecurityCode: {
                validators: {
                    notEmpty:{
                        message:"Enter Your CVV"
                        },

                    cvv:{
                        creditCardField: 'CreditCardNumber',
                        message: 'The CVV number is not valid'
                    }
                }
            },
         
            ZIPCode: {
                validators: {
                    notEmpty:{
                        message: 'Enter your ZIP code'
                    },
                    regexp: {
                        regexp: /^\d{5}$/,
                        message: 'Zipcode must contain 5 digits'
                    }
                }
            }, //ZIPCode end

            NameOnCard:{
                validators:{
                    notEmpty:{
                        message: 'Enter the name on your card'
                    },
                    regexp:{
                        regexp:/^[A-Za-z\s]+$/,
                        message: 'Name can have only alphabets'
                    }
                }
            }, //NameOnCard

            otheramt:{
                validators:{
                    notEmpty:{
                        message: 'Enter the donation amount'
                    },
                    regexp:{
                        regexp:/^([1-9][0-9]{0,2}|1000)$/
                    }
                }
                
            },

            ExpiryDate:{

                verbose:false,

                validators:{
                    notEmpty:{
                        message:"Expiry date is required"
                    },

                    regexp: {
                            message: 'The expiration date must be YYYY/MM',
                            regexp: /^\d{4}\/\d{1,2}$/
                    },

                    callback:{
                        message: 'The expiration date is expired',
                        callback: function(value, validator, $field) {
                            var sections = value.split('/');
                            if (sections.length !== 2) {
                                return {
                                    valid: false,
                                    message: 'The expiration date is not valid'
                                };
                            }
                        
                            var year         = parseInt(sections[0], 10),
                                month        = parseInt(sections[1], 10),
                                currentMonth = new Date().getMonth() + 1,
                                currentYear  = new Date().getFullYear();

                            if (month <= 0 || month > 12 || year > currentYear + 10) {
                                return {
                                    valid: false,
                                    message: 'The expiration date is not valid'
                                };
                            }
                        }
                    }
                }

            } //End of expiry
            
        } //End of Fields

    }); //End of Validation

});

    $(document).ready(function(){
        $('#vform').bootstrapValidator({ 

            feedbackIcons:{

                  valid:'glyphicon glyphicon-ok',
                  invalid:'glyphicon glyphicon-remove',
                  validating:'glyphicon glyphicon-refresh'
            },

            fields:{

                Name: {
                        validators: {
                            notEmpty:{
                                message:"Your name is required"
                                },
                            regexp: {
                                regexp: /^[A-Za-z\s.'-]+$/,
                                message: "Alphabetical characters, hyphens and spaces"
                            }
                        }
                    },
                                    
                    Email: {
                        validators: {
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },

                            notEmpty:{
                                message:'Email ID is required'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
             
                    Phone: {
                        validators: {
                            notEmpty:{
                                message: 'Phone number is required'
                            },
                            regexp: {
                                regexp: /^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/,
                                message: '(Area Code) 123-4567'
                            }
                        }
                    }, //Phone end

                    Comments: {
                        validators: {
                            notEmpty: {
                                message: "Are you sure? No comment?"
                            } // notEmpty
                        } // validators
                    } 
            } //End of Fields
        }); //End of Validation
    });

</script>

@endsection
