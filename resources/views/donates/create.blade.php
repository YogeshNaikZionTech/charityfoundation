@extends('layouts.main')

@section('title', '| Donate')
@section('stylesheets')
    <link href="{{URL::asset('/css/donateRedraft.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')

    <div class="container" id="content">
        <div class="row">
        
            <div class="col-md-3">
                <!-- <form> -->
                    <div class="contri-method">
                        <p>How would you like to contribute?</p>
                        <div class="donate-method onetime">
                        <label>
                            <input type="radio" name="donate" value="onetime"> One-Time Donation
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
                <!-- </form> -->
            </div>

            <div class="payment">
                
            <form id="paymentform" action="{{url('/recipte')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input id="proevent" class="form-control proevent" type="text"> <!--Event/Project from select page-->
            <input id="dtype" class="form-control" type="text"><!--Donate Type-->
            <div class="col-md-3 col-md-offset-1">
                <div class="payment1">
                    <!-- <form id="payment"> -->
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
                          <input type="text" class="form-control" id="other-amt" placeholder="Other Amount">
                        </div>
                    </div>

                    <div class="form-group" id="cc_number">
                        <label for="CreditCardNumber">Card number</label>
                        <input id="CreditCardNumber" class="null card-image form-control" type="text" required="">
                    </div>

                    <div class="form-group">
                        <label for="NameOnCard">Name on card</label>
                        <input id="NameOnCard" class="form-control" type="text" maxlength="255" required="">
                    </div>

                    <div class="expiry-date-group form-group">
                        <label for="ExpiryDate">Expiry date</label>
                        <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / YY" maxlength="7" required="">
                    </div>

                    <div class="security-code-group form-group">
                        <label for="SecurityCode">Security code</label>
                        <div class="input-container" >
                            <input id="SecurityCode" class="form-control" type="text" required="" >

                        </div>
                    </div>

                    <div class="zip-code-group form-group">
                      <label for="ZIPCode">ZIP/Postal code</label>
                      <div class="input-container">
                        <input id="ZIPCode" class="form-control" type="text" maxlength="10" required="">

                      </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
            <!-- <div class="review"> -->

                <div class="col-md-3 col-md-offset-1">
                    <p>Review/Summary</p>

                    <div id="donatepay">
                    <p>You have decided to donate <span id="amt"></span> dollars for the <span class="title"></span></p>
                    <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                        <span class="submit-button-lock"></span>
                        <span class="align-middle">Donate</span>
                    </button>
                    </div>

<!--                    <div id="vol" class="volform">
                    <p>Thank you for your initiative, We will get back to you</p>
                    <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                        <span class="submit-button-lock"></span>
                        <span class="align-middle">Volunteer</span>
                    </button>
                    </div> -->
                </div>
            <!-- </div> -->


            </form>
            </div>


            <div class="volform">
                
            <form id="volunteerform">
            <input class="form-control proevent" type="text"> <!--Event/Project from select page-->
            <input id="vtype" class="form-control" type="text"> <!--Donate Type-->
            <div class="col-md-3 col-md-offset-1">
                <div class="volform1">
                    <!-- <form id="volunteer"> -->
                        <label>Volunteer Form</label>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" maxlength="255" required="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" required="">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+1 (999) 999 9999"  required="" />
                        </div>

                        <div class="form-group">
                          <label for="comment">Comment</label>
                          <textarea class="form-control" rows="5" id="comment" required=""></textarea>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
<!-- 
            <div class="review"> -->

                <div class="col-md-3 col-md-offset-1">
                    <p>Review/Summary</p>

                    <div id="vol">
                    <p>Thank you for volunteering for <span class="title"></span>, We will get back to you</p>
                    <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                        <span class="submit-button-lock"></span>
                        <span class="align-middle">Volunteer</span>
                    </button>
                    </div>
                </div>

            <!-- </div> -->
            </form>
            </div>


        </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){

    $(".nav li:first").removeClass("active");
    $(".nav li:nth-child(6)").addClass("active");

$(".volform").hide();
$(".payment").hide();
$("#note").hide();

                $(".proevent").attr("style","display:none");
                $("#dtype").attr("style","display:none");
                $("#vtype").attr("style","display:none");


                if(sessionStorage.getItem('project') != null){
                var p = sessionStorage.getItem('project');
                 // $("#proj").html(p.key);
                
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

                $("#note").show(50);
                $(".payment").show(50);
                $(".volform").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="onetime"){
                $("#note").hide();
                $(".payment").show(50);
                $(".volform").hide();
                $('#dtype').val(a);
                
            }
            else if(a==="volunteer"){
                
                $("#note").hide();
                $(".payment").hide();
                $(".volform").show(50);
                $('#vtype').val(a);
                
                

            }
        });



        var damt=0;
        $("#amt").html(damt);
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
    });

</script>

@endsection