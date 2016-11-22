@extends('layouts.main')

@section('title', '| Admin Panel')
@section('stylesheets')
    <link href="{{URL::asset('/css/adminPanel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
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
                    <li class="active">
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
            <div class="admin-content" id="history">
                <h3>Donation History<a class="btn btn-warning btn-md export">Export All</a></h3>
                <table class="display table table-striped table-hover table-bordered table-info table-responsive text-primary bg-danger d-inline"  id="historytable" align="center">
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
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark Otto</td>
                        <td>Donated Project</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$25</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob Thornton</td>
                        <td>Donated Event</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$30</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>Direct Donation</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>John Smith</td>
                        <td>Direct Donation</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$45</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Owen Murphy</td>
                        <td>Donated Event</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$55</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Ernesto Gomez</td>
                        <td>Donated Project</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$15</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>David Turner</td>
                        <td>Direct Donation</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$50</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Yasha Karan</td>
                        <td>Direct Donation</td>
                        <td>Name</td>
                        <td>mm/dd/yyyy</td>
                        <td>$45</td>
                    </tr>
                    </tbody>
                </table>

            </div>
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
                            <form enctype="multipart/form-data" name="create" id="createproject" class=" col-md-6" action="{{url('/projects')}}" method="post">
                                <div class="form-group">
                                    <label for="pname" class="col-md-6 control-label"  >Project Name</label>
                                    <div class="col-md-6">
                                    <input id="pname" name="pname" type="text" class="form-control" style="height:28px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plocation" class="col-md-6 control-label">Venue :</label>
                                    <div class="col-md-6">
                                        <input id="plocation" type="text"  name="plocation" class="form-control" style="height:28px;" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pdate"  class="col-md-6 control-label">Date :</label>
                                    <div class="col-md-6">
                                        <input  id="pdate" type="date" name="pdate"  class="form-control" style="height:28px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pstime" class="col-md-6 control-label">Start Time :</label>
                                    <div id="pstarttime" class="input-append col-md-6" >
                                        <input class="col-md-11 form-control" id="pstime" name="pstime"  data-format="hh:mm:ss" type="text"  style="height:28px;"/>
                                        <span class="add-on" style=" height: 28px;">
                                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar "> </i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pdescription" class="control-label col-md-6">Project Description</label>
                                    <div class="col-md-6">
                                        <textarea name="pdescription" id="pdescription" placeholder="Description of the project" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pimage" class="control-label col-md-6">Upload an image</label>
                                    <div class="col-md-6">
                                    <input id="pimage" type="file" name="pimage" accept="image/*">
                                    </div>
                                </div>
                                    <div>
                                        <input type="submit" class="btn btn-success" onclick="submitForm()">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="eve">
                            <h3>New Event Creation</h3>

                            <form enctype="multipart/form-data" name="create" class="col-md-6" id="createvent" action="{{url('/events')}}" method="post">
                                    <div class="form-group">
                                    <label  for="ename" class="col-md-3 control-label" >Event Name :</label>
                                        <div class="col-md-8">
                                             <input id="ename" type="text"  name="ename" class="form-control" style="height:28px;" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="Location" class="col-md-3 control-label">Venue :</label>
                                        <div class="col-md-8">
                                             <input id="location" type="text"  name="location" class="form-control" style="height:28px;" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="dateeve"  class="col-md-3 control-label">Date :</label>
                                        <div class="col-md-8">
                                         <input  id="dateeve" type="date" name="edate"  class="form-control" style="height:28px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="stime" class="col-md-3 control-label">Start Time :</label>
                                         <div id="starttime" class="input-append col-md-8" >
                                                <input class="col-md-11" id="stime" name="stime"  data-format="hh:mm:ss" type="text"  style="height:28px;"/>
                                                <span class="add-on" style=" height: 28px;">
                                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar "> </i></span>
                                         </div>
                                      </div>

                                    <div class="form-group">
                                        <label for="etime" class="col-md-3 control-label">End Time :</label>
                                        <div id="endtime" class="input-append col-md-8" >
                                            <input class="col-md-11" id="etime" name="etime"  data-format="hh:mm:ss" type="text" style="height:28px;" />
                                            <span class="add-on" style=" height: 28px;">
                                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="description" class="col-md-3 control-label" >Event Description :</label>
                                     <div class="col-md-8">
                                    <textarea id="edescription" name="edescription" placeholder="Description of the event" class="form-control"></textarea>
                                     </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3">Upload an image:</label>
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
{{--Modify--}}
            <div class="admin-content" id="update">
                <h3>Update Projects/Events</h3>

                <div>
                    <label class="radiosel">
                        <input type="radio" name="program" id="radiosel1" value="projects" checked> Projects
                        <input type="radio" name="program" id="radiosel2" value="events"> Events
                    </label>
                </div>
               <!--  Form to Modify an Event -->
                <div class="project program">
                    <form enctype="multipart/form-data" class="form-group col-md-6" action="{{url('/putprojects')}}" method="POST">
                    <!-- <input name="_method" type="hidden" value="PUT"> -->
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <fieldset id="Group2" name="Group2">
                                <select id="Select1" name="Select1" class="form-control">
                                    <option>Select</option>
                                </select>
                            </fieldset>
                        </div>
                        <input type="hidden" class="project_id" name="id">

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
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
               <!--  Form to Modify an Event -->
                <div class="event program">
                    <form enctype="multipart/form-data" class="form-group col-md-6"  action="{{url('/putevents')}}" method="POST">
                    <!-- <input name="_method" type="hidden" value="PUT"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

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
                        <div class="form-group">
                            <div>
                                <div>
                                <label>Date</label>
                                    <input type="date" id="edate" name="edate">
                               
                                </div>
                                <div class="datetimepicker1 input-append date">
                                    <input data-format="dd/MM/yyyy hh:mm:ss" type="text" id="estarttime" name="estarttime" placeholder="Start Time">
                                    <span class="add-on" style="height:28px;">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                </span>
                                </div>
                                <div class="datetimepicker1 input-append date">
                                    <input data-format="dd/MM/yyyy hh:mm:ss" type="text" id="eendtime" name="eendtime"  placeholder="End Time">
                                    <span class="add-on" style="height:28px;">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                </span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="files" class="btn" style="background-color: white"><i class="fa fa-upload" aria-hidden="true"></i> Select Image</label>
                            <input id="files" style="visibility:hidden;" type="file" name="eimage" accept="image/*">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                            <button class="btn btn-danger">Delete</button>
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
    $(document).ready(function()
    {
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');

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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#history').show();
        $('#users').hide();
        $('#create').hide();
        $('#update').hide();
    });
    </script>
   {{--Search Users Menu--}}
    <script>
        function FocusOnInput() {
            document.forms['search_form'].elements['input'].focus();
        }
    </script>
    <script>

        $(document).ready(function() {
            if ($("#input").val().length == 0) {
                $.ajax(
                        {
                            url: "/admin/users/search",
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML += '<tr><td>' + item.firstname + '</td><td>' + item.lastname + '</td><td>' + item.email + '</td><td>' + item.phonenum + '</td><td>' + item.usersince + '</td><td>' + item.amountreceived + '</td></tr>';
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
                                    output += '<tr><td>' + val.firstname + '</td><td>' + val.lastname + '</td><td>' + val.email + '</td><td>' + val.phonenum + '</td><td>' + val.usersince + '</td><td>' + val.amountreceived + '</td></tr>';
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

                                                trHTML += '<tr><td>' + item.firstname + '</td><td>' + item.lastname + '</td><td>' + item.email + '</td><td>' + item.phonenum + '</td><td>' + item.usersince + '</td><td>' + item.amountreceived + '</td></tr>';
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
                       $.ajax({
                           url: '../projects/status/current',
                           type: 'GET',
                           datatype: 'JSON',
                           success: function (response) {
                               response = JSON.parse(response);
                               console.log(response);
                               $.each(response, function(key,val){
                                   var output = "<option value="+val.id+" class='projrad'>"+val.project_Title+"</option>";
                                   $('#Select1').append(output);
                               });


                           }


                       });

                       //when click on events
                       $("#radiosel2").click(function(){
                           $.ajax({
                               url: '../events/status/current',
                               type: 'GET',
                               datatype: 'JSON',
                               success: function (response) {
                                   response = JSON.parse(response);
                                   $.each(response, function(key,val){
                                       var output = "<option value="+val.id+" class='eventrad'>"+val.event_Title+"</option>";
                                       $('#Select2').append(output);
                                   });
                               }


                           });
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
                               $('#updatepname').val(response.project_Title);
                               $('#proj_description').val(response.project_Description);
                               $('#pstatus>option[value='+response.project_Status +']').attr('selected', true);
                               $('.project_id').val(response.id);                           }
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
                               $('#estarttime').val( response[0].event_StartTime);
                               $('#eendtime').val(response[0].event_EndTime);
                               $('#event_id').val(response[0].id);

                           }
                       })

                   });
               });

   </script>

{{--Date Picker--}}
    <script type="text/javascript">
        $(function() {
            $('#starttime').datetimepicker({
                pickDate: false ,
                pick12HourFormat: true
            });
        });
        $(function() {
            $('#endtime').datetimepicker({
                pickDate: false,
            pick12HourFormat: true
            });
        });
        $(function() {
            $('#pstarttime').datetimepicker({
                pickDate: false ,
                pick12HourFormat: true
            });
        });
    </script>
    {{--Create Projects and Events--}}
    <script type="text/javascript"
            src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
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
        $(function () {
            $('.datetimepicker1').datetimepicker();
        });
        function submitForm() {
            document.create.submit();
            document.create.reset();
        }

    </script>


@endsection
