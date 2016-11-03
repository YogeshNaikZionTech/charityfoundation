@extends('layouts.main')

@section('title', '| Donate')
@section('stylesheets')
    <link href="{{URL::asset('/css/donate.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
<div class="main container" id="content">

    <div class="row">
        <div class="board col-md-4"> 
            <h4 class="text-center highlight animated fadeInDown"><span class="glyphicon glyphicon-heart-empty"></span> Donation Type</h4>        
            <div class="left">
                <div class="col-md-12">
                    <div class="div4">
                        <div class="div3">
                            <h3 class="animated fadeInUp">How would you like to contribute?</h3>
                        </div>  
                        <div class="div1">
                            <div class="div2">
                                <ul>
                                    <li class="donate-method onetime">
                                        <input type="radio" name="donate" value="onetime" id="onetime">
                                        <label for="onetime">One-Time</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li class="donate-method monthly">
                                        
                                        <input type="radio" name="donate" value="monthly" id="monthly">
                                        <label for="monthly">Monthly Donation</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li class="donate-method volunteer">
                                        
                                        <input type="radio" name="donate" value="volunteer" id="volunteer">
                                        <label for="volunteer">Volunteer</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>
                            </div>
                            <!--<button id="step-1-next" class="btn btn-success nextBtn pull-right">Continue</button> -->
                        </div>
                        <div id="note" style="color: black; display: none">Your donation will be made today and on the <span id="day"></span> of each following month. You may cancel or change this amount at any time.</div>
                    </div>
                    <!-- <div class="note1"><h4><span class="imp"><i class="glyphicon glyphicon-asterisk"></i></span> Founder takes care of all administrative costs</h4></div> -->
                </div><!--End of Donation Type-->
            </div>
        </div>
            <!-- <div role="tabpanel" class="tab-pane fade" id="step-2"> -->
        <div class="board col-md-4">
            <h4 class="text-center animated fadeInDown"><span class="glyphicon glyphicon-list"></span> Details</h4>
            <div class="payment">   
                <form id="paymentform" action="{{url('/payment')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-10 middle">
                        <input id="proevent" class="form-control proevent" type="hidden"> <!--Event/Project from select page-->
                        <input id="dtype" class="form-control" type="hidden" value="onetime"><!--Donate Type-->
                        <input id="type" class="form-control type" type="hidden"><!--Project/Event-->
                        <div class="formdetails">
                            <div class="div6">              
                                <div class="amount-placeholder">
                                    <div class="form-group">
                                    <label for="other-amt">Donate Amount</label>
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
                                    <label for="ZIPCode">ZIP code</label>
                                    <input id="ZIPCode" class="form-control" type="text" maxlength="5" name="ZIPCode" >
                                </div>   
                                <input id="PayButton" class=" hidden" type="submit" >
                            </div>
                        </div> <!--End of payment form details--> 
                    </div>
                </form><!--End of Form-->
                <!--<button id="step-2-next" class="btn btn-success nextBtn formv pull-right">Continue</button> -->
            </div><!--End of Payment-->
            <div class="volform">
                <form id="vform" action="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">  
                    <div class="col-md-10 middle">
                    
                        <input class="form-control proevent" type="hidden"> <!--Event/Project from select page-->
                        <input id="vtype" class="form-control" type="hidden"> <!--Donate Type-->
                        <input id="type" class="form-control type" type="hidden"><!--Project/Event-->
                        <div class="formdetails">
                            <div class="div6">
                                <div class="form-group">
                                    <label>Volunteer Form</label>
                                </div>
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input id="Name" name="Name" class="form-control" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input id="Email" name="Email" class="form-control" type="text" maxlength="255">
                                </div>

                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input id="Phone" name="Phone" class="form-control" type="text" placeholder="(999) 999-9999">
                                </div>

                                <div class="form-group">
                                    <label for="Comments">Comments</label>
                                    <textarea id="Comments" name="Comments" class="form-control" type="text" rows="5"></textarea>
                                </div> 
                                <input id="VolButton" class=" hidden" type="submit">
                            </div>
                        </div> <!--End of payment form details--> 
                    </div>              
                </form><!--End of Form-->   
            </div>
        </div>
            <!-- </div> --><!--End of step-2-->
            <!-- <div role="tabpanel" class="tab-pane fade" id="step-3"> -->
            <div class="board col-md-4">
                <h4 class="text-center animated fadeInDown"><span class="glyphicon glyphicon-ok"></span> Confirmation</h4>
                <div class="right review1 ">
                    <div class="col-md-12 div7">
                        <div id="donatepay">
                            <p>Your Donation: <span id="amt"></span> dollars <br> for <span class="title"></span> from <br> card number: <span id="ccnum"></span> <br> with the name: <span id="ccname"></span><br></p>
                        </div>
                        <label for="PayButton" id="PayBtn" class="formv btn btn-block btn-success submit-button"><span class="submit-button-lock"></span>
                        <span class="align-middle">Donate</span></label>
                    </div>
                </div>
                <div class="right review2 " style="display: none">
                    <div class="col-md-12 div7">
                        <div id="vol">
                            <p>Thank you for volunteering for <span class="title"></span>, We will get back to you</p>
                        </div>
                        <label for="VolButton" id="PayBtn" class="formv btn btn-block btn-success submit-button"><span class="submit-button-lock"></span>
                        <span class="align-middle">Volunteer</span></label>
                    </div>
                </div>
            </div>
                <!-- </div> --><!--End of step-3-->
            <!-- </div> --> <!--End of Tab Content-->
        </div><!--End of Row-->
    </div><!--End of Container-->
