@extends('layouts.home')
@section('content')
<button style="float: right; color:green" data-toggle="modal" data-target="#modalContactForm" style="margin-right : 5px"><i class="fas fa-file " ></i></button>

<button style="float: right; color:red" data-toggle="modal" data-target="#modalupdateForm"><i class="far fa-edit"></i></button>
<br>
<br>
<br>
<nav aria-label="breadcrumb" style="background-color: #bad1e8 !important;">
  <ol class="breadcrumb" style="background-color: #bad1e8 !important;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="{{route('home')}}">Chapitres</a></li>
    <li class="breadcrumb-item"><a href="#">Detail</a></li>
  <li class="breadcrumb-item active" aria-current="page">{{$chapitre->titre}}</li>
  </ol>
</nav>



@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif





<div class="row text-center">


@foreach ($pages as $page)
    

              <!-- Grid column -->
              <div class="col-md-4 mb-4">
                <a class="btn-floating btn-secondary waves-effect " href="{{route('deletepage',$page->id)}}" onclick="return confirm('êtes-vous sûr de supprimer le page')" style="postion:relative;top:30px ; left:50%"><i class="fas fa-minus-circle"></i></a>
                <!-- Card -->
                <div class="card text-left">
          
                  <!-- Card image -->
                  <div class="view overlay">
                    <img src="https://mdbootstrap.com/img/Photos/Others/images/19.jpg" class="card-img-top" alt="">
                    <a>
                      <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                  </div>
                  <!-- Card image -->
          
                  <!-- Card content -->
                  <div class="card-body mx-4">
          
                    
                    <!-- Title -->
                    <h4 class="card-title">
                    <strong>N°:{{$page->num_page}}</strong>
                    </h4>
                    <hr>
                    <!-- Text -->
                  <p class="dark-grey-text mb-4">{{$page->description}}</p>
          
                    
                  </div>
                  <!-- Card content -->
          
                </div>
                <!-- Card -->
          
              </div>
 @endforeach           <!-- Grid column -->
</div>










                    {{--Modal: Contact add page --}}
                    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                            <input type="number" id="form19" name="num_page" value="{{DB::table('pages')->where('chapitre_id',$chapitre->id)->max('num_page')+1}}" readonly class="form-control form-control-sm" required>
                              <label for="form19">Numéro page </label>
                            </div>
                           
                            <label for="form8">description</label>
                          <div class="md-form form-sm">
                                    <textarea type="text" name="description" class="md-textarea form-control form-control-sm"  rows="2" required></textarea>
                                    
                          </div>
                         
                          <div class="md-form">
                            <div class="file-field">
                              <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                                <span>Page</span>
                                <input type="file" name="image" accept="image/png,image/jpg, image/jpeg" required>
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload your file">
                              </div>
                            </div>
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

                     {{--Modal: Contact add page --}}
                     <div class="modal fade" id="modalupdateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog cascading-modal" role="document">
                           <!-- Content -->
                       <form action="{{ route('updatechapitre',$chapitre->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf 
                         <div class="modal-content">
                           <!-- Header -->
                           <div class="modal-header light-blue darken-3 white-text">
                               <h4 class=""><i class="fas fa-pencil-alt"></i> Update chapitre  {{$chapitre->titre}}</h4>
                               <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                         
                           <!-- Body -->

                           <div class="modal-body mb-0">
                           <input type="hidden" value="{{$chapitre->id}}"name="chapitre_id">
                           <div class="md-form form-sm">
                           <input type="text" id="form19" name="titre" value="{{$chapitre->titre}}"  class="form-control form-control-sm" required>
                             <label for="form19">Titre </label>
                           </div>
                          
                           <label for="form8">description</label>
                         <div class="md-form form-sm">
                         <textarea type="text" name="description" class="md-textarea form-control form-control-sm"  rows="2" required>{{$chapitre->description}}</textarea>
                                   
                         </div>
                        
                         <hr style="border: dashed 0.5px">
                         <div class="md-form">
                          <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left waves-effect waves-light">
                              <span>photo de couverture</span>
                              <input type="file" name="image" accept="image/png,image/jpg, image/jpeg" required>
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" placeholder="Upload your file">
                            </div>
                          </div>
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