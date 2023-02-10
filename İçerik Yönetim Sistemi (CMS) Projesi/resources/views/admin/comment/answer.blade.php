@extends('layouts.app')
@section('content')

    <div id="mainContent">
        <div class="row gap-20 ">
            <div class=" col-md-6"></div>
            <div class="col-md-12">
                @if(session("status"))
                    <div class="alert alert-primary"> {{session("status")}} </div>
                @endif
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Yoruma cevap ver</h6>
                    <div class="mT-30">
                        <p>{{ $data[0]['text'] }}</p>
                        <form action="{{ route ('admin.comment.store',['id'=>$data[0]['id']]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cevabın</label>
                                <textarea name="text" class="form-control" id="" cols="30" rows="10">{{ \App\Models\CommentAnswer::getMessage($data[0]['id']) }}</textarea>
                            </div>

                    <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
