@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
<div class="col col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading m-3">
            <h2> 商品情報編集 　ID: {{$item->id}}</h2>
        </div>
        <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{url('items/edit/'.$item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">名前</label>
                    <input type="text" id="name" maxlength="100"  value="{{old('name',$item->name)}}" name="name" class="form-control" />
                </div>
                <div class="form-group mb-3">
                    <label for="type">種別</label>
                    <select id="type" name="type" class="form-control">
                        @foreach(\App\Models\Item::TYPE as $key => $val)
                            <option
                                value="{{ $key }}"
                                {{ $key == old('type',$item->type) ? 'selected' : '' }}
                            >
                            {{ $val['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="detail">詳細</label>
                    <textarea id="detail" name="detail" maxlength="500" class="form-control" rows="5">{{old('detail',$item->detail)}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image">イメージ画像</label>
                    @if($item -> image != NULL)
                <img src="data:image/png;base64,{{old('image',$item->image)}}" alt="image" style="width: 30%; height: auto;">
                @else
                <p>画像なし</p>
                @endif
                </div>
                <input id="image" type="file" name="image" value="{{old('image')}}">
                    
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-primary">
                        更新
                    </button>
                </div>
            </form>
            <div class="text-center">
                 
                <form action="{{ url('/items/delete/'.$item->id) }}" method="GET">
                    <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？")'>
                        削除
                    </button>   
                </form>    
            </div>
            
        </div>
    </div>
</div>
<a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>
@endsection


@section('css')
<link rel="stylesheet" href="/css/style.css"> 
@stop

@section('js')
@stop