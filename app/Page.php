<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
  
    protected $fillable =['description','num_page','image','chapitre_id'] ;
   //public    $timestamps->updated_at = false_id;

       public function chapitre(){
      return $this->belongsTo('App\Chapitre');
      }
      
}
