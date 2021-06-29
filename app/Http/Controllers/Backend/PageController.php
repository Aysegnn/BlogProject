<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){

        $pages=Page::all();
        return view('backend.pages.index',compact('pages'));
    }

    public function switch(Request $request){
        $pages=Page::findOrFail($request->id);
        $pages->status=$request->statu=="true" ? 1 : 0 ;
        $pages->save();
      }
}
