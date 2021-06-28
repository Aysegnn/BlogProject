<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        return view('backend.categories.index',compact('categories'));
    }

    public function switch(Request $request){
        $category=Category::findOrFail($request->id);
        $category->status=$request->statu=="true" ? 1 : 0 ;
        $category->save();
      }

      public function create(Request $request){
         
        $isExist=Category::whereSlug(Str::slug($request->category))->first();
        if($isExist){
            toastr()->error($request->category. ' adında bir kategori zaten mevcut');
            return redirect()->back();
        }

         $category=new Category;
         $category->name=$request->category;
         $category->slug=Str::slug($request->category);
         $category->save();
         toastr()->success('Kategori Başarı ile Oluşturuldu');
         return redirect()->route('categories');

      }
      public function update(Request $request){
        $isSlug=Category::whereSlug(Str::slug($request->slug))->whereNotIn('id',[$request->id])->first();
        $isName=Category::whereName($request->category)->whereNotIn('id',[$request->id])->first();
        if($isSlug or $isName){
          toastr()->error($request->category.' adında bir kategori zaten mevcut!');
          return redirect()->back();
        }
  
        $category = Category::find($request->id);
        $category->name=$request->category;
        $category->slug=Str::slug($request->slug);
        $category->save();
        toastr()->success('Kategori Başarıyla Güncellendi');
        return redirect()->back();
      }

      public function getData(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
      }

      
}
