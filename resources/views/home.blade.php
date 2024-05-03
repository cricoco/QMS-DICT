<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home-bg.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>
<body>
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('documents.index') }}">Library</a></li>
            <li><a href="{{ route('about-us') }}" style="margin-right: 950px;">About Us</a></li>
            
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
    </div>
</body>
</html> -->

@extends('documents.layout')
@section('homeContent')
<div class="document-background">  
<div class="container" width="20px" height="20px" style="background-color: white;">
</br></br>

<div class="card-header" style="text-align: center;">
    <h1><strong><center>DICT QMS - Portal</center></strong></h1>
</div>
<br><br>

<div class="card-body" style="text-align: center;">
<h2><strong>Contact Us</strong></h2><br><br><br><br>
<b>Department of Information and Communications Technology</b>
<p>W33G+FC4, Zamboanga, Zamboanga del Sur</p>
<p>(062) 991 2742</p>

</div>

</br></br></br></br></br></br>
<div class="card-header" style="text-align: center;">
    <h1><strong>Vision & Mission</strong></h1>
</div>
<div class="card-body" >
<h2><strong>Mission</strong></h2>
<p><i>“</i><i>DICT of the people and for the people.”</i></p>
<p>The Department of Information and Communications Technology commits to:</p>
<ul>
<li>Provide every Filipino access to vital ICT infostructure and services</li>
<li>Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs</li>
<li>Establish a One Digitized Government, One Nation</li>
<li>Support the administration in fully achieving its goals</li>
<li>Be the enabler, innovator, achiever and leader in pushing the country’s development and transition towards a world-class digital economy</li>
</ul>
<h1><strong>Vision</strong></h1>
<p><i>“</i><i>An innovative, safe and happy nation that thrives through and is enabled by Information and Communications T</i><i>echnology</i><i>.”</i></p>
<p>DICT aspires for the Philippines to develop and flourish through innovation and constant development of ICT in the pursuit of a progressive, safe, secured, contented and happy Filipino nation.</p>
<h2><strong>Core Values</strong></h2>
<p>D – Dignity<br>
I – Integrity<br>
C – Competency and Compassion<br>
T – Transparency</p>
</div>
</div>
</div>


@endsection