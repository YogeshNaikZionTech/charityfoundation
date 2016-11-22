@extends('layouts.main')

@section('title', '| Donate')
@section('stylesheets')
    <link href="{{URL::asset('/css/donate.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
<div class="main container-fluid" id="content">

    <div class="row">
        <div class="board col-md-4 col-lg-4 col-sm-12 col-xs-12"> 
            <h4 class="text-center highlight animated fadeInDown"><span class="glyphicon glyphicon-heart-empty"></span> Donation Type</h4>        
            <div class="left">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="div4">
                        <div class="div3">
                            <h3 class="animated fadeInUp">How would you like to contribute?</h3>
                        </div>  
                        <div class="div1">
                            <div class="div2">
                                <ul>
                                    <li class="donate-method onetime" style="display: none;">
                                        <input type="radio" name="donate" value="onetime" id="onetime" checked>
                                        <label for="onetime">One-Time</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li class="donate-method monthly" style="display: none;">
                                        
                                        <input type="radio" name="donate" value="monthly" id="monthly">
                                        <label for="monthly">Monthly Donation</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                    <li class="donate-method volunteer" style="display: none;">
                        
                                        <input type="radio" name="donate" value="volunteer" id="volunteer">
                                        <label for="volunteer">Volunteer</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="note" class= "animated pulse" style="color: black; display: none;font-size: medium">Your donation will be made today and on the <span id="day"></span> of each following month. You may cancel or change this amount at any time.</div>
                    </div>
                </div><!--End of Donation Content-->
            </div><!--End of Donation-->
        </div>
        <div class="board col-md-4 col-lg-4 col-sm-6 col-xs-12"> <!--Payment/Volunteeer Details-->
            <h4 class="text-center animated fadeInDown"><span class="glyphicon glyphicon-list"></span> Details</h4>
            <div class="payment">   
                <form id="paymentform" action="{{url('/donates')}}" method="post" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 middle"><!--Payment-->
                        <input id="proevent" name="proevent" class="form-control proevent" type="hidden" > <!--Event/Project from select page-->
                        <input id="dtype" name="dtype" class="form-control" type="hidden" value="onetime" ><!--Donate Type-->
                        <input id="type" name="type" class="form-control type" type="hidden" ><!--Project/Event-->

                        <div class="formdetails">
                            <div class="div6">

                                <div class="amount-placeholder">
                                    <div class="form-group">
                                    <label for="other-amt">Donate Amount</label>
                                      <div class="btn-group btnwidth" role="group">
                                        <button type="button" class="btn btn-default" name="inputbtn" value="10">$10</button>
                                        <button type="button" class="btn btn-default" name="inputbtn" value="20">$20</button>
                                        <button type="button" class="btn btn-default" name="inputbtn" value="25">$25</button>
                                        <button type="button" class="btn btn-default" name="inputbtn" value="30">$30</button>
                                        <!-- <button type="button" class="btn btn-default hidden-md" name="inputbtn" value="40">$40</button> -->
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
                                    <input id="ExpiryDate" class="form-control" type="text" placeholder="MM/YY" name="ExpiryDate">
                                </div>

                                <div class="security-code-group form-group">
                                    <label for="SecurityCode">CVV</label>
                                    <input id="SecurityCode" class="form-control" type="text" name="SecurityCode">
                                </div>

                                <div class="zip-code-group form-group">
                                    <label for="ZIPCode">ZIP code</label>
                                    <input id="ZIPCode" class="form-control" type="text" maxlength="5" name="ZIPCode">
                                </div>        
                                <input id="PayButton" class="hidden" type="submit">
                            </div>
                        </div> 
                    </div><!--End of Payment Details--> 
                </form>
            </div><!--End of Payment-->
            <div class="volform" style="display: none"> <!--Volunteer Form-->
                <form id="vform" action="{{url('/volunteer')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">  
                    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 middle">
                    
                        <input class="form-control proevent" name="proevent" type="hidden" > <!--Event/Project from select page-->
                        <input id="vtype" class="form-control" name="vtype" type="hidden" > <!--Donate Type-->
                        <input id="type" class="form-control type" name="type" type="hidden" ><!--Project/Event-->
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
                                    <input id="Email" name="Email" class="form-control" type="text" maxlength="255" placeholder="example@domain.com">
                                </div>

                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input id="Phone" name="Phone" class="form-control" type="text" placeholder="(999) 999-9999">
                                </div>

                                <div class="form-group">
                                    <label for="Comments">Comments</label>
                                    <textarea id="Comments" name="Comments" class="form-control" type="text" rows="5"></textarea>
                                </div> 
                                <input id="volButton" class="hidden" type="submit">
                            </div>
                        </div> 
                    </div>              
                </form>   
            </div><!--End of Volunteer-->             
        </div><!--End of Details-->

        <div class="board col-md-4 col-lg-4 col-sm-6 col-xs-12">
            <h4 class="text-center animated fadeInDown"><span class="glyphicon glyphicon-ok"></span> Confirmation</h4>
            <div class="right review1 ">
                <div class="col-md-12  col-lg-12 col-sm-12 col-xs-12 div7">
                    <div id="donatepay">
                        <h4>Selected Cause:</h4>
                        <div class="cause col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3 reset">
                                <img class="image">
                            </div>

                            <div class="col-md-9 col-sm-9 col-xs-9 reset">
                                <h4 class="title"></h4>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-bottom: 5%">    
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset sum1">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 reset reset2 ">
                                    <span class="glyphicon glyphicon-star glyclr"></span> Your Donation </div>
                                <div class="reset dollar pull-right">$<span id="amt"></span></div>         
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset sum2">
                                <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 reset reset2">
                                    <span class="glyphicon glyphicon-credit-card glyclr"></span> Card ending in</div>
                                 <span id="ccnum" class=" reset  pull-right"></span> 
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset sum3">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 reset reset2">
                                    <span class="glyphicon glyphicon-user glyclr"></span> Name
                                </div>
                                <span id="ccname" class=" reset  pull-right"></span> 
                            </div>
                        </div>
                    </div>

                    <label for="PayButton" id="PayBtn" class="formv btn btn-block btn-success submit-button"><span class="submit-button-lock"></span>
                    <span class="align-middle">DONATE</span></label>
                </div>
                <!--<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 appre">
                    <p>Thank You!!!</p>   
                </div> -->
            </div>
            <div class="right review2 " style="display: none">
                <div class="col-md-12 col-lg-12 col-xs-12 div7">
                    <div id="vol">
                        <h4>Selected Cause:</h4>
                        <div class="cause col-md-12 col-lg-12 col-xs-12">
                            <div class="col-md-3 col-lg-3 col-xs-3 reset">
                                <img class="image">
                            </div>

                            <div class="col-md-9 col-lg-9 col-xs-9 reset">
                                <h4 class="title"></h4>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset volnotvalidname">
                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 reset reset2">
                                <span class="glyphicon glyphicon-user glyclr"></span> Name
                            </div>
                            <span id="volname" class="col-lg-6 col-md-6 col-xs-6 col-sm-6"></span>
                        </div>


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset volnotvalidemail">
                                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 reset reset2">
                                    <span class="glyphicon glyphicon-user glyclr"></span> Email
                                </div>
                                <span id="volemail" class="col-lg-6 col-md-6 col-xs-6 col-sm-6 "></span>

                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 reset volnotvalidphone">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 reset reset2">
                                    <span class="glyphicon glyphicon-user glyclr"></span> Phone number
                                </div>
                                <span id="volphone" class="col-lg-6 col-md-6 col-xs-6 col-sm-6"></span>

                            </div>
                        </div>
                    <a  href="{{url('receipt')}}"><label for="volButton" id="volBtn" class="formv btn btn-block btn-success submit-button" type="submit">
                        <span class="submit-button-lock"></span>
                         <span class="align-middle">VOLUNTEER</span> </label></a>
                </div>
            </div>
        </div>
    </div>
    </div><!--End of Row-->
    </div><!--End of Container-->
