<br><br>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Halaman Admin </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow">
  <a class="navbar-brand col-sm-3 col-md-4 mr-0"  href=""> {{Auth::User()->username}}</a>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ route('logoutadmin') }}">Log Out</a>
    </li>
  </ul>
</nav>






<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="navbar-brand">
            <a class="nav-link active" href="{{route('adminhome')}}">
               <span data-feather="file"></span>
              Dashboards
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allProduct') }}">
              <span data-feather="file"></span>
              Product
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allCourier') }}">
              <span data-feather="shopping-cart"></span>
              Courier
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allDiscount') }}">
              <span data-feather="users"></span>
              Discount
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allProductImage') }}">
              <span data-feather="layers"></span>
              Product Image
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allProductCategorie') }}">
              <span data-feather="bar-chart-2"></span>
              Product Categorie
            </a>
          </li>
          <li class="navbar-brand">
            <a class="nav-link" href="{{ route('allProductCategoryDetail') }}">
              <span data-feather="layers"></span>
              Product Category Detail
            </a>
          </li>
           </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>   </span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('report') }}">
              <span data-feather="file-text"></span>
              Report
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        </div>



        @if (session('status'))
            <div class="alert alert-success alert-dismissible text-center" id="myAlert">
                <button type="button" class="close">&times;</button>
                {{ session('status') }}
            </div>
            <script>
                $(document).ready(function(){
                    $(".close").click(function(){
                        $("#myAlert").alert("close");
                    });
                });
            </script>
        @endif



 @yield('content')
      </div>
        
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      </div>
      <i><b>Kelompok 9 Praktikum Prognet </b></i>
    </main>
  </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
