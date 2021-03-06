@extends('backend.layouts.master')
@section('title',$page->title . ' Sayfasini Güncelle')
@section('content')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           @yield('title')
                        </div>
                        <div class="card-body">

                        @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    @endif
                         <form action="{{route('pages.update',$page->id)}} " method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="form-group">
                           <label > Sayfa Başlığı</label>
                           <input type="text" name="title" value=" {{$page->title}}" class="form-control" required></input>
                           </div>
                           <div class="form-group">
                           <label > Sayfa Fotoğrafı</label>
                           <img src="{{asset($page->image)}}" alt="">
                           <input type="file" name="image" class="form-control" ></input>
                           </div>
                           <div class="form-group">
                           <label > Sayfa İçeriği</label>
                            <textarea  id="editor" name="content" class="form-control"  rows="4">{{$page->content}}</textarea>
                           </div>
                           <div class="form-group">
                            <input type="submit" class=" btn btn-primary btn-block" value="Düzenle">
                           </div>
                         </form>
                        </div>
                    </div>


              
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">   
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
         $(document).ready(function() {
  $('#editor').summernote();

});
    </script>
 
 @endsection