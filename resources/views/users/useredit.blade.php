@extends('adminlte::page')

@section('title', 'ユーザー情報編集')

@section('content_header')
    <h1>ユーザー情報編集 ID:{{$user->id}}</h1>
@stop

@section('content')
<form action="/memberEdit" method="post">
    @csrf
<input type="hidden" value="{{$user->id}}" name = "id">
        <div style="text-align:left;">名前</div>    
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
        </div>
        @if ($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
        @endif    
        <div style="text-align:left;">メールアドレス</div>
        <div class="form-group">
            <input class="form-control" type="text" name="email" value="{{$user->email}}">
        </div>
        @if ($errors->has('email'))
        <p class="text-danger">{{$errors->first('email')}}</p>
        @endif
        
        <div style="text-align:left;">パスワード<span class="badge badge-danger ml-2">{{ __('必須') }}</span><small id="passwordHelpInline" class="text-muted">　8文字以上で入力して下さい</small></div>
        <div class="form-group">
            <input class="form-control" type="password" name="password">
        </div>
        @if ($errors->has('password'))
        <p class="text-danger">{{$errors->first('password')}}</p>
        @endif

        <div style="text-align:left;">パスワード確認<span class="badge badge-danger ml-2">{{ __('必須') }}</span></div>
        <div class="form-group">
            <input class="form-control" type="password" name="confirm_password" >
        </div>
        @if ($errors->has('confirm_password'))
            <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
        @endif
        <input type="hidden" name="role" value= "{{$user->role}}">

        <div class="form-group">
        <button type="submit" class="btn btn-info btn-block ">編集</button>
    </div>
   
     <a href="/user" class="btn btn-outline-info" role="button">ユーザー画面へ戻る </a>
        </form>

@stop

@section('css')
@stop

@section('js')
@stop