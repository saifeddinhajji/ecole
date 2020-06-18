@extends('layouts.home')
@section('content')

<section class="section pt-4">

    <!-- Grid row -->
    <div class="row">
      @foreach ($pages as $page)
    

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

          <img src="{{$page->image}}" class="img-fluid" style="margin: 30px 5px 5px 30px">

            <a>

              <div class="mask rgba-white-slight waves-effect waves-light"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
          <p>{{$page->description}}</p>



            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>Numero de page:{{$page->num_page}}</strong></span>

               

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->
      @endforeach

    </div>
    <!-- Grid row -->



   
  

  </section>
{{$chapitre}}

@endsection