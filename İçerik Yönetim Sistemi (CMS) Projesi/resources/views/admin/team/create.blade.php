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
                  <h6 class="c-grey-900">Takım Arkadaşı Ekle</h6>
                  <div class="mT-30">
                    <form enctype="multipart/form-data" action="{{ route ('admin.team.store') }}" method="post">
                      @csrf

                      <div class="row" style="background-color:#caf4f6;">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Profil Resmi</label>
                                  <input type="file" class="form-control" name="image" >
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ad Soyad</label>
                                <input required type="text" class="form-control" name="name">
                            </div>
                          </div>

                      </div>


                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class='row' style="border:2px solid #ddd; margin-bottom:5px;background-color:#caf4f6;">

                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Pozisyon [{{$v['name']}}]</label>
                                  <input type="text" class="form-control" name="position[{{$v['id']}}]">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Açıklama [{{$v['name']}}]</label>
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
