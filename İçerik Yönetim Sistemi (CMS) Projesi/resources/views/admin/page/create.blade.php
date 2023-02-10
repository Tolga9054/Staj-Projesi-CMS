@extends('layouts.app')
@section('content')
  <div id="mainContent">
            <div class="row gap-20 ">
              <div class="col-md-6"></div>
              <div class="col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary"> {{session("status")}} </div>
                @endif
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Yeni Sayfa Ekle</h6>
                  <div class="mT-30">
                    <form enctype="multipart/form-data" action="{{ route ('admin.page.store') }}" method="post">
                      @csrf

                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class='row' style="border:2px solid #ddd; margin-bottom:5px;background-color:#caf4f6;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sayfa Resmi [{{$v['name']}}]</label>
                                <input type="file" class="form-control" name="image[{{$v['id']}}]" id="exampleInputEmail1">
                            </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Sayfa Adı [{{$v['name']}}]</label>
                                  <input type="text" class="slug-name form-control" name="name[{{$v['id']}}]">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Sayfa URL [{{$v['name']}}]</label>
                                  <input type="text" class="slug-url form-control" name="slug[{{$v['id']}}]">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Servis Title [{{$v['name']}}]</label>
                                  <input type="text" name="title[{{$v['id']}}]" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Sayfa Description [{{$v['name']}}]</label>
                                  <input type="text" name="description[{{$v['id']}}]" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                  <label for="">Sayfa Keywords[{{$v['name']}}]</label>
                                  <input type="text" name="keywords[{{$v['id']}}]" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">İçerik [{{$v['name']}}]</label>
                                  <textarea style="height:150px;" type="text" name="text[{{$v['id']}}]" class="ckeditor"></textarea>
                              </div>
                          </div>
                      </div>
                    @endforeach
                    <div class="row" style="background-color:#caf4f6;">
                      <div class="col-md-12">
                        <label for="">Sayfa Gösterimi</label>
                        <select class="form-control" name="isShow">
                          <option value="0">Aktif</option>
                          <option value="1">Pasif</option>
                        </select>
                      </div>
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endsection
