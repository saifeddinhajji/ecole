<?php

namespace App\Http\Controllers;

use App\Chapitre;
use Illuminate\Http\Request;
use Image;
use File;
use Response;
use DB;
use Auth;
use App\Page;
class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
public function getallchapitre(){
    return response()->json(Chapitre::with(['pages' => function($query){
        $query->orderby('num_page');
    }])->groupBy('id')->get(),200);
}
    public function addchapitre(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required|string',
            'description' =>'required|string|',
            'image' => ['image','mimes:jpeg,png,jpg,tiff|max:2048'],
            
                                      ]);
                 $filename='';
                  $image = $request->file('image');
                  $filename = time() . '.' . $image->getClientOriginalExtension();
                 Image::make($image)->save( public_path('/upload/chapitres/' . $filename ) );
                $chapitre= new Chapitre;
                $chapitre->titre=$request->input('titre');
                $chapitre->image="http://localhost:8000/upload/pages/".$filename;
                $chapitre->description=$request->input('description');
                $chapitre->user_id=Auth::user()->id;
                $chapitre->save();
                session()->flash('success','la nouvelle chapitre a été enregistrer correctement!');
                return back()->withInput();
               
    }
    public function delete($id)
    {
         $chapitre=Chapitre::find($id);
         if($chapitre)
         {
             $chapitre->delete();
             session()->flash('success','supprimer');
         }
         return back()->withInput();
    }
    public function updatelocal(Request $request,$id)
    {

    }
    public function showbook($id)
    {
        $chapitre=Chapitre::find($id);
        if(!$chapitre)
        {
            return back()->withInput();
        }
       $pages=Page::where('chapitre_id',$id)->orderby('num_page')->get();
       return view('detailbooks')->with(['chapitre'=>$chapitre,'pages'=>$pages]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapitre $chapitre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapitre $chapitre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapitre $chapitre)
    {
        //
    }
}
