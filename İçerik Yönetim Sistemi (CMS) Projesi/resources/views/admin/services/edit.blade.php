@extends('layouts.app')
@section('content')
  <div id="mainContent">
            <div class="row gap-20">
              <div class="col-md-6"></div>
              <div class="col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary"> {{session("status")}} </div>
                @endif
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Servis Düzenle</h6>
                  <div class="mT-30">
                    <form enctype="multipart/form-data" action="{{ route ('admin.services.update',['id'=>$data[0]['id']]) }}" method="post">
                      @csrf

                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class='row' style="border:2px solid #8d8d8d; margin-bottom:5px;background-color:#caf4f6;padding:10px 0px;">

                        @if(\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,IMAGE_LANGUAGE,$data[0]['id'])!="")
                          <div class="col-md-12">
                            <img style="width:150px;" src="{{asset(\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,IMAGE_LANGUAGE,$data[0]['id']))}}" alt="">

                          </div>
                        @endif

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Servis Detay Resim [{{$v['name']}}]</label>
                                <input type="file" class="form-control" name="image[{{$v['id']}}]" id="exampleInputEmail1">
                            </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Servis Adı [{{$v['name']}}]</label>
                                  <input type="text" class="slug-name form-control" name="name[{{$v['id']}}]" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,NAME_LANGUAGE,$data[0]['id'])}}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Servis URL [{{$v['name']}}]</label>
                                  <input type="text" class="slug-url form-control" name="slug[{{$v['id']}}]" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,SLUG_LANGUAGE,$data[0]['id'])}}" >
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="">Servis Title [{{$v['name']}}]</label>
                                  <input type="text" name="title[{{$v['id']}}]" class="form-control" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,TITLE_LANGUAGE,$data[0]['id'])}}">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="">Servis Description [{{$v['name']}}]</label>
                                  <input type="text" name="description[{{$v['id']}}]" class="form-control" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,DESCRIPTION_LANGUAGE,$data[0]['id'])}}">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="">Servis Keywords[{{$v['name']}}]</label>
                                  <input type="text" name="keywords[{{$v['id']}}]" class="form-control" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,KEYWORDS_LANGUAGE,$data[0]['id'])}}">
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="">Servis Anasayfa Yazısı [{{$v['name']}}]</label>
                                  <input type="text" name="home_text[{{$v['id']}}]" class="form-control" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,HOME_DESCRIPTION_LANGUAGE,$data[0]['id'])}}">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">İçerik [{{$v['name']}}]</label>
                                  <textarea type="text" name="text[{{$v['id']}}]" class="ckeditor" cols='30' rows="10" value="{{\App\Models\LanguageContent::get($v['id'],SERVICE_LANGUAGE,TEXT_LANGUAGE,$data[0]['id'])}}" ></textarea>
                              </div>
                          </div>
                      </div>
                    @endforeach
                    <div class="row" style="background-color:#caf4f6;">
                      <div class="col-md-6">
                        <label for="">Anasayfa Gösterimi</label>
                        <select class="form-control" name="isHome">
                          <option @if($data[0]['isHome']==0) selected @endif value="0">Aktif</option>
                          <option @if($data[0]['isHome']==1) selected @endif value="1">Pasif</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="">Anasayfa Icon</label>
                        <input type="text" name="icon" class="form-control" value="{{$data[0]['icon']}}">
                      </div>
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary">Düzenle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endsection
