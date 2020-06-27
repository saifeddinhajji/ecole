


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Administration</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('temp/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('temp/css/mdb.min.css')}}">
  <!-- Animations -->
  <link rel="stylesheet" href="{{asset('temp/css/modules/animations-extended.min.css')}}">

  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

   <!--Main Navigation-->
   <header>



    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
     
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p><strong style="font-size: 30px;color:blue">E</strong>cole</p>
      </div>

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{Auth::user()->name}}</span></a>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
            
          {{--  <a class="dropdown-item" href="#">My account</a>--}}
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Log Out</a>

            

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </div>
        </li>

      </ul>
      <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

  </header>
  <!--Main Navigation-->

  <!-- Main layout -->
  <main>
    <div class="container-fluid">
      <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">
      
          <!-- Grid column -->
          <div class="col-xl-4   col-md-6 mb-xl-0 mb-4">
      
            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
      
                   <!-- Card Data -->
                   <div class="admin-up">
                    <i class="fas fa-users light-blue lighten-1 mr-3 z-depth-2"></i>
                    
                    <div class="data">
                      <p class="text-uppercase" >users</p>
                      <h4 class="font-weight-bold dark-grey-text">{{DB::table('users')->count()}}</h4>
                    </div>
                  </div>
      
            </div>
            <!-- Card -->
      
          </div>
          <!-- Grid column -->
      
          <!-- Grid column -->
          <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
      
            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
      
              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-book warning-color mr-3 z-depth-2 "></i>
                
                <div class="data">
                  <p class="text-uppercase">chapitres</p>
                  <h4 class="font-weight-bold dark-grey-text">{{DB::table('chapitres')->count()}}</h4>
                </div>
              </div>
      
            
      
            </div>
            <!-- Card -->
      
          </div>
          <!-- Grid column -->
      
          <!-- Grid column -->
          <div class="col-xl-4 col-md-6 mb-md-0 mb-4">
      
            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">
      
      
      
             <!-- Card Data -->
             <div class="admin-up">
               
                <i class="fas fa-file red accent-2 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">pages total</p>
                  <h4 class="font-weight-bold dark-grey-text">{{DB::table('pages')->count()}}</h4>
                </div>
              </div>
            </div>
            <!-- Card -->
      
          </div>
          <!-- Grid column -->
      
      
      
        </div>
        <!-- Grid row -->
      
      </section>
@yield('content')
    </div>
  </main>
  <!-- Main layout -->

  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a target="_blank"> ecole.tn </a>

      </div>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



  <!-- SCRIPTS -->
  <!-- JQuery -->



  <!-- JQuery -->
  <script src="{{asset('temp/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('temp//js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('temp/js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('temp/js/mdb.min.js')}}"></script>
  <!--Custom scripts-->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    

  </script>
</body>

</html>