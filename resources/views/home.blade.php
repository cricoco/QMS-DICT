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
                <button class="nav-link active" id="summary-tab" data-bs-toggle="tab" data-bs-target="#summary-tab-pane" type="button" role="tab" aria-controls="summary-tab-pane" aria-selected="true">Dashboard</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="false">History Logs</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="true">History Logs</button>
            </li> -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="visionmission-tab" data-bs-toggle="tab" data-bs-target="#visionmission-tab-pane" type="button" role="tab" aria-controls="visionmission-tab-pane" aria-selected="false">Vision & Mission</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact Us</button>
            </li>


        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="summary-tab-pane" role="tabpanel" aria-labelledby="summary-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>Dashboard</strong></h1>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $totalDocuments }}</h3>
                                    <p>Masterlist</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('documents.index') }}" class="small-box-footer">Visit <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $totalManuals }}</h3>
                                    <p>Manuals</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('documents.manuals') }}" class="small-box-footer">Visit <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $totalForms }}</h3>
                                    <p>Forms</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('documents.formats') }}" class="small-box-footer">Visit <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>



                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $totalArchives }}</h3>
                                    <p>Archives</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('archives') }}" class="small-box-footer">Visit <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <div class="tab-pane fade" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>History Logs</strong></h1>
                <div class="card-body">
                   
                </div>
            </div> -->
            <div class="tab-pane fade" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>History Logs</strong></h1>
                <div class="card-body text-center">
                    @include('history', ['history' => $history])
                </div>

            </div>

            <div class="tab-pane fade" id="visionmission-tab-pane" role="tabpanel" aria-labelledby="visionmission-tab" tabindex="0"><br>
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