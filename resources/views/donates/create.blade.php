@extends('layouts.main')

@section('title', '| Donate')
@section('stylesheets')
    <link href="{{URL::asset('/css/donateRedraft.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
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
            </div>

            <div class="col-md-3 col-md-offset-1">
                <div class="payment">
                    <form>
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
                    </form>
                </div> 

                <div class="volform">
                    <form>
                        <label>Volunteer Form</label>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" maxlength="255" required="">
                        </div>

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input id="Email" class="form-control" type="email" required="">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+1 (999) 999 9999"  required="" />
                        </div>

                        <div class="form-group">
                          <label for="comment">Comment</label>
                          <textarea class="form-control" rows="5" id="comment" required=""></textarea>
                        </div>
                    </form>
                </div>
            </div>







            <div class="review">
                
                <div class="col-md-3 col-md-offset-1">
                    <p>Review/Summary</p>

                    <p id="donatepay">You have decided to donate <span id="amt"></span> dollars for the <span id="proj"></span> : <span id="title"></span></p>
                    <p id="vol">Thank you for your initiative, We will get back to you</p>

                    <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                        <span class="submit-button-lock"></span>
                        <span class="align-middle">Donate</span>
                    </button>   
                </div>
            </div>


        </div>
    </div>


@endsection