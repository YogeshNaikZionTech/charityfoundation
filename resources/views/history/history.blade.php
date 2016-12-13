    @extends('layouts.main')

@section('title', '| History')
@section('stylesheets')
    <link href="{{URL::asset('/css/history.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container">
    @if(\Session::has('unsub_Success'))
        <div class="alert alert-success" role="alert">
            <strong>Hey {{Auth::user()->lastname}}, We have unscubscribed from the monthly payments {{\Session::get('unsub_Success')}}</strong>
        </div>
    @endif
    <h1 class="page-header" style="color: #d9534f;">History</h1>
    <div>
        <table class="display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline" align="center">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Project/Event Name</th>
                    <th>Donation Type</th>
                    <th>Date of Donation</th>
                    <th>Donation Amount</th>
                    <th>Receipt No</th>
                    <th>Payment Mode</th>
                </tr>
            </thead>
            <tbody class="hdata">
            </tbody>
        </table>
    </div>  
</div>


    
@endsection

@section('scripts')
<script src="{{URL::asset('/js/nav.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        var count=0;

        $.ajax({
            url: ' /history/project/user',
            type:'GET',
            datatype:'JSON',
            success: function(response){
            $(".hdata").empty();
            var output = " ";                   
                response = JSON.parse(response);
                $(".hdata").empty();
                console.log(response);
                $.each(response, function (index,val) {
                    count = index+1;
                    var hdate = val.dod;
                    hdate = hdate.split(" ");

                    output +=  "<tr><th scope='row'>"+count+"</th><td>"+val.project+"</td><td>"+val.donation_type+"</td><td>"+hdate[0]+"</td><td>$"+val.amount+"</td><td>"+val.receipt_id+"</td><td>"+val.type+"</td></tr>"
                });
                count = response.length;
                $(".hdata").append(output);
                callvolh();
            }
        });
        function callvolh(){
            $.ajax({
                url: '/history/voulnteer/user',
                type:'GET',
                datatype:'JSON',
                success: function(response){
                // $(".hdata").empty();
                console.log(response);
                var output = " ";                   
                    response = JSON.parse(response);
                    console.log(response);
                    $.each(response, function (index,val) {
                        output +=  "<tr><th scope='row'>"+(count+1)+"</th><td>"+val.event_name+"</td><td>volunteer</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>"
                        count = count + 1;
                    });
                    $(".hdata").append(output);
                    callaafh();
                }
            });
        }
        
        function callaafh(){
            $.ajax({
                url: '/history/aaf/user',
                type:'GET',
                datatype:'JSON',
                success: function(response){
                // $(".hdata").empty();
                var output = " ";                   
                    response = JSON.parse(response);
                    console.log(response);
                    $.each(response, function (index,val) {
                        var hdate = val.dod;
                        hdate = hdate.split(" ");
                        output +=  "<tr><th scope='row'>"+(count+1)+"</th><td>"+val.donation+"</td><td>"+val.type+"</td><td>"+hdate[0]+"</td><td>$"+val.amount+"</td><td>"+val.receipt_num+"</td><td>"+val.dtype+"</td></tr>"
                        count = count + 1;
                    });
                    $(".hdata").append(output);
                }
            });
        }
    });
</script>
@endsection