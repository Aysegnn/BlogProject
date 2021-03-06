<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use Validator;


class HomePageController extends Controller
{
  public function __construct(){
      view()->share('pages',Page::orderBy('order','ASC')->get());
      view()->share('categories',Category::get());
  } 
    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->paginate(5);
        return view('frontend.homepage',compact('articles'));
    }

    public function showPost($category,$slug)
    {
      
       $category=Category::whereSlug($category)->first() ?? abort(404,'Not Found');
       $article=Article::where('slug',$slug)->whereCategoryId($category->id)->first() ?? abort(404,'Not Found');
       $article->increment('hit');
       

      return view('frontend.post',compact('article'));
    }

    public function showCategory($slug)
    {
     
      $category=Category::whereSlug($slug)->first() ?? abort(404,'Not Found');
      $articles=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(3);
      return view('frontend.categories',compact('category','articles'));
    }

    public function page($slug)
    {
        $page=Page::whereSlug($slug)->first() ?? abort(404,'Not Found');
         return view('frontend.page',compact('page'));
        
    }

    
    public function contact()
    {
        
         return view('frontend.iletisim');
        
    }
    
    public function contactPost(Request $request){

        
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic'=>'required',
            'message'=>'required|min:10',
        ]);
        
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesaj??n??z bize iletildi..');
    }

    public function destroy($id)
    {
        //
    }
}
