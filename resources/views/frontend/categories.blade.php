
@extends('frontend.layouts.master')
@section('title',$category->name. ' Kategorisi | '. count($articles). ' yazı bulundu')
@section('content')
                <div class="col-md-8 col-xl-7">
                    <!-- Post preview-->
                @if(count($articles)>0)
                    @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="{{route('blog-single',[$article->getCategoryName->slug,$article->slug])}}">
                            <h2 class="post-title">{{$article->title}}</h2>
                            <img src="{{$article->image}}" alt="">
                            <h3 class="post-subtitle">{{\Illuminate\Support\Str::limit($article->content, 50)}}</h3>
                        </a>
                        <p class="post-meta"> Kategori:
                            <a href="#!">{{$article->getCategoryName->name}}</a>
                            <span class="float-right"> {{$article->created_at->diffForHumans()}}</span>
                        </p>
                        
                    </div>
                     @if(!$loop->last) 
                     <hr>
                     @endif
                    @endforeach
                    @else
                     <div class="alert alert-danger">
                       <h2>Bu kategoriye ait yazı bulunamadı</h2>
                     </div>
                @endif
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
               
            @include('frontend.widgets.categoryWidget')
@endsection