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
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Archive & History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Vision & Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <div class="card-header" style="text-align: center;">
                            <h1><strong>Vision & Mission</strong></h1>
                        </div>

                        <div class="card-body">
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

                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">

                        <div class="card-body" style="text-align: center;">
                            <h2><strong>Contact Us</strong></h2><br><br><br><br>
                            <b>Department of Information and Communications Technology</b>
                            <p>W33G+FC4, Zamboanga, Zamboanga del Sur</p>
                            <p>(062) 991 2742</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection