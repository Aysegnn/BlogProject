<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

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

      
    public function create(){
    
        return view('backend.pages.create');
      }

      public function store(Request $request)
      {
  
          $request->validate([
            
              'title'=>'min:3',
              'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
  
  
          ]);
  
          $last=Page::orderBy('order','desc')->first();
          $page=new Page;
          $page->title=$request->title;
          $page->content=$request->content;
          $page->order=$last->order+1;
          $page->slug=Str::slug($request->title);
  
          if($request->hasFile('image')){
              $imageName=Str::slug($request->title). ".". $request->image->getClientOriginalExtension();
              $request->image->move(public_path('uploads'),$imageName);
              $page->image='uploads/'.$imageName;
          }
  
  
          $page->save();
          toastr()->success('Sayfa Başarı ile Oluşturuldu');
         return redirect()->route('pages.index')->with('success','Sayfa Başarı ile Oluşturuldu');
      }

      public function edit($id)
      {
          $page=Page::findOrFail($id);
          return view('backend.pages.edit',compact('page'));
      }

      public function update(Request $request, $id)
      {
          $request->validate([
            
              'title'=>'min:3',
              'image'=>'image|mimes:jpeg,png,jpg|max:2048'
  
  
          ]);
  
  
          $page=Page::findOrFail($id);
          $page->title=$request->title;
          $page->content=$request->content;
          $page->slug=Str::slug($request->title);
  
          if($request->hasFile('image')){
              $imageName=Str::slug($request->title). ".". $request->image->getClientOriginalExtension();
              $request->image->move(public_path('uploads'),$imageName);
              $page->image='uploads/'.$imageName;
          }
  
  
          $page->save();
          toastr()->success('Sayfa Başarı ile Güncellendi');
         return redirect()->route('pages.index');
        
      }

      public function destroy($id)
      {
          Page::find($id)->delete();
          toastr()->success('Sayfa Başarı ile Silindi');
          return redirect()->back();
          
      }

      public function orders(Request $request)
      {
          foreach($request->get('page') as $key =>$order){
              Page::where('id',$order)->update(['order'=>$key]);
          }
          
      }
}
