<!DOCTYPE html>
<html>

<head>
  <title>DICT - QMS Portal</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .document-background {
      background-color: #6e70f5;
      animation: colorchange 45s;
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
  </style>
</head>

<body>







  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" styles="background-color: #0c3b8a;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/DICT-Logo-icon_only.png" width="auto" height="40px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('publicdocuments.index') }}" role="button">Documents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('publicdocuments.manuals') }}" role="button">Manuals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('publicdocuments.formats') }}" role="button">Forms</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Welcome, {{ Auth::user()->name }}</a>
            <ul class="dropdown-menu">
              <!-- <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
              </li> -->

              <li>
                <a class="dropdown-item" role="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
      @yield('publiccontent')
    </div>
  </div>
  @yield('publichomeContent')

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  @yield('pubscript')

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes
<script src="../../dist/js/demo.js"></script> -->

</body>

</html>


<section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">DICT IX</span>
          <!-- <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
            Sign up!
          </button> -->
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © Department of Information and Communications Technology:
      <a class="text-white" href="https://mdbootstrap.com/">dict.gov.ph</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>

