@extends('frontend.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
       

                    <div class="col-md-8 ">
                      {{$article->content}}
                      <div>
                      <span class="text-danger">
                          <b>Okunma Sayısı: {{$article->hit}}</b>
                      </span>
                      </div>
                     
                    </div>
   

    @include('frontend.widgets.categoryWidget')


                   
@endsection