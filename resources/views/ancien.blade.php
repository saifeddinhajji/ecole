@extends('layouts.home')
@section('content')
    








<section class="mt-md-4 pt-md-2 mb-5 pb-4">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

               <!-- Card Data -->
               <div class="admin-up">
                <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
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
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
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
      <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

  

         <!-- Card Data -->
         <div class="admin-up">
            <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
            <div class="data">
              <p class="text-uppercase">pages total</p>
              <h4 class="font-weight-bold dark-grey-text">{{DB::table('pages')->count()}}</h4>
            </div>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-0">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">
            <!-- Card Data -->
            <div class="admin-up">
                <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                <div class="data">
                <p class="text-uppercase">Nbr  appel  l'api</p>
                <h4 class="font-weight-bold dark-grey-text">2000</h4>
                </div>
            </div>
                        
            
       

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

</section>
  <section>

   

    <!-- Top Table UI -->
    <div class="card p-2 mb-5">

      <!-- Grid row -->
      <div class="row">

        
                <div class="col-lg-3 col-md-12">  
                </div>
        
                <div class="col-lg-3 col-md-6">
                </div>
            
                <div class="col-lg-3 col-md-6">
                </div>
        
        <div class="col-lg-3 col-md-6">

          <form class="form-inline md-form mt-2 ml-2">
            <input class="form-control mt-2" type="text" placeholder="Search" style="max-width: 150px;">
            <button class="btn btn-sm btn-primary ml-2 px-1 waves-effect waves-light"><i class="fas fa-search"></i> </button>
          </form>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Top Table UI -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    <div class="card card-cascade narrower z-depth-1">

      <!-- Card image -->
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fas fa-th-large mt-0"></i></button>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fas fa-columns mt-0"></i></button>
        </div>

        <a href="" class="white-text mx-3">Table de chapitre</a>

        <div>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fas fa-eraser mt-0"></i></button>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fas fa-info-circle mt-0"></i></button>
        </div>

      </div>
      <!-- /Card image -->

      <div class="px-4">  

        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
                <tr>
                  <th>id</th>
                  <th class="th-lg"><a>Titre</a></th>
                  <th class ="th-lg"><a href="">Nombre de page</a></th>
                  <th class="th-lg"><a href="">date de creation</a></th>
                  <th class="th-lg"><a href="">derniere mise ajour</a></th>
                  <th class="th-lg"><a href="">...</a></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $chapitres=DB::table('chapitres')->get();
                @endphp

                @foreach ($chapitres as $chapitre)
                <tr>
                  <td>{{$chapitre->id}}</td>
                  <td>{{$chapitre->titre}}</td>
                  <td><span class="badge red">{{DB::table('pages')->where('chapitre_id',$chapitre->id)->count()}}</span></td>
                  <td>{{$chapitre->created_at}}</td>
                  <td>{{$chapitre->updated_at}}</td>
                  <td>
                   
                    <a class="blue-text" data-toggle="modal" data-target="#mmm{{$chapitre->id}}"> <i class="fas fa-plus"></i></a>
                  <a class="blue-text" data-toggle="tooltip" data-placement="top" title="" data-original-title="See results" href="{{route('showbook',$chapitre->id)}}" ><i class="fas fa-book"></i></a>
                      <a class="teal-text" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                      <a class="red-text" href="{{route('deletechapitre',$chapitre->id)}}" data-toggle="tooltip" data-placement="top" onclick="return confirm('Êtes-vous sûr')" title="" data-original-title="Remove"><i class="fas fa-times"></i></a>
                    {{--Modal: Contact add page --}}
                      <div class="modal fade" id="mmm{{$chapitre->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog cascading-modal" role="document">
                              <!-- Content -->
                          <form action="{{ route('savepage') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="modal-content">
                              <!-- Header -->
                              <div class="modal-header light-blue darken-3 white-text">
                                  <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un page sur {{$chapitre->titre}}</h4>
                                  <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                            
                              <!-- Body -->

                              <div class="modal-body mb-0">
                              <input type="hidden" value="{{$chapitre->id}}"name="chapitre_id">
                              <div class="md-form form-sm">
                                <input type="number" id="form19" name="num_page" class="form-control form-control-sm" required>
                                <label for="form19">Numéro page </label>
                              </div>
                             
                                     
                            <div class="md-form form-sm">
                                      <textarea type="text" name="description" class="md-textarea form-control form-control-sm"  rows="2" required></textarea>
                                      <label for="form8">description</label>
                            </div>
                           
                            <div class="md-form form-sm">
                              <i class="far fa-images"></i>
                          <input type="file" id="form21" name="image" class="form-control form-control-sm" style="width: 0.1px;
                          height: 0.1px;
                          opacity: 0;
                          overflow: hidden;
                          position: absolute;
                          z-index: -1;" accept="image/*" >
                          <label for="form21">image</label>
                        </div>
                                      <div class="text-center mt-1-half">
                                      <button class="btn btn-info mb-2">Ajouter <i class="fas fa-paper-plane ml-1"></i></button>
                                      </div>

                              </div>
                              </div>
                          </form>
                          <!-- Content -->
                        </div>
                      </div>
                    </td>
                </tr>
                 @endforeach
            </tbody>
          </table>
        </div>

        
        <div class="d-flex justify-content-between">
          <select class="mdb-select colorful-select dropdown-primary mt-2">
            <option value="" disabled="">Rows number</option>
            <option value="1" selected="">5 rows</option>
            <option value="2">25 rows</option>
            <option value="3">50 rows</option>
            <option value="4">100 rows</option>
          </select>

          <!-- Pagination -->
          <nav class="my-4">
            <ul class="pagination pagination-circle pg-blue mb-0">

              <!-- First -->
              <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">First</a></li>

              <!-- Arrow left -->
              <li class="page-item disabled">
                <a class="page-link waves-effect waves-effect" aria-label="Previous">
                  <span aria-hidden="true">«</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>

              <!-- Numbers -->
              <li class="page-item active"><a class="page-link waves-effect waves-effect">1</a></li>
              <li class="page-item"><a class="page-link waves-effect waves-effect">2</a></li>
              <li class="page-item clearfix d-none d-md-inline-block"><a class="page-link waves-effect waves-effect">3</a></li>
              <li class="page-item clearfix d-none d-md-inline-block"><a class="page-link waves-effect waves-effect">4</a></li>
              <li class="page-item clearfix d-none d-md-inline-block"><a class="page-link waves-effect waves-effect">5</a></li>

              <!-- Arrow right -->
              <li class="page-item">
                <a class="page-link waves-effect waves-effect" aria-label="Next">
                  <span aria-hidden="true">»</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>

              <!-- First -->
              <li class="page-item clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">Last</a></li>

            </ul>
          </nav>
          <!-- /Pagination -->

        </div>
        <!-- Bottom Table UI -->

      </div>
    </div>

  </section>

        <!-- Modal: Contact form -->
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal" role="document">
                <!-- Content -->
            <form action="{{ route('savechapitre') }}" method="POST" enctype="multipart/form-data">
               @csrf 
               <div class="modal-content">
                <!-- Header -->
                <div class="modal-header light-blue darken-3 white-text">
                    <h4 class=""><i class="fas fa-pencil-alt"></i> Ajouter un chapitre</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <!-- Body -->

                <div class="modal-body mb-0">
                        <div class="md-form form-sm">
                           
                            <input type="text" id="form19" name="titre" class="form-control form-control-sm" required>
                            <label for="form19">Titre </label>
                        </div>
                        
                        <div class="md-form form-sm">
                        
                        <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" name="description" rows="3" required></textarea>
                        <label for="form8">Descritpion</label>
                        </div>
                        <div class="md-form form-sm">
                          <i class="far fa-images"></i>
                          <input type="file"  name="image" class="form-control form-control-sm" style="width: 0.1px;
                          height: 0.1px;
                          opacity: 0;
                          overflow: hidden;
                          position: absolute;
                          z-index: -1;" accept="image/png,image/jpg, image/jpeg" required>
                          <label for="form21">Logo</label>
                        </div>
                        <div class="text-center mt-1-half">
                        <button class="btn btn-info mb-2">Ajouter <i class="fas fa-paper-plane ml-1"></i></button>
                        </div>

                </div>
                </div>
            </form>
            <!-- Content -->
          </div>
        </div>
@endsection