@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){

        $(".board").click(function(){
            $(".board").find("h4").removeClass("highlight");
            $(this).find("h4").addClass("highlight");

        });

        var damt=0;
        $("#amt").html(damt);

        $(".volform").hide();
        $(".payment").show();
        $("#note").hide();
        $(".review1").show();
        $(".review2").hide();

        // $(".proevent").attr("style","display:none");
        // $("#dtype").attr("style","display:none");
        // $("#vtype").attr("style","display:none");

        if(sessionStorage.getItem('project') != null){
            var type = "projects";
            var p = sessionStorage.getItem('project');
            $('.proevent').val(p);
            $('.type').val(type);
            $(".title").html(p);
        } 

        else if(sessionStorage.getItem('event') != null){
            var type = "events";
            var e = sessionStorage.getItem('event');
            $(".monthly").attr("style","display:none");
             // $("#proj").html(e.key);
            $('.type').val(type);
            $('.proevent').val(e);
            // $(".title").html(e);

            $.ajax({
                url: '../events/'+e,
                type:'GET',
                datatype:'JSON',
                success: function(response){
                    console.log(response);
                    response = JSON.parse(response);
                    var name = response[0].event_Title;
                    console.log(name);
                    $('.title').html(name);
                    
                }
            });
        }
        else if(sessionStorage.getItem('foundation') != null){
            var type = "foundation";
            var p = sessionStorage.getItem('foundation');
            $(".volunteer").attr("style","display:none");
            // $("#proj").html(e.key);
            $('.type').val(type);
            $('.proevent').val(p);
            $(".title").html(p);
        }

        $('button[name="inputbtn"]').click(function(){

            $('button[name="inputbtn"]').removeClass("active");
            $(this).addClass("active");
        });

        $(".donate-method").click(function(){

            var a=$("input[name=donate]:checked").val();
            var d= new Date();
            d = d.getDate();
            $("#day").html(getGetOrdinal(d));

            function getGetOrdinal(n) {
               var s=["th","st","nd","rd"],
                   v=n%100;
               return n+(s[(v-20)%10]||s[v]||s[0]);
            }

            if(a==="monthly"){
                // $("#onetime").closest('label').removeAttr("style");
                // $("#volunteer").closest('label').removeAttr("style");
                // $("#monthly").closest('label').attr("style","color:#ff944d");
                $("#note").show();
                $(".payment").show();
                $(".review1").show();
                $(".volform").hide();
                $(".review2").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="onetime"){
                // $("#monthly").closest('label').removeAttr("style");
                // $("#volunteer").closest('label').removeAttr("style");
                // $("#onetime").closest('label').attr("style","color:#ff944d");
                $("#note").hide();
                $(".payment").show();
                $(".review1").show();
                $(".volform").hide();
                $(".review2").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="volunteer"){
                // $("#onetime").closest('label').removeAttr("style");
                // $("#monthly").closest('label').removeAttr("style");
                // $("#volunteer").closest('label').attr("style","color:#ff944d");
                $("#note").hide();
                $(".payment").hide();
                $(".review1").hide();
                $(".volform").show();
                $(".review2").show();
                $('#vtype').val(a);
            }
        });
        function calamt(){

            if ($("#other-amt").val() == '') {

                $("#amt").html(" ");
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

        $("#other-amt").on("change",function(){

            calamt();
        });

        $("#other-amt").on("keyup", function(){

            calamt();
        });


        $("button[name=inputbtn]").on("click",function(){

            $("#paymentform").bootstrapValidator('revalidateField', "otheramt");
        });

        $("#CreditCardNumber").on("keyup",function(){

            var cc = $("#CreditCardNumber").val();
            $("#ccnum").html(cc);
        });

        $("#NameOnCard").on("keyup",function(){

            var cname = $("#NameOnCard").val();
            $("#ccname").html(cname);
        });

        $

    }); // End of jQuery 1


    

$(document).ready(function(){
        $('.formv').click(function(){
        $('#paymentform').bootstrapValidator('validate');
        $('#vform').bootstrapValidator('validate');
    });


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

                    callback: {
                        message: 'The expiration date is expired',
                        callback: function(value, validator, $field) {
                            var sections = value.split('/');
                            if (sections.length !== 2) {
                                return {
                                    valid: false,
                                    message: 'The date is not valid'
                                };
                            }

                            var year         = parseInt(sections[0], 10),
                                month        = parseInt(sections[1], 10),
                                currentMonth = new Date().getMonth() + 1,
                                currentYear  = new Date().getFullYear();

                            if (month <= 0 || month > 12 || year > currentYear + 10) {
                                return {
                                    valid: false,
                                    message: 'The date is not valid'
                                };
                            }

                            if (year < currentYear || (year == currentYear && month < currentMonth)) {
                                // The date is expired
                                return {
                                    valid: false,
                                    message: 'The date is expired'
                                };
                            }

                            return true;
                        }
                    }
                } //End of validators
            } //End of expiry    
        } //End of Fields
    }); //End of Validation
}); //End of jQuery 2

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
                        }
                        // regexp: {
                        //     regexp: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        //     message: 'The value is not a valid email address'
                        //}
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
                            message: "How would you like to volunteer?"
                        } // notEmpty
                    } // validators
                } //End of comments
            } //End of Fields
        }); //End of Validation
    });// End of jQuery 3

</script>
   <script>
        $(document).ready(function(){
            var scroll_start = 5;
            var startChange = $('.nav1');
            var offset = startChange.offset();
            $(document).scroll(function() {
                scroll_start = $(this).scrollTop();
                if(scroll_start > offset.top) {
                    $('.nav1').css('background-color', 'rgba(34,34,34,0.9)');
                } else {
                    $('.nav1').css('background-color', 'transparent');
                }
            });
        });
    </script>

@endsection
