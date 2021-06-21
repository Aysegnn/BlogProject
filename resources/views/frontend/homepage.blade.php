
@extends('frontend.layouts.master')
@section('title','Anasayfa')
@section('content')
  <div class="col-md-8 mx-auto">
    @include('frontend.widgets.articleListWidget')
</div>
 @include('frontend.widgets.categoryWidget')
@endsection