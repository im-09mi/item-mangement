@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 >豊富な商品取り扱いあり</h1>
    <div class=info>
    <a href="/detail/174" class=topinfo>新生活応援🌸1人暮らし家電セット</a>
    </div>
@stop

@section('content')
@foreach ($items as $item)
<div class = "a">
<div class = "top">
<img src="data:image/png;base64,{{ $item->image }}" class=topimage>
</div>
<div class = "topname">
<a href="/detail/{{$item->id}}" class=imagename>{{ $item->name }}</a>
</div>
</div>
@endforeach
<a class="pagetop" href="#">
    <div class="pagetop__arrow"></div></a>
@stop


@section('css')
    <link rel="stylesheet" href="/css/style.css"> 
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

