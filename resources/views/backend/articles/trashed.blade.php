@extends('backend.layouts.master')
@section('title','Silinen Makaleler')
@section('content')


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button onclick="window.history.back();"class="btn btn-sm btn-warning float-right"><i class="fas fa-reply"> Geri Dön</i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Makale Başlığı</th>
                                            <th>Kategori</th>
                                            <th>Görüntülenme Sayısı</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($articles as $article)
                                        <tr>
                                            <td>
                                              <img src="{{$article->image}}" width="200" >
                                            </td>
                                            <td>{{$article->title}}</td>
                                            <td>{{$article->getCategoryName->name}}</td>
                                            <td>{{$article->hit}}</td>
                                            <td>{{$article->created_at->diffForHumans()}}</td>
                                            <td>
                                                
                                                <a href="{{route('restore',$article->id)}}" title="Geri Yükle" class="btn btn-sm btn-warning"> <i class="fa fa-undo"></i></a>
                                                <a href="{{route('deleteTrashed',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
              
@endsection
