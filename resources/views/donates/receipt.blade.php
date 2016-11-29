@extends('layouts.main')

@section('title', '| Receipt')
@section('stylesheets')
<link href="{{URL::asset('/css/receiptStyle.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container page-wrap" id="printableArea">
    <div  class="row">

        @if($receipt_d['type']=='pd')
        <div class="well projects col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Charity Foundation</strong>
                        <p>Address Line 1</p>
                        <p>Address Line 2</p>
                        <abbr title="Phone">P:</abbr> (xxx) xxx-xxxx
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <div>
                        <strong>Billing Details:</strong>
                        <p>Full Name : {{ Auth::user()->firstname }} {{ Auth::user()->lastname}}</p>
                        <p>Account Ending: <b>{{substr($receipt_d['card_num'], 15,16)}}</b></p>
                        <p>Address: {{ Auth::user()->street}} <br>
                            {{ Auth::user()->state}}</p>
                        <p>Zipcode: {{ Auth::user()->zipcode}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h2>Receipt: {{$receipt_d['receipt_num']}}</h2>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <h4>Donation Type</h4>
                        <p>  {{$receipt_d['d_type']}}</p>

                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <h4>Amount</h4>
                        <p>{{$receipt_d['amount']}}</p>

                    </div>
                </div>
                <div class="pull-right">
                    <p>Sub Total:$xx</p>
                    <p>Tax: $xx</p>
                    <h3>Total:$xx.xx</h3>

                </div>
            </div>
            <div>
                <p class="msg">Thank you for the support. An Email Confirmation will be sent to you soon.</p>
            </div>
            <button type="button" onclick="printDiv('printableArea')" class="btn btn-warning btn-lg btn-block">
                Print Receipt   <span class="glyphicon glyphicon-print"></span>
            </button>

        </div>
        @else
        <div class=" col-md-offset-3 col-sm-offset-2 col-xs-offset-1 col-lg-offset-3 well col-md-6  col-lg-6 col-xs-10 col-sm-8 volunteer container">
            <h1>Thank you for your time</h1>
            <label>Event Name: {{$receipt_d['name']}}</label><br/>
            <label>Time : {{$receipt_d['time']}}</label><br/>
            <label>Venue: {{$receipt_d['venu']}}</label><br/>
            <div>
                <p class="msg">Thank you for the support. An Email Confirmation will be sent to you soon.</p>
            </div>
        </div>
    </div>
</div>
    @endif

@endsection

@section('scripts')
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<script src="{{URL::asset('/js/nav.js')}}"></script>
    <Script type="text/javascript">
        $(document).ready(function () {
            $('.projects').show();
            $('.volunteer').show();

        })

    </Script>
@endsection
