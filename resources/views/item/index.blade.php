@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
<div class="wrapper m-4">
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="/items" method="get">
            <div class="form-group d-flex">
                <select name="type" class="form-select text-muted w-25 bg-light" aria-label="Default select example">
                    <option value="" selected>種別を選択</option>
                    @foreach(config('pref') as $key => $score)
                    <option value="{{$key}}">{{ $score }}</option>
                    @endforeach
                </select>
                <input type="text" name="keyword"  class="form-control" placeholder="キーワードを入力">
                <input type="submit" value="検索" class="btn btn-primary">
            </div>
        </form>
        </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>更新日時</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td><a href="{{ route('detail', ['id'=>$item->id]) }}" class="btn btn-outline-success ">詳細</a></td>
                                    <td><a href="{{ url('items/edit/'.$item->id) }}" class="btn btn-outline-primary ">編集</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css"> 
@stop

@section('js')
@stop
