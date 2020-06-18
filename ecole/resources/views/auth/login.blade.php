
  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
 <!-- Bootstrap core CSS -->
 <link href="{{ asset('temp/css/bootstrap.min.css')}}" rel="stylesheet">
 <!-- Material Design Bootstrap -->
 <link href="{{ asset('temp/css/mdb.min.css')}}" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
</style>
  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">

      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

     

      <!-- Breadcrumb -->
      <div class="breadcrumb-dn mr-auto">
        <p ><a href="{{route('home')}}"><i class="fas fa-home" style="color:blue"></i></a></p>
      </div>



    </nav>
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
  <main>
    <div class="container-fluid">

      <!--Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4">

         
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4 col-md-6 mb-4">

          <!--Card -->
          <div class="card">

            <!--Card content -->
            <div class="card-body">

              <!-- Register form -->
              <form method="POST" action="{{route('login')}}">
                @csrf
                <p class="h5 text-center mb-4">Login</p>

               
                <div class="md-form">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="text" id="orangeForm-email" name="email" class="form-control">
                  <label for="orangeForm-email"> email</label>
                </div>

                <div class="md-form">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="orangeForm-pass" name="password"class="form-control">
                  <label for="orangeForm-pass"> password</label>
                </div>

                <div class="text-center mt-4">
                  <button  type="submit" class="btn btn-deep-orange">Login</button>
                </div>

              </form>
              <!-- Register form -->

            </div>

          </div>
          <!--Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4 col-md-6 mb-4">

        </div>
        <!-- Grid column -->

      </div>
      <!--Grid row -->

      <hr class="my-5">


    </div>
  </main>
  <!-- Main layout -->

  <!-- Footer -->

  <!-- Footer -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="{{asset('temp/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('temp/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('temp/js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('temp/js/mdb.min.js')}}"></script>
  <!--Custom scripts -->
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
  <!--Google Maps -->
  <script src="https://maps.google.com/maps/api/js"></script>

  <script>
    function init_map() {

      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,

        zoom: 14
      };

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var_marker.setMap(var_map);

    }

    google.maps.event.addDomListener(window, 'load', init_map);

  </script> 
</body>

</html>