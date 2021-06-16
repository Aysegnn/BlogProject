
@extends('frontend.layouts.master')
@section('title','Anasayfa')
@section('content')
        <!-- Main Content-->
  
                <div class="col-md-8 col-xl-7">
                    <!-- Post preview-->

                    @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{$article->title}}</h2>
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
                    
                    
                    <!-- Pager-->
                    <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> -->
                </div>
               
            @include('frontend.widgets.categoryWidget')
@endsection