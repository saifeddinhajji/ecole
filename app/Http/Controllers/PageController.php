<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Image;
use File;
use Response;
use DB;
use App\Chapitre;
use Auth;
class PageController extends Controller
{

    public function addpage(Request $request)
    {
        
        $this->validate($request, [
                'description' => ['required'],
                'image' => ['required','image','mimes:jpeg,png,jpg,tiff|max:2048'],
                'num_page' =>['integer','required'],
                'chapitre_id'=>['integer','required'],

                ]);
             
                $filename='';
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save( public_path('/upload/pages/' . $filename) );
                $page= new Page;
                $page->num_page=$request->input('num_page');
                $page->description=$request->input('description');
                $page->image="http://localhost:8000/upload/pages/".$filename;
                $page->chapitre_id=$request->input('chapitre_id');
                $page->save();
                session()->flash('success','la nouvelle page a été enregistrer correctement!');
                
             
        return back()->withInput();
           
    }

  

  
public function deletepage($id)
{
    $page=Page::find($id);
         if($page)
         {
             $page->delete();
             session()->flash('success','la suppression  de page terminée avec succès');
         }
         return back()->withInput();
}
}