@endsection

@section('scripts')

    <script src="{{URL::asset('/js/nav.js')}}"></script>
        <script type="text/javascript">

        $(document).ready(function(){

        $(".board").click(function(){
            $(".board").find("h4:first").removeClass("highlight");
            $(this).find("h4:first").addClass("highlight");
        });

        //Input Masks

        $('#CreditCardNumber').inputmask("9999-9999-9999-9999");
        $('#ExpiryDate').inputmask("99/99");
        $('#Phone').inputmask("(999) 999-9999");


        var damt=0;
        $("#amt").html(damt);

        $(".volform").hide();
        $(".payment").show();
        $("#note").hide();
        $(".review1").show();
        $(".review2").hide();



        if(sessionStorage.getItem('project') != null){
            var type = "projects";
            var p = sessionStorage.getItem('project');
            $('.proevent').val(p);
            $('.type').val(type);
            $(".onetime").show();
            $(".monthly").show();
            $.ajax({
                url: '../projects/'+p,
                type:'GET',
                datatype:'JSON',
                success: function(response){
                    
                    response = JSON.parse(response);
                    var name = response.project_Title;
                    
                    $('.title').html(name);
                    $(".image").attr("src",'../images/'+response.project_Image);
                }
            });
        } 

        else if(sessionStorage.getItem('event') != null){
            var type = "events";
            var e = sessionStorage.getItem('event');
            $(".volunteer").show();

            $('.volunteer input[type=radio]').attr('checked','checked');
            donatecheck();
            $('.type').val(type);
            $('.proevent').val(e);
            if(sessionStorage.getItem('volunteer')=== "true"){
                $('.volunteer input[type=radio]').attr('checked','checked');
                donatecheck();
            }

            $.ajax({
                url: '../events/'+e,
                type:'GET',
                datatype:'JSON',
                success: function(response){                   
                    response = JSON.parse(response);
                    var name = response[0].event_Title;                    
                    $('.title').html(name);                    
                    $(".image").attr("src",'../images/'+response[0].event_Image);                    
                }
            });
        }
        else if(sessionStorage.getItem('foundation') != null){
            var type = "foundation";
            var p = sessionStorage.getItem('foundation');
            $(".onetime").show();
            $(".monthly").show();
            $('.type').val(type);
            $('.proevent').val(p);
            $(".title").html(p);
        }

        calamt();

        //EventListeners

        $('button[name="inputbtn"]').click(function(){

            $('button[name="inputbtn"]').removeClass("active");
            $(this).addClass("active");
        });

        $(".donate-method").click(function(){

            donatecheck();
        });

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

            cccheck();
        });

        $("#ExpiryDate").on("keyup",function(){

            $("#paymentform").bootstrapValidator('revalidateField', "ExpiryDate");
        });

        $("#CreditCardNumber").on("blur",function(){
            cccheck();
        });

        $("#NameOnCard").on("blur",function(){
            namecheck();

        });

        //Function for Volunteer
        $("#Name").on('blur', function () {
            $(".volnotvalidname").hide();
            volunteername();
        });
            $("#Email").on('blur', function () {
                $(".volnotvalidemail").hide();
                volunteeremail();
            });
            $("#Phone").on('blur', function () {
                $(".volnotvalidphone").hide();
                volunteerphone();
            });


        function volunteername(){
         var name = $("#Name").val();
            if($("#vform").data("bootstrapValidator").isValidField('Name')){

                $("#volname").html(name);
                $(".volnotvalidname").show();
            }
            else{
                $("#volname").html(" ");
                $(".volnotvalidname").hide();
                // $("#ccname").css("border-bottom","2px solid #FFFFFF");
            }
        }
            function volunteeremail(){
                var email = $("#Email").val();
                if($("#vform").data("bootstrapValidator").isValidField('Email')){

                    $("#volemail").html(email);
                    $(".volnotvalidemail").show();
                }
                else{
                    $("#volemail").html(" ");
                    $(".volnotvalidemail").hide();
                    // $("#ccname").css("border-bottom","2px solid #FFFFFF");
                }
            }
            function volunteerphone(){
                var phone = $("#Phone").val();
                if($("#vform").data("bootstrapValidator").isValidField('Phone')){

                    $("#volphone").html(phone);
                    $(".volnotvalidphone").show();
                }
                else{
                    $("#volphone").html(" ");
                    $(".volnotvalidphone").hide();
                    // $("#ccname").css("border-bottom","2px solid #FFFFFF");
                }
            }


