<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->paginate(5);
        $categories=Category::get();
        return view('frontend.homepage',compact('categories','articles'));
    }

   


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function showPost($category,$slug)
    {
      
       $category=Category::whereSlug($category)->first() ?? abort(404,'Not Found');
       $article=Article::where('slug',$slug)->whereCategoryId($category->id)->first() ?? abort(404,'Not Found');
       $article->increment('hit');
       $categories=Category::get();

      return view('frontend.post',compact('article'));
    }

    public function showCategory($slug)
    {
    $categories=Category::get();
      $category=Category::whereSlug($slug)->first() ?? abort(404,'Not Found');
      $articles=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(3);
      return view('frontend.categories',compact('category','articles','categories'));
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
