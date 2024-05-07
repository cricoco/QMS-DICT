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

        <div class="card-header" style="background-color: white; text-align: center; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/DICT-Logo-Final-2-300x153.png/1200px-DICT-Logo-Final-2-300x153.png" width="auto" height="190px">
        </div>
        <div class="card-header" style="background-color: #0693e3; text-align: center; color: #ffffff; ">
            <h1><strong>Quality Management System</strong></h1>
        </div>

        <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="s-tab" data-bs-toggle="tab" data-bs-target="#s-tab-pane" type="button" role="tab" aria-controls="s-tab-pane" aria-selected="true">Summary</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">History</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Vision & Mission</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Vision & Mission</button>
            </li>
            

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="s-tab-pane" role="tabpanel" aria-labelledby="s-tab" tabindex="0">Mission and Vision
Mission

“DICT of the people and for the people.”

The Department of Information and Communications Technology commits to:

Provide every Filipino access to vital ICT infostructure and services
Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs
Establish a One Digitized Government, One Nation
Support the administration in fully achieving its goals
Be the enabler, innovator, achiever and leader in pushing the country’s development and transition towards a world-class digital economy
Vision

“An innovative, safe and happy nation that thrives through and is enabled by Information and Communications Technology.”

DICT aspires for the Philippines to develop and flourish through innovation and constant development of ICT in the pursuit of a progressive, safe, secured, contented and happy Filipino nation.

Core Values

D – Dignity
I – Integrity
C – Competency and Compassion
T – Transparency</div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>


    </div>
    
</div>

@endsection