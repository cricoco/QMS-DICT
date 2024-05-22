@extends('documents.layout')
@section('homeContent')
<div class="document-background">
<br>
    <div class="container" width="20px" height="20px" style="background-color: white; padding: 0;">
        

        <div class="image-container" style="width: 100%; background-color: white; margin-top: 40px;">
            <img src="{{ url('images_dict/QMS-Portal-cover.jpg') }}" style="display: block; width: 100%; height: auto;">
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
                <button class="nav-link" id="qualitypolicy-tab" data-bs-toggle="tab" data-bs-target="#qualitypolicy-tab-pane" type="button" role="tab" aria-controls="qualitypolicy-tab-pane" aria-selected="false">Quality Policy</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="r9basulta-tab" data-bs-toggle="tab" data-bs-target="#r9basulta-tab-pane" type="button" role="tab" aria-controls="r9basulta-tab-pane" aria-selected="false">Quality Objectives</button>
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

            <div class="tab-pane fade" id="qualitypolicy-tab-pane" role="tabpanel" aria-labelledby="qualitypolicy-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>QUALITY POLICY</strong></h1>
                <h2 class="entry-title text-center"><strong>The Department of Information and <br>Communications Technology RIX BASULTA <br>commits to: </strong></h2>
                <div class="card-body" style="font-size: 20px;"><br>
                    <ul>
                        <li>lead in pushing the National ICT Development agenda
                            in transitioning the Philippines toward a world-class
                            digital economy.
                        </li>

                        <li>endeavor to support the achievement of national
                            development goals through innovation and provision
                            of quality and secure information and communications
                            technology (ICT) products and services compliant with
                            pertinent regulatory and statutory requirements and
                            international standards.
                        </li>

                        <li>adhere to the continual improvement of its Quality
                            Management System by maintaining highly competent
                            and committed public servants and by delivering
                            quality services that exceed the expectations of its
                            stakeholders.
                        </li>
                    </ul>
                </div>

            </div>

            <div class="tab-pane fade" id="r9basulta-tab-pane" role="tabpanel" aria-labelledby="r9basulta-tab" tabindex="0"><br>
                <h3 class="entry-title text-center"><strong>R9 and BASULTA Quality Objectives</strong></h3>
                <div class="card-body" style="font-size: 16px;">
                    <ol>
                        <li>
                            To deliver the required ICT products and services according to mutually agreed terms and conditions and existing applicable statutory and regulatory requirements;
                        </li>

                        <li>
                            To ensure the effective implementation, compliance and continuous improvement of the Quality Management System in order to meet customer requirements; and
                        </li>

                        <li>
                            To monitor and evaluate adherence to the agency's Key Performance Indicators (KPI) on quality, efficiency and timeliness.
                        </li>
                    </ol>
                </div>
                <br>
                <h3 class="entry-title text-center"><strong>TOD Quality Objectives</strong></h3>
                <div class="card-body" style="font-size: 16px;">
                    <ol>
                        <li>
                            To deliver the required ICT products and services according to mutually agreed terms and conditions and existing applicable statutory and regulatory requirements; and
                        </li>

                        <li>
                            To attain at least a very satisfactory customer satisfaction rating from 80% of customers surveyed.
                        </li>
                    </ol>
                </div>
                <br>
                <h3 class="entry-title text-center"><strong>Administrative and Finance Division Quality Objectives</strong></h3>
                <div class="card-body" style="font-size: 16px;">
                    <ol>
                        <li>
                            To ensure that all Human Resource Systems are in place in terms of Recruitment, Selection and Placement; Learning and Development; Performance Management; and Rewards and Recognition with 100% compliance to the Civil Service Commission’s Program to Institutionalize Meritocracy and Excellence in Human Resource Management (PRIME-HRM);
                        </li>
                        <li>
                            To ensure efficient and effective financial management, disbursements, monitoring and reporting of all statutory/regulatory and legal requirement of government monitoring agencies thru accurate and timely preparation, verification, certification and submission of financial statements and reports to include monthly, quarterly and annual Financial Statements and other related reports shall be done in the prescribed deadlines;
                        </li>
                        <li>
                            To ensure timely preparation and submission of annual budget of the Regional Office are accurate and accomplished within the prescribed period set by the DICT Central Office, the Department of Budget and Management (DBM), and other concerned government agencies. To monitor budget utilization rate at 90%.
                        </li>
                        <li>
                            To maintain complete inventory of property, plant and equipment (PPE) and efficient process of provision of supply in the office and equipment to property custodians.
                        </li>
                        <li>
                            To maintain 90% of the buildings and facilities as well as the 100% of the official vehicles in good condition to provide personnel conducive workspaces and ensure safe travels respectively.
                        </li>
                        <li>
                            To attain at least a very satisfactory customer satisfaction rating from 80% of customers surveyed.
                        </li>
                    </ol>
                </div>


            </div>



            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><br>
                <h1 class="entry-title text-center"><strong>Contact Us</strong></h1>
                <div class="card-body text-center">
                    <i class="fa fa-phone" aria-hidden="true" style="margin-right: 5px;"></i>(062) 991 2742<br>
                    <i class="fa fa-envelope-o" aria-hidden="true" style="margin-right: 5px;"></i>region9basulta@dict.gov.ph<br>
                    <i class="fa fa-globe" aria-hidden="true" style="margin-right: 5px;"></i>www.dict.gov.ph<br>
                    <i class="fa fa-facebook-official" aria-hidden="true" style="margin-right: 5px;"></i>@DICT.RO9BASULTA<br>
                </div>

            </div>


            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>


    </div>

</div>

@endsection