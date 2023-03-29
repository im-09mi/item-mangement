<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function user()
  {
      $users = Auth::user();
      return view('users.users',compact('users'));
  }

  public function edit(Request $request){
        
    $users = User::where('id','=',$request->id)->first();
    
    return view('users.useredit')->with([
        'user' => $users,
    ]);
    }

    //編集ボタン処理
    public function memberEdit(Request $request){
        //バリデーションをする

        $request -> validate([
        
        'name'=>['required'],
        'email'=>['required','email'],
        'password'=>['required','string', 'min:8'],
        'confirm_password' => ['required', 'same:password'],   
        
        ]);
        
        $users = User::where('id','=',$request->id)->first();
        // dd($users);
        $users->name = $request->name;
        $users->email =$request->email;
        $users->password =Hash::make($request->password);
        $users->save();
        return redirect('/user');
    }

    public function memberDelete(Request $request){
        
        $user = User::where('id','=',$request->id)->first();
        //ユーザーIDが自分のIDだったら削除してログイン画面へ遷移
        if(($user->id == Auth::id())) {
            $user->delete();
            return redirect('/');
            }
            $user->delete();
        return redirect('/user');
    }      
}