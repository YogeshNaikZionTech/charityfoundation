@extends('layouts.main')

@section('title', '| Admin Panel')
@section('stylesheets')
    <link href="{{URL::asset('/css/adminPanel.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div id="content">
        @if(Session::has('ProjectCreated'))
            <div class="alert alert-success" role="alert">
                <strong>{{\Session::get('ProjectCreated')}}</strong>
            </div>
        @endif
        <div class="header">
            <div class="logo">
                <i class="fa fa-tachometer"></i>
                <span>Admin Panel</span>
            </div>
        </div>
        <div class="flexbox">
            <div class="side-nav col">
                <div class="logo">
                    <i class="fa fa-tachometer"></i>
                    <span>Admin Panel</span>
                </div>
                <nav>
                    <ul class="admin-menu">
                        <li class="active" ONCLICK="FocusOnInput()" id="dsearchitem">
                            <a href="#" data-target-id="history">
                                <span><i class="fa fa-table"></i></span>
                                <span>Donations</span>
                            </a>
                        </li>
                        <li ONCLICK="FocusOnInput()" id="searchitem">
                            <a href="" data-target-id="users">

                                <span><i class="fa fa-search"></i></span>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="" data-target-id="create">
                                <span><i class="fa fa-plus-circle"></i></span>
                                <span>Create</span>
                            </a>
                        </li>
                        <li id="modifyitem">
                            <a href="" data-target-id="update">
                                <span><i class="fa fa-pencil-square-o"></i></span>
                                <span>Modify</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="main-content col">
                {{--History content starts here--}}
                <div class="admin-content" id="history">
                    <h3>Donation History<a class="btn btn-warning btn-md export">Export All</a></h3>
                    <div class="col-xs-6" >
                        <div class="wrapper">
                            <form name="donate_search_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input class="input" name="input" id= "dinput" placeholder="Search Here" autofocus type="text" style="border: none; box-shadow: none; height: 28px;">
                                <span class="underline"></span>
                            </form>
                        </div>
                    </div>
                    <br/>
                    <table id="dtable" class="display table table-striped table-hover table-bordered table-info table-responsive text-primary bg-danger d-inline"  id="historytable" align="center">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Donation Type</th>
                            <th>Project/Event Name</th>
                            <th>Date of Donation</th>
                            <th>Donation Amount</th>
                        </tr>
                        </thead>
                        <tbody class="doutput"></tbody>
                    </table>

                </div>
                {{--History content ends here--}}
                {{--Users content starts here--}}
                <div class="admin-content" id="users">
                    <h3>Users<a class="btn btn-warning btn-md export" href="/admin/export/users" >Export All</a></h3>
                    <div class="col-xs-6" >
                        <div class="wrapper">
                            <form name="search_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input class="input" name="input" id= "input" placeholder="Search Here" autofocus type="text" style="border: none; box-shadow: none; height: 28px;">
                                <span class="underline"></span>
                            </form>
                        </div>
                    </div>
                    <br/>

                    <table id="example" class="display table table-striped table-bordered table-hover table-success text-primary bg-info d-inline" align="center">
                        <thead class="thead-inverse">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>User Since</th>
                            <th>Amount Received</th>
                        </tr>
                        </thead>

                        <tbody class="output">

                        </tbody>

                    </table>
                </div>
                {{--Users content starts here--}}
                {{--Create project or event starts here--}}
                <div class="admin-content" id="create">
                    <h3>Create Projects/Events</h3>
                    <div class="container">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tab-list">
                            <li class="active">
                                <a href="#proj" role="tab" data-toggle="tab">
                                    <icon class="fa fa-plus-circle"></icon> Create Project
                                </a>
                            </li>
                            <li><a href="#eve" role="tab" data-toggle="tab">
                                    <i class="fa fa-plus-circle"></i> Create Event
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="proj">
                                <h3>New Project Creation</h3>
                                <form name="create" id="createproject" class=" col-md-6" action="{{url('/projects')}}" method="post">
                                    <div class="form-group">
                                        <label for="pname" class="control-label"  >Project Name :</label>
                                        <input id="pname" name="pname" type="text" class="form-control" style="height:28px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="plocation" class="control-label">Venue :</label>
                                        <input id="plocation" type="text"  name="plocation" class="form-control" style="height:28px;" />
                                    </div>

                                    <div class="form-group">
                                        <label for="pdate"  class="control-label">Date :</label>
                                        <div class="input-group date" id="datetimepicker5">
                                            <input  id="pdate" type="text" name="pdate"  class="form-control" style="height:28px;">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>


                                            <input class="form-control" id="pstime" name="pstime"   type="hidden"  style="height:28px;" value="00:00:00" />

                                    <div class="form-group">
                                        <label for="pdescription" class="control-label">Project Description :</label>
                                            <textarea name="pdescription" id="pdescription" placeholder="Description of the project" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="pimage" class="control-label">Upload an image :</label>
                                        <input id="pimage" type="file" name="pimage" accept="image/*">
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-success" onclick="submitForm()">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="eve">
                                <h3>New Event Creation</h3>

                                <form name="create" class="col-md-6" id="createvent" action="{{url('/events')}}" method="post">
                                    <div class="form-group">
                                        <label  for="ename" class="control-label">Event Name :</label>
                                        <input id="ename" type="text"  name="ename" class="form-control" style="height:28px;" />
                                    </div>
                                    <div class="form-group">
                                        <label for="Location" class="control-label">Venue :</label>
                                        <input id="location" type="text"  name="location" class="form-control" style="height:28px;" />
                                    </div>
                                    <div class="form-group">
                                        <label for="dateeve"  class="control-label">Date :</label>
                                        <div class="input-group date" id="datetimepicker1">   
                                            <input  id="dateeve" type="text" name="edate"  class="form-control" style="height:28px;">
                                            <span class="input-group-addon" style="height:28px;">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stime" class="control-label">Start Time :</label>
                                        <div id="starttime" class="input-group date" >
                                            <input class="form-control" id="stime" name="stime" type="text"  style="height:28px;"/>
                                            <span class="input-group-addon" style="height:28px;">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="etime" class="control-label">End Time :</label>
                                        <div id="endtime" class="input-group date" >
                                            <input class="form-control" id="etime" name="etime" type="text" style="height:28px;" />
                                            <span class="input-group-addon" style="height:28px;">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="control-label" >Event Description :</label>
                                        <textarea id="edescription" name="edescription" placeholder="Description of the event" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Upload an image:</label>
                                        <input type="file" name="pic" accept="image/*">
                                    </div>
                                    <div>

                                        <input type="submit" class="btn btn-success" onclick="submitForm()">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                {{--Modify--}} <!--Modify Projects/ Events-->

                <div class="admin-content" id="update">
                    <h3>Update Projects/Events</h3>

                    <div>
                        <label class="radiosel">
                            <input type="radio" name="program" id="radiosel1" value="projects" checked> Projects
                            <input type="radio" name="program" id="radiosel2" value="events"> Events
                        </label>
                    </div>
                    <!--  Form to Modify an Project -->
                    <div class="project program">
                        <form class="form-group col-md-6" action="{{url('/putprojects')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <fieldset id="Group2" name="Group2">
                                    <select id="Select1" name="Select1" class="form-control">
                                    </select>
                                </fieldset>
                            </div>
                            <input type="hidden" id="project_id" name="id">

                            <div class="form-group">
                                <input class="form-control" id="updatepname" name="pname" placeholder="Project Name" style="height:28px;" type="text">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="proj_description" name="pdescription" placeholder="Project Description" type="text" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="pstatus">
                                    <option>Project Status</option>
                                    <option value="Current">Current</option>
                                    <option value="future">Future</option>
                                    <option value="completed">Completed</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="files" class="btn" style="background-color: white"><i class="fa fa-upload" aria-hidden="true"></i> Select Image</label>
                                <input id="files" style="visibility:hidden;" type="file" Name="pimage" accept="image/*">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                        <div class="form-group">
                                <button class="btn btn-danger del-project">Delete</button>
                            </div>
                    </div>
                    <!--  Form to Modify an Event -->
                    <div class="event program">
                        <form class="form-group col-md-12"  action="{{url('/putevents')}}" method="POST">
                            <!-- <input name="_method" type="hidden" value="PUT"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <fieldset id="Group2" name="Group2">

                                            <select id="Select2" name="Select2" class="form-control">
                                                <option>Select</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <input type="hidden" id="event_id" name="id">

                                    <div class="form-group">
                                        <input class="form-control" id="updateename" name="ename" placeholder="Event Name" type="text" style="height:28px;">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="eve_description" name="edescription" placeholder="Event Description" type="text" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="updatevenue" name="location" placeholder="Venue" type="text" style="height:28px;">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="estatus" name="estatus">
                                            <option>Event Status</option>
                                            <option value="current">Current</option>
                                            <option value="future">Future</option>
                                            <option value="completed">Completed</option>



                                        </select>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label>Date</label>
                                <div class="input-group date" id='datetimepicker2'>
                                    
                                    <input type="text" id="edate" name="edate" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>   
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Start Time</label>
                                <div class="input-group date" id='datetimepicker3'>
                                    <input type="text" id="estarttime" name="estarttime" placeholder="Start Time" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span> 
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>End Time</label>
                                <div class="input-group date" id='datetimepicker4'>
                                    <input type="text" id="eendtime" name="eendtime"  placeholder="End Time" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="form-group col-md-2">
                                <label for="files" class="btn" style="background-color: white"><i class="fa fa-upload" aria-hidden="true"></i> Select Image</label>
                                <input id="files" style="visibility:hidden;" type="file" name="eimage" accept="image/*">
                            </div>

                            <div class="form-group col-md-1">
                                <input type="submit" class="btn btn-primary">
                            </div>
                            <div class="form-group col-md-1">
                                <button class="btn btn-danger del-event">Delete</button>
                            </div>
                        </div>        
                        </form>
                            
                    </div>

                </div>

            </div>
        </div>
        <div class="push"></div>
    </div>

