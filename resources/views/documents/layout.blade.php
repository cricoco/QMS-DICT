<!DOCTYPE html>
<html>
<head>
    <title>DICT - QMS Portal</title>

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
    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">  
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Library</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('documents.index') }}">Documents</a></li>
            <li><a class="dropdown-item" href="{{ url('manuals?search=manual') }}">Manuals</a></li>
            <li><a class="dropdown-item" href="{{ url('formats?search=form') }}">Forms</a></li>
          </ul>
        </li>
      </ul> 
    <!-- <form class="d-flex" style="margin-right: 440px;">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
    </form> -->
    <form action="{{ route('documents.index') }}" method="GET" class="d-flex" style="margin-right: 440px;">
        <input class="form-control me-2" type="text" placeholder="Search" name="search">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>



    <a class="navbar-brand" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
  </div>
</nav>
    </br>
<div class="document-background">   
    <div class="container">
        @yield('content')
    </div>
</div>
@yield('homeContent')


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



<div class="container" style="background: black;">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Company, Inc</p>
  </footer>
</div>