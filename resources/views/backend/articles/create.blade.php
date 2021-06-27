@extends('backend.layouts.master')
@section('title','Makale Oluştur')
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
                         <form action="{{route('makaleler.store')}} " method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="form-group">
                           <label > Makale Başlığı</label>
                           <input type="text" name="title" class="form-control" required></input>
                           </div>
                           <div class="form-group">
                           <label > Makale Kategorisi</label>
                           <select name="category" class="form-control" required>
                            <option value="">Seçim Yapınız</option>
                                @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                           </select>
                           </div>
                           <div class="form-group">
                           <label > Makale Fotoğrafı</label>
                           <input type="file" name="image" class="form-control" required></input>
                           </div>
                           <div class="form-group">
                           <label > Makale İçeriği</label>
                            <textarea  id="editor" name="content" class="form-control"  rows="4"></textarea>
                           </div>
                           <div class="form-group">
                            <input type="submit" class=" btn btn-primary btn-block" value="Oluştur">
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