<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','ASC')->get();
        return view('backend.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.articles.create',compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'


        ]);


        $article=new Article;
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->content;
        $article->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title). ".". $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }


        $article->save();
        toastr()->success('Makale Başarı ile Oluşturuldu');
       return redirect()->route('makaleler.index')->with('success','Makale Başarı ile Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();   
        return view('backend.articles.edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'


        ]);


        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->content;
        $article->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title). ".". $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }


        $article->save();
        toastr()->success('Makale Başarı ile Güncellendi');
       return redirect()->route('makaleler.index');
      
    }

    public function switch(Request $request){
        $article=Article::findOrFail($request->id);
        $article->status=$request->statu=="true" ? 1 : 0 ;
        $article->save();
      }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        toastr()->success('Makale Başarı ile Geri Dönüşüm Kutusuna Gönderildi');
        return redirect()->route('makaleler.index');
        
    }

    public function trashed(){
        $articles=Article::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.articles.trashed',compact('articles'));
    }

    public function restore($id){
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale Başarı ile Geri Gönderildi');
        return redirect()->route('makaleler.index');
    }

    public function deleteTrashed($id){

        Article::onlyTrashed()->find($id);
        if(File::exists($article->image)){
            File::delete(public_path($article->image));
        }
        die;
        $article->forceDelete();
        toastr()->success('Makale Başarı ile Silindi');
        return redirect()->route('trashed');
    }
}
