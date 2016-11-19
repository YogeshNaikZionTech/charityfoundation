@extends('layouts.main')

@section('title', '| Abouts Us')
@section('stylesheets')
    <link href="{{URL::asset('/css/aboutus.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div id="content">
<header>
<section id="banner" class="box">
    <div class="heading">
        <h1>Be the change you want to see in the world</h1>
    </div>
</section>
</header>
<section id="about" class="box">

<div>

    <h2>About Us</h2>
    <!-- <img class="img-responsive img-circle" id="img1" src="images/people1.jpg" width="80px" height="80px"> -->
    <!-- <img id="img1" src="images/people1.jpg" width="100px" height="100px"> -->
    <p>AA Foundation is a nonprofit organization founded by Ashok Anumandla with the vision to give back to society. We believe in shaping young minds as they will define our tomorrow. Technology greatly affects our day to day lives and for some of us it is imposiible to imagine life without our gadgets. However, a large section of soceity in rural India does not have access to this. We reach out to that part of the soceity and provide them with resources and access to the required tools.</p>
    
     <div class="clearfix"></div>

<br>
    <h2>Our vision</h2>
    <!-- <img class="img-responsive img-circle" id="img2" src="images/people1.jpg" width="80px" height="80px"> -->
    <p>We have to be the change we want to see. We believe educating children today will have a huge impact on our future tomorrow.</p>
    <p>
  We strive to achieve this by providing equipment (projectors etc) to schools and conduct seminars on various topics of science & tech.
 Along with this, we are conscious of our environment and try to make an effort in our own small way by making schools adopt green solutions (solar panels etc).
 Our founder takes care of all administrative costs to ensure that all the money donated to the foundation is utilized for the welfare of underpriviledged children. 
 Our foundation has immense respect for your time and encourages you to share some of your valuable time by volunteering for events.
If you know anyone in dire need of help or have any ideas on how to help children from less fortunate economic backgrounds, please get in touch with us and the foundation will strive to be of service. 
 
    </p>

    <br>


    <h2>Our Team</h2>
    <!-- <img class="img-responsive img-circle" id="img1" src="images/people1.jpg" width="80px" height="80px"> -->
    <!-- <img id="img1" src="images/people1.jpg" width="100px" height="100px"> -->
    <p>We have a dedicated team of engineers, designers and developers who have worked very hard trying to making this venture a success and deserve a special mention. </p>
   <ul style="display: inline-block" class="list-group">
       <li>Yogesh Naik</li>
       <li>Sandeepyadav Mukkamala</li>
       <li>Sravanthi Kalusani</li>
       <li>Saumya Telang</li>
       <li>Preethi Gunugula</li>
       <li>Nithin Thomas</li>
       <li>Kimsuka Ramesh</li>

   </ul>
     <div class="clearfix"></div>

</div>

</section>
    </div>


    @endsection
@section('scripts')
    <script src="{{URL::asset('/js/nav.js')}}"></script>
    @endsection
