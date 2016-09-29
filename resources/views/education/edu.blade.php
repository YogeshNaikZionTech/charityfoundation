@extends('layouts.main')

@section('title', '|Education')
@section('stylesheets')
    <link href="{{URL::asset('/css/app.css')}}" rel="stylesheet" type="text/css"/>
    @endsection
@section('content')
    <div class="container" id="content">

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(

                function() {
                    $('.nav li:first').removeClass('active');
                    $('.nav li:nth-child(2)').addClass('active');
                });
    </script>
@endsection