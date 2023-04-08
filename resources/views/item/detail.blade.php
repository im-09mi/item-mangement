@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1 class="shadow-sm p-2 mb-4 bg-body rounded">商品詳細</h1>
@stop

@section('content')
    <div class="wrapper m-4">
    <a href="#" onclick="window.history.back(); return false;">
            <-商品一覧画面に戻る
        </a>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">名前</th>
                <th scope="col">種別</th>
                <th scope="col">更新日時</th>
                <th scope="col">イメージ画像</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->typeAsString() }}</td>
                <td>{{ $item->updated_at }}</td>
                @if($item -> image != NULL)
                <td><img src="data:image/png;base64,{{ $item->image }}" alt="image" style="width: 30%; height: auto;"></td>
                @else
                <td>画像なし</td>
                @endif
            </tr>
        </tbody>
        </table>
        <h2 class="fs-4">商品について：</h2>
        <p>{!! nl2br(e($item->detail)) !!}</p>
    </div>

    @stop

@section('css')
@stop

@section('js')
@stop
