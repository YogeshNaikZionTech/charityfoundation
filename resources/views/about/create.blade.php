@extends('layouts.main')

@section('title', '| Abouts Us')
@section('content')
<head>
<style>
section#banner{
        padding-top: 110px;
        padding-bottom: 100px;
        background: url("images/aboutus.png");
        background-attachment: fixed;
    }
    section#banner p{
        font-size:30px;
        color:#fff;
    }

    section#banner h1{
        text-transform:uppercase;
    }
    
    section.box{
        text-align: center;;
        padding: 50px 40px;
    }
    section#about div{
        width:70%;
        margin:0 auto;
    }
    section#about p{
        font-size: 18px;
        font-style: oblique;
         font-family: Arial;
          text-align: justify;
    }
    section#about{
        border-top: 1px solid #A9A9A9;
        padding-bottom: 70px;
    }
    img#img1{
        float:left;
        width:200px; 
        height :150px;
        padding:5px;
        margin-right: 10px;
    }
    img#img2{
        float:right;
        width:200px; 
        height :150px;
        padding:5px;
        margin-right: 10px;
    }
    section#about h2{
        margin: 30px 0 50px;
        padding-bottom: 15px;
        border-bottom: 1px solid #000000;
    }
    section#about h2:nth-of-type(1){
        text-align: left;
    }
    section#about h2:nth-of-type(2){
        text-align: right;
    }
    .clearfix{
        clear: both;
    }
    </style>
</head>
<div id="content">
<header>
<section id="banner" class="box">
    <div>
        

        <h1>Be the change you want to see in the world</h1>
    </div>
</section>
</header>
<section id="about" class="box">

<div>

    <h2>About Us</h2>
    <img class="img-responsive img-circle" id="img1"src="images/people1.jpg" width="80px" height="80px">
    <!-- <img id="img1" src="images/people1.jpg" width="100px" height="100px"> -->
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
     <div class="clearfix"></div>
    <br>


    <h2>Our Story</h2>
    <img class="img-responsive img-circle" id="img2"src="images/people1.jpg" width="80px" height="80px">
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
    </p>


</div>

</section>
    </div>


    @endsection
