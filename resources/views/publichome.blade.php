@extends('publicdocuments.layout')
@section('publichomeContent')
    <div class="document-background">
        <br>
        <div class="container" width="20px" height="20px" style="background-color: white; padding: 0;">


            <div class="image-container" style="width: 100%; background-color: white; margin-top: 40px;">
                <img src="{{ url('images_dict/QMS-Portal-cover.jpg') }}" style="display: block; width: 100%; height: auto;">
            </div>
            <!-- <div class="card-header" style="background-color: white; text-align: center; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/DICT-Logo-Final-2-300x153.png/1200px-DICT-Logo-Final-2-300x153.png" width="auto" height="190px">
                                </div>
                                <div class="card-header" style="background-color: #0693e3; text-align: center; color: #ffffff; ">
                                    <h1><strong>Quality Management System</strong></h1>
                                </div> -->

            <br>
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="visionmission-tab" data-bs-toggle="tab"
                        data-bs-target="#visionmission-tab-pane" type="button" role="tab"
                        aria-controls="visionmission-tab-pane" aria-selected="true">Vision & Mission</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="qualitypolicy-tab" data-bs-toggle="tab"
                        data-bs-target="#qualitypolicy-tab-pane" type="button" role="tab"
                        aria-controls="qualitypolicy-tab-pane" aria-selected="false">Quality Policy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="r9basulta-tab" data-bs-toggle="tab" data-bs-target="#r9basulta-tab-pane"
                        type="button" role="tab" aria-controls="r9basulta-tab-pane" aria-selected="false">Quality
                        Objectives</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact
                        Us</button>
                </li>


            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="visionmission-tab-pane" role="tabpanel"
                    aria-labelledby="visionmission-tab" tabindex="0"><br>
                    <h1 class="entry-title text-center"><strong>Mission and Vision</strong></h1>
                    <br><br>
                    <div class="card-body">
                        <strong>Mission</strong>
                        <i>DICT of the people and for the people.”</i>
                        <p>The Department of Information and Communications Technology commits to:</p>

                        <ul>
                            <li>Provide every Filipino access to vital ICT infostructure and services</li>
                            <li>Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more
                                jobs</li>
                            <li>Establish a One Digitized Government, One Nation</li>
                            <li>Support the administration in fully achieving its goals</li>
                            <li>Be the enabler, innovator, achiever and leader in pushing the country’s development and
                                transition towards a world-class digital economy</li>
                        </ul>

                        <strong>Vision</strong>
                        <i>An innovative, safe and happy nation that thrives through and is enabled by Information and
                            Communications T</i>

                        <p>DICT aspires for the Philippines to develop and flourish through innovation and constant
                            development of ICT in the pursuit of a progressive, safe, secured, contented and happy Filipino
                            nation.</p>

                        <strong>Core Values</strong>

                        <p>D – Dignity<br>
                            I – Integrity<br>
                            C – Competency and Compassion<br>
                            T – Transparency
                        </p>
                    </div>
                </div>

                <div class="tab-pane fade" id="qualitypolicy-tab-pane" role="tabpanel" aria-labelledby="qualitypolicy-tab"
                    tabindex="0"><br>
                    <h3 class="entry-title text-center"><strong>QUALITY POLICY</strong></h3>
                    <p class="entry-title text-center"><i>QPL/r0/01Feb24</i></p>
                    <div class="card-body" style="font-size: 16px;"><br>
                        <strong>The Department of Information and Communications Technology RIX BASULTA commits to:
                        </strong><br>
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

                <div class="tab-pane fade" id="r9basulta-tab-pane" role="tabpanel" aria-labelledby="r9basulta-tab"
                    tabindex="0"><br>
                    <h3 class="entry-title text-center"><strong>DICT REGIONAL OFFICE IX AND BASULTA QUALITY
                            OBJECTIVES</strong></h3>
                    <p class="entry-title text-center"><i>QP-01/r0/01Feb24</i></p>
                    <div class="card-body" style="font-size: 16px;">
                        <ol>
                            <li>
                                To deliver the required ICT products and services according to mutually agreed terms and
                                conditions and existing applicable statutory and regulatory requirements;
                            </li>

                            <li>
                                To ensure the effective implementation, compliance and continuous improvement of the Quality
                                Management System in order to meet customer requirements; and
                            </li>

                            <li>
                                To monitor and evaluate adherence to the agency's Key Performance Indicators (KPI) on
                                quality, efficiency and timeliness.
                            </li>
                        </ol>
                    </div>
                    <br>
                    <h3 class="entry-title text-center"><strong>ADMINISTRATIVE AND FINANCE DIVISION (AFD) QUALITY
                            OBJECTIVES</strong></h3>
                    <p class="entry-title text-center"><i>QO-02/r2/18Jun24</i></p>
                    <div class="card-body" style="font-size: 16px;">
                        <ol>
                            <li>
                                To ensure that all Human Resource Systems are in place in terms of Recruitment,
                                Selection and Placement; Learning and Development; Performance Management;
                                and Rewards and Recognition with 100% compliance to the Civil Service
                                Commission’s Program to Institutionalize Meritocracy and Excellence in Human
                                Resource Management (PRIME-HRM);
                            </li>

                            <li>
                                To ensure efficient and effective financial management, disbursements, monitoring
                                and reporting of all statutory/regulatory and legal requirement of government
                                monitoring agencies thru accurate and timely preparation, verification, certification
                                and submission of financial statements and reports to include monthly, quarterly
                                and annual Financial Statements and other related reports shall be done in the
                                prescribed deadlines.
                            </li>

                            <li>
                                To ensure timely preparation and submission of annual budget of the Regional
                                Office are accurate and accomplished within the prescribed period set by the DICT
                                Central Office, the Department of Budget and Management (DBM), and other
                                concerned government agencies. To monitor budget utilization rate at 90%.
                            </li>
                            <li>
                                To maintain complete inventory of property, plant and equipment (PPE) and
                                efficient process of provision of supply in the office and equipment to property
                                custodians.
                            </li>
                            <li>
                                To maintain 90% of the buildings and facilities as well as the 100% of the official
                                vehicles in good condition to provide personnel conducive workspaces and ensure
                                safe travels respectively.
                            </li>
                            <li>
                                Ensure 100% accuracy and traceability of incoming and outgoing documents,
                                achieve full compliance with statutory and regulatory requirements for document
                                retention and disposal, and guarantee delivery of documents to the designated
                                division or unit within 24 hours of receipt.
                            </li>
                            <li>
                                To attain at least a very satisfactory customer satisfaction rating from 80% of
                                customers surveyed.
                            </li>
                        </ol>
                    </div>
                    <br>
                    <h3 class="entry-title text-center"><strong>TECHNICAL OPERATIONS DIVISION (TOD) QUALITY
                            OBJECTIVES</strong></h3>
                    <p class="entry-title text-center"><i>QO-03/r1/18Jun24</i></p>
                    <div class="card-body" style="font-size: 16px;">
                        <ol>
                            <li>To deliver required ICT products and services in accordance with agreed terms and conditions
                                and all applicable statutory and regulatory requirements;</li>
                            <li>To ensure at least 90% uptime for Point-of-Presence (POP) operations of Free Wi-Fi for All
                                sites and Government Network (GovNet) sites;</li>
                            <li>To ensure ICT equipment is available 100% of the time for emergency response and
                                coordination during disasters;</li>
                            <li>To achieve a 100% target in conducting ICT capability development training to enhance
                                participants' skills and knowledge;</li>
                            <li>To achieve 100% of the target in Philippine National Public Key Infrastructure (PNPKI)
                                orientation for stakeholders and issuance of digital certificates to all targeted clients;
                            </li>
                            <li>To achieve a 100% target in conducting the ICT Proficiency Diagnostic Examination and ICT
                                Proficiency Certification, assessing individuals' competence in programming, systems
                                analysis, and design functions as per PD 1408;</li>
                            <li>To annually organize a Regional Startup Pitching Competition, showcasing the most innovative
                                business ideas and entrepreneurial talents within the region; and</li>
                            <li>To attain at least a very satisfactory customer satisfaction rating from 80% of customers
                                surveyed.</li>
                        </ol>
                    </div>
                </div>



                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0"><br>
                    <div class="card-body text-center">
                        <img src="{{ url('images_dict/DMT-Members.jpg') }}"
                            style="display: block; width: 100%; height: auto;">

                    </div>

                    <h3 class="entry-title text-center"><strong>Contact Us</strong></h3>
                    <div class="card-body text-center">
                        <i class="fa fa-phone" aria-hidden="true" style="margin-right: 5px;"></i>(062) 991 2742<br>
                        <i class="fa fa-envelope-o" aria-hidden="true"
                            style="margin-right: 5px;"></i>region9basulta@dict.gov.ph<br>
                        <i class="fa fa-globe" aria-hidden="true" style="margin-right: 5px;"></i>www.dict.gov.ph<br>
                        <i class="fa fa-facebook-official" aria-hidden="true"
                            style="margin-right: 5px;"></i>@DICT.RO9BASULTA<br>
                    </div>

                </div>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>


        </div>

    </div>
@endsection
