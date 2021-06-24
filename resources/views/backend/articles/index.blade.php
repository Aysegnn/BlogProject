@extends('backend.layouts.master')
@section('title','Tüm Makaleler')
@section('content')


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-right"><strong>{{$articles->count()}}</strong> makale bulundu</h6>
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
                                            <th>Durum</th>
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
                                            <td>{!!$article->status== 0 ? "<span class='text-danger'>Pasif</span> " : "<span class='text-success'>Aktif</span>"!!}</td>
                                            <td>
                                                <a href="" title="Görüntüle" class="btn btn-sm btn-success"> <i class="fa fa-eye">Görüntüle</i> </a>
                                                <a href="" title="Düzenle" class="btn btn-sm btn-primary"> <i class="fa fa-pen">Düzenle</i> </a>
                                                <a href="" title="Sil" class="btn btn-sm btn-danger"> <i class="fa fa-times">sil</i> </a>
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