@endsection
@section('scripts')

    {{--Navigation Menu--}}
    <script src="js/nav.js" type="text/javascript"></script>
       <script type="text/javascript">

        $(function()
        {
            var navItems = $('.admin-menu li > a');
            var navListItems = $('.admin-menu li');
            var allWells = $('.admin-content');
            var allWellsExceptFirst = $('.admin-content:not(:first)');
            console.log('allWellsExceptFirst');

            allWellsExceptFirst.hide();
            navItems.click(function(e)
            {
                e.preventDefault();
                navListItems.removeClass('active');
                $(this).closest('li').addClass('active');

                allWells.hide();
                var target = $(this).attr('data-target-id');
                $('#' + target).show();

            });

        });

    </script>


    <script>
        function FocusOnInput() {
            document.forms['donate_search_form'].elements['input'].focus();
        }
        $(document).ready(function(){
            var count=0;
            $.ajax({
                url: '/history/project/all',
                type:'GET',
                datatype:'JSON',
                success: function(response){
                    $(".doutput").empty();
                    var output = " ";
                    response = JSON.parse(response);
                    $(".doutput").empty();
                    $.each(response, function (index,val) {
                        count = index+1;
                        output +=  "<tr><th scope='row'>"+count+"</th><td>"+val.name+"</td><td>"+val.donation_type+"</td><td>"+val.project+"</td><td>"+val.dod+"</td><td>$"+val.amount+"</td></tr>"
                    });
                    count = response.length;
                    $(".doutput").append(output);
                    callvolh();
                }
            });
            function callvolh(){
                $.ajax({
                    url: '/history/voulnteer/all',
                    type:'GET',
                    datatype:'JSON',
                    success: function(response){
                        var output = " ";
                        response = JSON.parse(response);
                        console.log(response);
                        $.each(response, function (index,val) {
                            output += "<tr><th scope='row'>"+(count+1)+"</th><td>"+val.firstname+" "+val.lastname+"</td><td>volunteer</td><td>"+val.event_name+"</td><td>"+val.dov+"</td><td>N/A</td></tr>"
                            count = count + 1;
                        });
                        $(".doutput").append(output);
                        callaafh();
                    }
                });
            }

            function callaafh(){
                $.ajax({
                    url: '/history/aaf/all',
                    type:'GET',
                    datatype:'JSON',
                    success: function(response){
                        var output = " ";
                        response = JSON.parse(response);
                        console.log(response);
                        $.each(response, function (index,val) {
                            output +=  "<tr><th scope='row'>"+(count+1)+"</th><td>"+val.donation+"</td><td>"+val.type+"</td><td>"+val.donation+"</td><td>"+val.dod+"</td><td>$"+val.amount+"</td></tr>"
                            count = count + 1;
                        });
                        $(".doutput").append(output);
                    }
                });
            }
        });
        $(document).ready(function() {
            if ($("#dinput").val().length == 0) {
                $.ajax(
                        {
                            url: "",
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML += '<tr><td>' + item.fullname + '</td><td>' + item.donationtype + '</td><td>' + item.projectoreventname + '</td><td>' + item.dateofdonation + '</td><td>' + item.donatedamount  + '</td></tr>';
                                });

                                $('.doutput').html(trHTML);
                            }
                        })
            }
            else ($("#dinput").val().length > 0)
            {
                $("#dsearchitem").click(function () {
                    $("#dinput").keyup(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            }
                        });
                        var sval = $("#dinput").val();
                        $.ajax({
                            url: "",
                            type: "POST",
                            data: {'search_var': sval},
                            datatype: "json",
                            success: function (response, status, request) {
                                console.log(response);
                                var output = '';
                                response = JSON.parse(response);
                                $.each(response, function (key, val) {
                                    output += '<tr><td>' + item.fullname + '</td><td>' + item.donationtype + '</td><td>' + item.projectoreventname + '</td><td>' + item.dateofdonation + '</td><td>' + item.donatedamount  + '</td></tr>';
                                });
                                $(".doutput").html(output);
                            }
                        });
                        if ($("#dinput").val().length == 0) {
                            $.ajax(
                                    {
                                        url: "",
                                        type: "GET",
                                        dataType: "json",
                                        success: function (data) {

                                            var trHTML = '';

                                            $.each(data, function (i, item) {

                                                trHTML += '<tr><td>' + item.fullname + '</td><td>' + item.donationtype + '</td><td>' + item.projectoreventname + '</td><td>' + item.dateofdonation + '</td><td>' + item.donatedamount  + '</td></tr>';
                                            });

                                            $('.doutput').html(trHTML);

                                        }

                                    })
                        }

                    });

                });
            }

        });
    </script>
    <script>
        function FocusOnInput() {
            document.forms['search_form'].elements['input'].focus();
        }
        $(document).ready(function() {
            if ($("#input").val().length == 0) {
                $.ajax(
                        {
                            url: "/admin/users/search/all",
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML += '<tr><td>' + item.firstname + '</td><td>' + item.lastname + '</td><td>' + item.email + '</td><td>' + item.phonenum + '</td><td>' + item.user_since + '</td><td>' + item.total_donation + '</td></tr>';
                                });

                                $('.output').html(trHTML);
                            }
                        })
            }
            else ($("#input").val().length > 0)
            {
                $("#searchitem").click(function () {
                    $("#input").keyup(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            }
                        });
                        var sval = $("#input").val();
                        $.ajax({
                            url: "/admin/users/search",
                            type: "POST",
                            data: {'search_var': sval},
                            datatype: "json",
                            success: function (response, status, request) {
                                console.log(response);
                                var output = '';
                                response = JSON.parse(response);
                                $.each(response, function (key, val) {
                                    output += '<tr><td>' + val.firstname + '</td><td>' + val.lastname + '</td><td>' + val.email + '</td><td>' + val.phonenum + '</td><td>' + val.user_since + '</td><td>' + val.total_donation + '</td></tr>';
                                });
                                $(".output").html(output);
                            }
                        });
                        if ($("#input").val().length == 0) {
                            $.ajax(
                                    {
                                        url: "/admin/users/search",
                                        type: "GET",
                                        dataType: "json",
                                        success: function (data) {

                                            var trHTML = '';

                                            $.each(data, function (i, item) {

                                                trHTML += '<tr><td>' + item.firstname + '</td><td>' + item.lastname + '</td><td>' + item.email + '</td><td>' + item.phonenum + '</td><td>' + item.user_since + '</td><td>' + item.total_donation + '</td></tr>';
                                            });

                                            $('.output').html(trHTML);

                                        }

                                    })
                        }

                    });

                });
            }

        });

    </script>
    {{--Modify Menu--}}
    <script>
        $(document).ready(function(){
            $(".event").hide();
            $('input[type="radio"]').change(function(){
                if($(this).attr("value")=="projects"){
                    $(".program").not(".project").hide();
                    $(".project").show();
                }
                if($(this).attr("value")=="events"){
                    $(".program").not(".event").hide();
                    $(".event").show();
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            $("#modifyitem").click(function() {
                //onload when projects is selected
                $('#Select1').empty();
                $.ajax({
                    url: '../projects/get/titles',
                    type: 'GET',
                    datatype: 'JSON',
                    success: function (response) {
                        response = JSON.parse(response);
                        var output = "<option>Select</option>"
                        $.each(response, function(key,val){
                            output += "<option value="+val.id+" class='projrad'>"+val.project_Title+"</option>";
                        });
                            $('#Select1').append(output);
                    }
                });
    });
                //when click on events
                $("#radiosel2").click(function(){
                $('#Select2').empty();
                    $.ajax({
                        url: '../events/get/titles',
                        type: 'GET',
                        datatype: 'JSON',
                        success: function (response) {
                            response = JSON.parse(response);
                            var output = "<option>Select</option>"
                            $.each(response, function(key,val){
                                output += "<option value="+val.id+" class='eventrad'>"+val.event_Title+"</option>";
                            });
                                $('#Select2').append(output);
                        }


                    });
                });
        
            $("body").on('change', '#Select1', function(){
                var id = $(this).val();
                $.ajax({
                    url: '../projects/'+id,
                    type: 'GET',
                    datatype: 'JSON',
                    success: function(response){
                        response = JSON.parse(response);
                        $('#updatepname').val(response[0].project_Title);
                        $('#proj_description').val(response[0].project_Description);
                        $('#pstatus>option[value='+response[0].project_Status +']').attr('selected', true);
                        $('#project_id').val(response[0].id);  
                        $('.del-project').attr('value', response[0].id);
                   }
                })

            });
            $("body").on('change', '#Select2', function(){
                var id = $(this).val();
                $.ajax({
                    url: '../events/'+id,
                    type: 'GET',
                    datatype: 'JSON',
                    success: function(response){
                        response = JSON.parse(response);
                        $('#edate').val(response[0].event_Date);

                        $('#updateename').val(response[0].event_Title);
                        $('#eve_description').val(response[0].event_Description);
                        $('#updatevenue').val(response[0].event_Location);
                        $('#estatus>option[value='+response[0].event_Status +']').attr('selected', true);
                        var stime = response[0].event_StartTime;
                        var etime = response[0].event_EndTime;

                        stime = stime.split(" ");
                        etime = etime.split(" ");

                        $('#estarttime').val(stime[1]);
                        $('#eendtime').val(etime[1]);

                        $('#event_id').val(response[0].id);
                        $('.del-event').attr('value', response[0].id);


                    }
                })

            });
//Project delete functionality
$('.del-project').click(function(){
    var id = $(this).attr('value') ;
    $.ajax({
        url: '../projects/'+id,
        type: 'DELETE',
        // data: {'id': id},
        datatype: 'JSON',
        success: function(){
          window.location.href = "{{url('projects')}}";
        }
    });

});
//Event delete functionality
$('.del-event').click(function(){
    var id = $(this).attr('value') ;
    $.ajax({
        url: '../events/'+id,
        type: 'DELETE',
        // data: {'id': id},
        datatype: 'JSON',
        success: function(){
          window.location.href = "{{url('events')}}";
        }
    });

});

        });

    </script>

    {{--Date Picker--}}
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker3,#datetimepicker4,#starttime,#endtime').datetimepicker({
                    
                    format:'HH:mm:ss'
                });

                $('#pstarttime').datetimepicker({
                    format:'HH:mm:ss'

                });

                $('#datetimepicker2,#datetimepicker1,#datetimepicker5').datetimepicker({
                    
                    format:'YYYY-MM-DD'
                });


            });

    </script>
    {{--Create Projects and Events--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#createvent')
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
                            ename: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Event name is required'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The Event name can only consist of alphabets'
                                    }
                                }
                            },
                            Location: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Venue is required'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'This field can only consist of alphabets'
                                    }
                                }
                            },
                            description: {
                                validators:{
                                    notEmpty:{
                                        message: 'Description about event is must'
                                    },

                                    stringLength:{
                                        max: 1000,
                                        message: 'description should be less than 1000 characters'
                                    },

                                    regexp:{
                                        regexp: /^[A-Za-z0-9\s]+$/i,
                                        message: 'Only alphanumeric characters.'
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
        $(document).ready(function() {
            $('#createproject')
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
                            pname: {
                                validators: {
                                    notEmpty: {
                                        message: 'The Project name is required'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-z ]*$/,
                                        message: 'The Project name can only consist of alphabets'
                                    }
                                }
                            },

                            description: {
                                validators:{
                                    notEmpty:{
                                        message: 'Description about Project is must'
                                    },
                                    stringLength:{
                                        max: 1000,
                                        message: 'description should be less than 1000 characters'
                                    },

                                    regexp:{
                                        regexp: /^[A-Za-z0-9\s]+$/i,
                                        message: 'Only alphanumeric characters.'
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

    <script type="text/javascript">
        function submitForm() {
            document.create.submit();
            document.create.reset();
        }

    </script>


@endsection
