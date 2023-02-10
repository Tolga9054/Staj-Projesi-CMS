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
                  <h6 class="c-grey-900">Yeni Blog Kategorisi Ekle</h6>
                  <div class="mT-30">
                    <form action="{{ route ('admin.blogcategory.store') }}" method="post">
                      @csrf
                      @foreach(\App\Models\Language::all() as $k => $v)

                      <div class="row" style="border:2px solid #ddd;padding:10px 0px;margin-bottom:10px;background-color:#caf4f6;">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Adı [{{$v['name']}}]</label>
                            <input type="text" class="form-control" name="name[{{$v['id']}}]"> </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Slug [{{$v['name']}}]</label>
                            <input type="text" class="form-control" name="slug[{{$v['id']}}]"> </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Kategori Title[{{$v['name']}}]</label>
                            <input type="text" class="form-control" name="title[{{$v['id']}}]" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Kategori Description[{{$v['name']}}]</label>
                            <input type="text" class="form-control" name="description[{{$v['id']}}]" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Kategori Keywords[{{$v['name']}}]</label>
                            <input type="text" class="form-control" name="keywords[{{$v['id']}}]" >
                          </div>
                        </div>
                      </div>

                      @endforeach

                    </div><button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