//Volunteer ending
        //Functions

        function namecheck(){
            var cname = $("#NameOnCard").val();

            if($("#paymentform").data("bootstrapValidator").isValidField("NameOnCard")){
                $("#ccname").html(cname);
                $(".sum3").fadeIn(); 
            }

            else{
                $("#ccname").html(" ");
                $(".sum3").fadeOut();
            }
        }

        function cccheck(){
            $("#paymentform").bootstrapValidator('revalidateField', "CreditCardNumber");
            var cc = $("#CreditCardNumber").val();

            if($("#paymentform").data("bootstrapValidator").isValidField("CreditCardNumber")){
                cc = cc.slice(-4);
                $("#ccnum").html(cc);
                $(".sum2").fadeIn();
            }

            else{
                $("#ccnum").html(" ");
                $(".sum2").fadeOut();
            }
        }

        function donatecheck(){

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
                $("#note").show();
                $(".payment").show();
                $(".review1").show();
                $(".volform").hide();
                $(".review2").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="onetime"){

                $("#note").hide();
                $(".payment").show();
                $(".review1").show();
                $(".volform").hide();
                $(".review2").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="volunteer"){

                $("#note").hide();
                $(".payment").hide();
                $(".review1").hide();
                $(".volform").show();
                $(".review2").show();
                $('#vtype').val(a);
            }
        }

        function calamt(){

            if ($("#other-amt").val() == '') {

                $(".sum1").fadeOut();
                $("#amt").html(" ");

                $("button[name=inputbtn]").click(function(e){
                    damt = e.target.value;
                    $("#other-amt").val(damt);
                    $("#paymentform").bootstrapValidator('revalidateField', "otheramt");
                    if($("#paymentform").data("bootstrapValidator").isValidField("otheramt")){
                        $("#amt").html(damt);
                        $(".sum1").fadeIn();
                    }
                });
            }

            else{
                $("#paymentform").bootstrapValidator('revalidateField', "otheramt");

                if($("#paymentform").data("bootstrapValidator").isValidField("otheramt")){
                    damt = $("#other-amt").val();
                    $("#amt").html(damt);
                    $(".sum1").fadeIn();
                    $('button[name="inputbtn"]').removeClass("active");
                }
            }
        };
    }); // End of jQuery 1

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
                            message: 'The expiration date must be MM/YY',
                            regexp: /^(0[1-9]|1[0-2])\/[0-9]{2}$/
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
                            var year         = parseInt(sections[1], 10),
                                month        = parseInt(sections[0], 10),
                                currentMonth = new Date().getMonth() + 1,
                                currentYear  = new Date().getFullYear();
                                year = year + 2000;
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


@endsection
