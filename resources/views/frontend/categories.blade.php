
@extends('frontend.layouts.master')
@section('title',$category->name. ' Kategorisi | '. count($articles). ' yazı bulundu')
@section('content')
 <div class="col-md-8 col-xl-7">
     @include('frontend.widgets.articleListWidget')
</div>
 @include('frontend.widgets.categoryWidget')
@endsection