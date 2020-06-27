<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $table = 'chapitres';
  
    protected $fillable =['description','titre','image','user_id'] ;
   //public    $timestamps->updated_at = false_id;

       public function chapitre(){
      return $this->belongsTo('App\Chapitre');
      }
      public function pages(){
        return $this->hasMany('App\Page');
      }
}
