@extends('publicdocuments.layout')
@section('publichomeContent')
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
                <button class="nav-link active" id="visionmission-tab" data-bs-toggle="tab" data-bs-target="#visionmission-tab-pane" type="button" role="tab" aria-controls="visionmission-tab-pane" aria-selected="true">Vision & Mission</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact Us</button>
            </li>


        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="visionmission-tab-pane" role="tabpanel" aria-labelledby="visionmission-tab" tabindex="0"><br>
            <h1 class="entry-title text-center"><strong>Mission and Vision</strong></h1>
            <br><br>
                <div class="card-body">
                    <strong>Mission</strong>
                    <i>DICT of the people and for the people.”</i>
                    <p>The Department of Information and Communications Technology commits to:</p>

                    <ul>
                    <li>Provide every Filipino access to vital ICT infostructure and services</li>
                    <li>Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs</li>
                    <li>Establish a One Digitized Government, One Nation</li>
                    <li>Support the administration in fully achieving its goals</li>
                    <li>Be the enabler, innovator, achiever and leader in pushing the country’s development and transition towards a world-class digital economy</li>
                    </ul>

                    <strong>Vision</strong>
                    <i>An innovative, safe and happy nation that thrives through and is enabled by Information and Communications T</i>

                    <p>DICT aspires for the Philippines to develop and flourish through innovation and constant development of ICT in the pursuit of a progressive, safe, secured, contented and happy Filipino nation.</p>

                    <strong>Core Values</strong>

                    <p>D – Dignity<br>
                        I – Integrity<br>
                        C – Competency and Compassion<br>
                        T – Transparency
                    </p>
                </div>
            </div>

            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>Contact Us</strong></h1>
                <div class="card-body text-center">
                        <p>(062) 991 2742</p>
                        <p>region9basulta@dict.gov.ph</p>
                        <p>kryztle.evangelista@dict.gov.ph</p>
                </div>

            </div>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>


    </div>

</div>

@endsection