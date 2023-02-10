@extends('layouts.app')
@section('content')
  <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
              <div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary"> {{session("status")}} </div>
                @endif
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Yeni Proje Ekle</h6>
                  <div class="mT-30">
                    <form enctype="multipart/form-data" action="{{ route ('admin.project.store') }}" method="post">
                      @csrf

                      <div class="row" style="background-color:#caf4f6;">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Proje Resmi</label>
                                  <input type="file" class="form-control" name="image" >
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Proje URL</label>
                                <input type="text" class="form-control" name="url">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="">Sayfa Gösterimi</label>
                            <select class="form-control" name="isShow">
                              <option value="0">Aktif</option>
                              <option value="1">Pasif</option>
                            </select>
                          </div>

                      </div>


                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class='row' style="border:2px solid #ddd; margin-bottom:5px;background-color:#caf4f6;">

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Proje Adı [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="name[{{$v['id']}}]">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Proje Açıklaması [{{$v['name']}}]</label>
                                  <input type="text" name="text[{{$v['id']}}]" class="form-control">
                              </div>
                          </div>

                      </div>
                    @endforeach

                    <button type="submit" class="mt-3 btn btn-primary">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endsection
