@extends('layouts.home')
@section('content')

<button style="float: right; color:green" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-book-medical"></i></button>
<br>
<br>
<nav aria-label="breadcrumb" style="background-color: #bad1e8 !important;">
  <ol class="breadcrumb" style="background-color: #bad1e8 !important;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">chapitres</a></li>
    <li class="breadcrumb-item active" aria-current="page">All</li>
  </ol>
</nav>
<div class="row  mb-4 mr-3">
    @foreach ($chapitres as $chapitre)
        

      <!-- Grid column -->
      <div class="col-md-4 my-3">
        
        <a class="btn-floating btn-secondary waves-effect waves-light" href="{{route('deletechapitre',$chapitre->id)}}" onclick="return confirm('êtes-vous sûr de supprimer le chapitre')" style="postion:relative;top:30px ; left:85%"><i class="fas fa-minus-circle"></i></a>
        
        <!-- Card -->
        <div class="card">
        
          <!-- Card image -->
          <div class="view overlay">

          <img src="{{$chapitre->image}}" class="card-img-top" alt="sample image">

            <a>

              <div class="mask rgba-white-slight waves-effect waves-light"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Button -->
          <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3 waves-effect waves-light" href="{{route('showbook',$chapitre->id)}}"><i class="fas fa-chevron-right"></i></a>

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
          <h4 class="card-title"><strong>{{$chapitre->titre}}</strong></h4>

            <hr>

            <!-- Text -->
            <p class="card-text">
            
              {{$chapitre->description}}
            </p>

          </div>
          <!-- Card content -->

          <!-- Card footer -->
          <div class="mdb-color lighten-3 text-center">

            <ul class="list-unstyled list-inline font-small mt-3">

            <li class="list-inline-item pr-2 white-text"><i class="far fa-clock-o pr-1"></i>{{$chapitre->created_at}}</li>

              <li class="list-inline-item pr-2"><a href="#" class="white-text">N* de page:{{DB::table('pages')->where('chapitre_id',$chapitre->id)->count()}}</a></li>

            

            
            </ul>

          </div>
          <!-- Card footer -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->
      @endforeach
      <br>
  <div style="text-align: center"> {{ $chapitres->links() }}</div>
     
  
</div>


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
                 <label for="form8">Descritpion</label>
                 <div class="md-form form-sm">
                 
                 <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" name="description" rows="3" required></textarea>
                
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
                 <button class="btn btn-info mb-2 float-right ">Ajouter <i class="fas fa-paper-plane ml-1"></i></button>
                 </div>

         </div>
         </div>
     </form>
     <!-- Content -->
   </div>
 </div>

@endsection