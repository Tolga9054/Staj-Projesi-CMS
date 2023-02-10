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
                  <h6 class="c-grey-900"> Site Ayarları </h6>
                  <div class="mT-30">
                    <form enctype="multipart/form-data" action="{{ route ('admin.setting.update') }}" method="post">
                      @csrf

                      <div class="row" style="background-color:#caf4f6;">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input required type="text" class="form-control" name="email" value="{{ $data[0]['email'] }}">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Telefon</label>
                                <input required type="text" class="form-control" name="phone" value="{{ $data[0]['phone'] }}">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Year Experience</label>
                              <input required type="text" class="form-control" name="year_experience" value="{{ $data[0]['year_experience'] }}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Year Won</label>
                              <input required type="text" class="form-control" name="year_won" value="{{ $data[0]['year_won'] }}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Expart Stuff</label>
                              <input required type="text" class="form-control" name="expart_stuff" value="{{ $data[0]['expart_stuff'] }}">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="">Happy Customer</label>
                              <input required type="text" class="form-control" name="happy_customers" value="{{ $data[0]['happy_customer'] }}">
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Facebook</label>
                              <input type="text" class="form-control" name="facebook" value="{{ $data[0]['facebook'] }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Twitter</label>
                              <input type="text" class="form-control" name="twitter" value="{{ $data[0]['twitter'] }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Instagram</label>
                              <input type="text" class="form-control" name="instagram" value="{{ $data[0]['instagram'] }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Pinterest</label>
                              <input type="text" class="form-control" name="pinterest" value="{{ $data[0]['pinterest'] }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Linkedin</label>
                              <input type="text" class="form-control" name="linkedin" value="{{ $data[0]['linkedin'] }}">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="">Youtube</label>
                              <input type="text" class="form-control" name="youtube" value="{{ $data[0]['youtube'] }}">
                          </div>
                        </div>
                      </div>



                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class='row' style="border:2px solid #ddd; margin-bottom:5px;background-color:#caf4f6;">

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Site Title [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="title[{{$v['id']}}]" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,TITLE_LANGUAGE,1) }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Site Description [{{$v['name']}}]</label>
                                  <input type="text" name="description[{{$v['id']}}]" class="form-control" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,DESCRIPTION_LANGUAGE,1) }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Site Keywords [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="keywords[{{$v['id']}}]" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,KEYWORDS_LANGUAGE,1) }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Site Footer Text [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="footer_text[{{$v['id']}}]" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,FOOTER_TEXT_LANGUAGE,1) }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Banner Title [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="banner_title[{{$v['id']}}]" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,BANNER_TITLE_LANGUAGE,1) }}">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Banner Description [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="banner_description[{{$v['id']}}]" value="{{ \App\Models\LanguageContent::get($v['id'],SITE_SETTING_LANGUAGE,BANNER_DESCRIPTION_LANGUAGE,1) }}">
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
