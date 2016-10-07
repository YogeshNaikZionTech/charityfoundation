@extends('layouts.main')

@section('title', '| Admin Panel')
@section('stylesheets')
    <link href="{{URL::asset('/css/adminPanel.css')}}" rel="stylesheet" type="text/css"/>
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container well" id="content">
        <h1 class="adminhead">Welcome Admin...!</h1>
        <div class="container adminpanel">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked admin-menu">
                        <li class="active"><a href="#" data-target-id="history">Donation History</a></li>
                        <li><a href="" data-target-id="users">Search Users</a></li>
                        <li><a href="" data-target-id="create">Create Project/Event</a></li>
                        <li><a href="" data-target-id="update">Update Project/Event</a></li>

                    </ul>
                </div>

                <div class="col-md-8 admin-content" id="history">
                    <h3><i class="fa fa-table fa-fw"></i>Donations</h3>
                    <table class="display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline"  align="center">
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
                <div class="col-md-8 admin-content" id="users">
                   <h3><i class="fa fa-search fa-fw"></i>Users</h3>
                    <div id="custom-search-input">
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control input-lg" placeholder="Search User" />
                            <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                        </div>
                    </div>
                    <br/>
                    <table id="example" class="display table table-striped table-bordered table-hover table-success text-primary bg-info d-inline" align="center">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>User Since</th>
                            <th>Amount Received</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>(111)111-1111</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$150</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>(222)222-2222</td>
                            <td>Example@domain.com</td>
                            <td>2016/02/25</td>
                            <td>$100</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>(333)333-3333</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$140</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>(444)444-4444</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$200</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>(555)555-5555</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$150</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>(666)666-6666</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$70</td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>(777)777-7777</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$40</td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>(888)888-8888</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$120</td>
                        </tr>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>(999)999-9999</td>
                            <td>Example@domain.com</td>
                            <td>2016/04/25</td>
                            <td>$85</td>
                        </tr>
                        </table>
                </div>
                <div class="col-md-8 admin-content" id="create">
                    <h3><i class="fa fa-plus-circle fa-fw"></i>Projects/Events</h3>
                    <div class="container col-md-12">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
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
                <div class="col-md-8 admin-content" id="update">
                <h3><i class="fa fa-pencil-square-o fa-fw"></i>Projects/Events</h3>
                    <form class="form-group col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Select Project/Event</option>
                                <option>Project1</option>
                                <option>Project2</option>
                                <option>Project3</option>
                                <option>Event1</option>
                                <option>Event2</option>
                                <option>Event3</option>
                            </select>
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
                        <input type="file" Name="pic" accept="image/*">
                        </div>
                        <div class="form-group">
                            <div class="btn">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
    @endsection
@section('scripts')
    <script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
    </script>
@endsection