@extends('layouts.main')

@section('title', '| Admin Panel')
@section('stylesheets')
    <link href="{{URL::asset('/css/adminPanel.css')}}" rel="stylesheet" type="text/css"/>
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="content">
        <div class="header">
            <div class="logo">
                <i class="fa fa-tachometer"></i>
                <span>Admin Panel</span>
            </div>
            <a href="#" class="nav-trigger"><span></span></a>
        </div>
        <div class="side-nav">
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
                    <li>
                        <a href="" data-target-id="update">
                            <span><i class="fa fa-pencil-square-o"></i></span>
                            <span>Modify</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <div class="admin-content" id="history">
                <h3>Donation History<button class="btn btn-warning btn-md export">Export All</button></h3>
                <table class="display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline"  id="historytable" align="center">
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Donation Type</th>
                        <th>Donation Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Donated Project</td>
                        <td>$25</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Donated Event</td>
                        <td>$30</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Direct Donation</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>John</td>
                        <td>Smith</td>
                        <td>Direct Donation</td>
                        <td>$45</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Owen</td>
                        <td>Murphy</td>
                        <td>Donated Event</td>
                        <td>$55</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Ernesto</td>
                        <td>Gomez</td>
                        <td>Donated Project</td>
                        <td>$15</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>David</td>
                        <td>Turner</td>
                        <td>Direct Donation</td>
                        <td>$50</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Yasha</td>
                        <td>Karant</td>
                        <td>Direct Donation</td>
                        <td>$45</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="admin-content" id="users">
                <h3>Users<button class="btn btn-warning btn-md export">Export All</button></h3>
                <div class="col-xs-6" >
                    <div class="wrapper">
                        <form name="search_form">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input class="input" name="input" id= "input" placeholder="Search Here" autofocus type="text">
                        <span class="underline"></span>
                        </form>
                    </div>
                </div>
                <br/>

                <table id="example" class="display table table-striped table-bordered table-hover table-success text-primary bg-info d-inline" id="usertable" align="center">
                    <thead class="thead-inverse">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
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
                <div class="container col-md-12">

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
                            <form class="form-group col-md-6" action="{{url('')}}" action="POST">
                                <div class="modal-body">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control">
                                    <label>Project Description</label>
                                    <textarea placeholder="Description of the project" class="form-control"></textarea>
                                    <label>Upload an image</label>
                                    <input type="file" Name="pic" accept="image/*">
                                    <div class="btn">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="eve">
                            <h3>New Event Creation</h3>
                            <form class="form-group col-md-6" action="{{url('events')}}" method="post">
                                <div class="modal-body">
                                    <label>Event Name</label>
                                    <input type="text" name="ename" class="form-control">
                                    <label>Venue</label>
                                    <input type="text" name="Location" class="form-control">
                                    <label>Date</label>
                                    <input type="date" class="form-control">
                                    <label>Start Time</label>
                                    <input type="time" class="form-control">
                                    <label>End Time</label>
                                    <input type="time" class="form-control">
                                    <label>Event Description</label>
                                    <textarea placeholder="Description of the event" class="form-control"></textarea>
                                    <label>Upload an image</label>
                                    <input type="file" name="pic" accept="image/*">
                                    <div class="btn">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <div class="admin-content" id="update">
                <h3>Update Projects/Events</h3>
                <form class="form-group col-md-6">
                    <div class="form-group">
                    <fieldset id="Group1" name="Group1">
                        <input id="Radio1" name="Radio1" type="radio" value="projrad" />Projects
                        <input id="Radio1" name="Radio1" type="radio" value="eventrad" />Events

                    </fieldset>
                        </div>
                    <div class="form-group">
                        <fieldset id="Group2" name="Group2">

                            <select id="Select1" name="Select1" class="form-control">
                                <option>Select</option>
                                <option value="projrad 1" class="projrad">Project 1</option>
                                <option value="projrad 2" class="projrad">Project 2</option>
                                <option value="projrad 3" class="projrad">Project 3</option>
                                <option value="projrad 4" class="projrad">Project 4</option>
                                <option value="projrad 5" class="projrad">Project 5</option>
                                <option value="eventrad 1" class="eventrad">Event 1</option>
                                <option value="eventrad 2" class="eventrad">Event 2</option>
                                <option value="eventrad 3" class="eventrad">Event 3</option>
                                <option value="eventrad 4" class="eventrad">Event 4</option>
                                <option value="eventrad 5" class="eventrad">Event 5</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="updatename" name="updatename" placeholder="Project or Event Name" type="text">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="description" name="description" placeholder="Project or Event Description" type="text" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control">
                            <option>Project Status</option>
                            <option>Active</option>
                            <option>Completed</option>
                            <option>Future</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="files" class="btn" style="background-color: white"><i class="fa fa-upload" aria-hidden="true"></i> Select Image</label>
                        <input id="files" style="visibility:hidden;" type="file" Name="pic" accept="image/*">
                    </div>

                    <div class="form-group">
                        <div class="btn">
                            <input type="submit" class="btn btn-primary">
                        </div>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
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
    $('.nav-trigger').click(function() {
    $('.side-nav').toggleClass('visible');
    });
    });
    </script>
    <script>
        jQuery(function($) {
            $('input:radio').change(function(){
                var val = $('input:radio:checked').val();
                $('#Select1').val(0)
                $('.projrad, .eventrad').hide();
                $('.' + val).show();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
          $("#searchitem").click(function(){
            $("#input").keyup(function(){
                $.ajaxSetup({
                    headers:
                    {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
                });
                var sval = $("#input").val();
                $.ajax({
                    url			: "/admin/users/search",
                    type		: "POST",
                    data		: {'search_var':sval},
                    datatype	: "json",
                    success		: function(response,status,request){

                        console.log(response);
                        var output='';
                        response = JSON.parse(response);
                        $.each(response, function(key,val){
                            output += "<td>" + " "+val.firstname + "</td><br/>";
                            output += "<td>" + " "+val.lastname + "</td><br/>";
                            output += "<td>" + "  "+val.email + "</td><br/>";
                            output += "<td>" + " "+val.phonenum + "</td><br/>";
//                            output += "<tr>" + " "+val.user_from + "</tr>";
////                          output += "<tr>" + " "+val.amount + "</tr>";
                            output += '<hr width="15%" align="left"><br>'
                        });
                        $(".output").html(output);
                    }
                });
            });
          });
        });

//        var $rows = $('#example tr');
//        $('#input').keyup(function() {
//            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
//
//            $rows.show().filter(function() {
//                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
//                return !~text.indexOf(val);
//            }).hide();
//        });
    </script>
    <script>
        function FocusOnInput() {
            document.forms['search_form'].elements['input'].focus();
        }

    </script>
@endsection