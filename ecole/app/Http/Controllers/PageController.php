<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Image;
use File;
use Response;
use DB;
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
    public function delete($id)
    {
         $page=Page::find($id);
         if($page)
         {
             $page->delete();
             session()->flash('success','supprimer');
         }
         return back()->withInput();
    }
    
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
