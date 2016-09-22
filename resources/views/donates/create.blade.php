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
                    <div class="donate-method">
                        <label>
                            <input type="radio" name="donate" value="onetime"> One-Time Donation
                        </label>
                    </div>

                    <div class="donate-method">
                        <label>
                            <input type="radio" name="donate" value="monthly" id="monthlyid"> Monthly Donation
                        </label>
                        <div class="description">Your donation will be made today and on the <span id="day"></span>of each following month using the payment method selected. You may cancel or change this amount at any time.</div>
                    </div>

                    <div class="donate-method">
                        <label>
                            <input type="radio" name="donate" value="volunteer"> Volunteer
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <div class="payment">
                    <div class="form-group">
                        <label for="PaymentAmount">Donate Amount</label>
                        <div class="amount-placeholder">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default">$10</button>
                                <button type="button" class="btn btn-default">$15</button>
                                <button type="button" class="btn btn-default">$20</button>
                                <button type="button" class="btn btn-default">$25</button>
                                <button type="button" class="btn btn-default">$30</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" id="other-amt" placeholder="Other Amount">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="NameOnCard">Name on card</label>
                        <input id="NameOnCard" class="form-control" type="text" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="CreditCardNumber">Card number</label>
                        <input id="CreditCardNumber" class="null card-image form-control" type="text">
                    </div>

                    <div class="expiry-date-group form-group">
                        <label for="ExpiryDate">Expiry date</label>
                        <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / YY" maxlength="7">
                    </div>

                    <div class="security-code-group form-group">
                        <label for="SecurityCode">Security code</label>
                        <div class="input-container" >
                            <input id="SecurityCode" class="form-control" type="text" >
                            <!-- <i id="cvc" class="fa fa-question-circle"></i> -->
                        </div>
                    </div>

                    <div class="zip-code-group form-group">
                        <label for="ZIPCode">ZIP/Postal code</label>
                        <div class="input-container">
                            <input id="ZIPCode" class="form-control" type="text" maxlength="10">
                            <!-- <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <p>Review/Summary</p>

                <p>You have decided to donate <span id="amt"></span> for the program....</p>

                <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
                    <span class="submit-button-lock"></span>
                    <span class="align-middle">Donate</span>
                </button>
            </div>
        </div>
    </div>

@endsection