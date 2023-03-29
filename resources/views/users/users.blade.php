@extends('adminlte::page')

@section('title', 'ユーザー情報')

@section('content_header')
    <h1>ユーザー情報</h1>
@stop

@section('content')
        <table class="table table-bordered" margin-top=10px;>
      

        <tr>
            <th style ="width:100px; ">ID</th>
            <th style ="width:200px;">名前</th>
            <th style ="width:300px;">メールアドレス</th>
            <th></th>
        
        </tr>
      
        <tr>
            
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            
            
            <td><a href="/user/edit/{{$users->id}}"><button class="editbtn btn-info btn-block btn-sm">編集</button></a></td>
            
        </tr>
  
    </table>

    <div style="text-align:center;">
    <a href="/" class="btn btn-outline-info" role="button">ホームに戻る</a>
    </div>
   
   
 </body>
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
@stop
