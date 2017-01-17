    @extends('layouts.main')

@section('title', '| History')
@section('stylesheets')
    <link href="{{URL::asset('/css/history.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container">
    <h1 class="page-header" style="color: #d9534f;">History</h1>
    <div class="history_data">
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
                var output = "<h3>Project Donations</h3><table class='display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline' align='center'><thead class='thead-inverse' id='tablehead'><tr><th>#</th><th>Project/Event Name</th><th>Donation Type</th><th>Date of Donation</th><th>Donation Amount</th><th>Receipt No</th><th>Payment Subscription</th></tr></thead><tbody class='hdata'>";                   
                response = JSON.parse(response);
                $.each(response, function (index,val) {
                    count = index+1;
                    var hdate = val.dod;
                    hdate = hdate.split(" ");
                    output +="<tr><th scope='row' class='txtalign'>"+count+"</th><td>"+val.project+"</td><td>"+val.donation_type+"</td><td>"+hdate[0]+"</td><td>$"+val.amount+"</td><td>"+val.receipt_id+"</td>"+((val.donation_type === 'monthly')?'<td><button class="unsubscribe">unsubscribe</button></td>':'<td>N/A</td>');+"</tr>"
                });
                output +="</tbody></table>";
                count = response.length;
                $(".history_data").append(output);
                callaafh();
                
            }
        });
        function callvolh(){
            $.ajax({
                url: '/history/voulnteer/user',
                type:'GET',
                datatype:'JSON',
                success: function(response){

                var output = "<h3>Events Volunteered</h3><table class='display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline' align='center'><thead class='thead-inverse' id='tablehead'><tr><th>#</th><th>Project/Event Name</th><th>Donation Type</th><th>Date of Donation</th><th>Donation Amount</th><th>Receipt No</th></tr></thead><tbody class='hdata'>";                    
                    response = JSON.parse(response);
                    console.log(response);
                    $.each(response, function (index,val) {
                        output +=  "<tr><th scope='row' class='txtalign'>"+(count+1)+"</th><td>"+val.event_name+"</td><td>volunteer</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>"
                        count = count + 1;
                    });
                    output +="</tbody></table>";
                $(".history_data").append(output);                    

                }
            });
        }
        
        function callaafh(){
            $.ajax({
                url: '/history/aaf/user',
                type:'GET',
                datatype:'JSON',
                success: function(response){
                var output = "<h3>Donations to AAF</h3><table class='display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline' align='center'><thead class='thead-inverse' id='tablehead'><tr><th>#</th><th>Project/Event Name</th><th>Donation Type</th><th>Date of Donation</th><th>Donation Amount</th><th>Receipt No</th><th>Payment Subscription</th></tr></thead><tbody class='hdata'>";                      
                    response = JSON.parse(response);
                    $.each(response, function (index,val) {
                        var hdate = val.dod;
                        hdate = hdate.split(" ");
                        output +=  "<tr><th scope='row' class='txtalign'>"+(count+1)+"</th><td>"+val.donation+"</td><td>"+val.type+"</td><td>"+hdate[0]+"</td><td>$"+val.amount+"</td><td>"+val.receipt_num+"</td>"+((val.type === 'monthly')?'<td><button class="unsubscribe">unsubscribe</button></td>':'<td>N/A</td>');+"</tr>"
                        count = count + 1;
                    });
                    output +="</tbody></table>";
                    $(".history_data").append(output);
                    callvolh();                
                }
            });
        }
    });
</script>
@endsection