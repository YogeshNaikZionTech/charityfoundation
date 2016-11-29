@extends('layouts.main')

@section('title', '| History')
@section('stylesheets')
    <link href="{{URL::asset('/css/history.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="container">
    <h1 class="page-header" style="color: #d9534f;">History</h1>
    <div>
        <table class="display table table-striped table-hover table-bordered table-info text-primary bg-danger d-inline" align="center">
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
                <!-- <tr>
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
                </tr> -->
            </tbody>
        </table>
    </div>  
</div>


    
@endsection

@section('scripts')
<script src="{{URL::asset('/js/nav.js')}}"></script>

@endsection