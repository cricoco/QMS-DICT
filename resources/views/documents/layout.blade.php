<!DOCTYPE html>
<html>

<head>
    <title>DICT - QMS Portal</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #6b819c;
            /* animation: colorchange 45s; */
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            animation-play-state: running;
        }

        @keyframes colorchange {
            0% {
                background: #45b3e0;
            }

            14% {
                background: #87ceeb;
            }

            28% {
                background: #164d94;
            }

            42% {
                background: #fbd354;
            }

            56% {
                background: #6b819c;
            }

            70% {
                background: #6b819c;
            }

            84% {
                background: #ffdada;
            }

            100% {
                background: #45b3e0;
            }

        }

        #myFooter {
            position: fixed;
            bottom: -100px;
            /* Initially hide the footer below the viewport */
            left: 0;
            width: 100%;
            background-color: #0a4275;
            color: white;
            text-align: center;
            transition: bottom 0.3s ease;
            z-index: 999;
        }
    </style>
</head>

<body>







    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" styles="background-color: #0c3b8a;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" title="Home"><img
                    src="{{ url('images_dict/dict-logo.png') }}" width="auto" height="40px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('documents') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('documents.index') }}" role="button">Masterlist</a>
                    </li>
                    <li class="nav-item {{ Request::is('documents/manuals*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('documents.manuals') }}" role="button">Manuals</a>
                    </li>
                    <li class="nav-item {{ Request::is('documents/formats*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('documents.formats') }}" role="button">Forms</a>
                    </li>
                    <li class="nav-item {{ Request::is('archives*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('archives') }}" role="button">Archives</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link"
                            href="https://docs.google.com/forms/d/e/1FAIpQLSdzaeknsFlg6QE1HLExjnBSVr6ffPINNVuTzkgOpMz681Y2kQ/viewform"
                            role="button" target="_blank">Submit New/Revision</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user_manual/DICT-QMS-User-Manual.pdf') }}" target="_blank"
                            role="button" title="User Manual"><i class="fas fa-book" style="font-size:24px"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i
                                class="fas fa-user" style="font-size:24px"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.users') }}" title="Users">
                                    Make User an Admin
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('admin.unverifiedusers') }}"
                                    title="Unverified users">
                                    Approve User
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">Welcome, {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    Change Password
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" role="button" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf

                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

    </nav>

    <div class="document-background">
        <div class="container">
            @yield('content')
        </div>

    </div>
    @yield('homeContent')
    <br><br><br><br><br>

    <section>
        <!-- Footer -->
        <footer id="myFooter" class="text-center text-white" style="background-color: #0a4275;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: CTA -->
                <section>
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-1" style="font-size: 12px;">REGIONAL OFFICE IX & BASULTA<br>DICT Building,
                            Corcuerra Extension, Zone IV, Port Area, Zamboanga City 7000, Philippines</span>
                        <!-- <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
            Sign up!
          </button> -->
                    </p>
                </section>
                <!-- Section: CTA -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); font-size: 12px;">
                <i class="fa fa-phone" aria-hidden="true" style="margin-right: 5px;"></i>(062) 991 2742
                <i class="fa fa-envelope-o" aria-hidden="true"
                    style="margin-right: 5px; margin-left: 10px;"></i>region9basulta@dict.gov.ph
                <i class="fa fa-globe" aria-hidden="true"
                    style="margin-right: 5px; margin-left: 10px;"></i>www.dict.gov.ph
                <i class="fa fa-facebook-official" aria-hidden="true"
                    style="margin-right: 5px; margin-left: 10px;"></i>@DICT.RO9BASULTA

            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    @yield('script')


    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes
<script src="../../dist/js/demo.js"></script> -->

    <script>
        window.addEventListener('scroll', function() {
            // Calculate how far the user has scrolled from the top
            var scrollPosition = window.pageYOffset || document.documentElement.scrollTop || document.body
                .scrollTop || 0;

            // Calculate the height of the viewport
            var viewportHeight = window.innerHeight || document.documentElement.clientHeight || document.body
                .clientHeight || 0;

            // Calculate the height of the entire document
            var documentHeight = Math.max(
                document.body.scrollHeight || 0,
                document.documentElement.scrollHeight || 0,
                document.body.offsetHeight || 0,
                document.documentElement.offsetHeight || 0,
                document.documentElement.clientHeight || 0
            );

            // Calculate how far from the bottom the user is (taking into account the height of the footer)
            var distanceFromBottom = documentHeight - (scrollPosition + viewportHeight);

            // If the user has scrolled to the bottom, show the footer, otherwise hide it
            if (distanceFromBottom <=
                10) { // You can adjust this value based on how close to the bottom you want the footer to appear
                document.getElementById('myFooter').style.bottom = '0';
            } else {
                document.getElementById('myFooter').style.bottom = '-100px'; // Hide the footer again
            }
        });
    </script>



</body>
<!-- Created by AdZU OJT Group April 15, 2024 to May 31, 2024 Batch -->

</html>
