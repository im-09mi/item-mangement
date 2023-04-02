<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        $query = Item::where('items.status', 'active')->orderByDesc("updated_at");
            

            //セレクトボックス
        $selectType = $request->input('type');
        //検索欄
        $keyword = $request->input('keyword');

        if(!empty($selectType)) {
            $query->where('type', '=', "$selectType");
        }

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
            -> orWhere('detail', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();
        return view('item.index', compact('items','keyword'));
    }

    /**
     * 詳細画面の表示
     */
    public function detail($id){
        $item = Item::find($id);
//dd($item);
        return view('item.detail', compact('item'));
    }

    
    /**
     * 商品更新画面表示
     *
     * @param  \App\Models\Item  $item
     */
    public function showEditForm(Item $item)
    {
        return view('item.edit',compact('item'));
    }

    
    /**
     * 商品更新
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item,Request $request)
    {
        //入力チェック
        $this->validate($request, [
            'name' => 'required|max:100',
            'type' => 'required|integer',
            'detail' => 'max:500',
            
        ],
        [
            'name.required' => '名前欄が入力されていません。',
            'type.required'  => '種別欄が選択されていません。',
        ]);

        $detail=isset($request->detail)?$request->detail:'';
        $image=isset($request->image)?base64_encode(file_get_contents($request->image)):null;
        //データ更新

        $item->update([
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $detail,
            'image' => $image,
        ]);

        //商品一覧画面に戻る
        return redirect()->route('item.index',['id'=>$item->id]);
    }

    /**
     * 商品削除
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        //
        //商品一覧画面に戻る
        return redirect()->route('item.index');
    }


     /**
     *商品登録画面表示
     */
    public function showCreateForm()
    {
        //
        return view('item.add');
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required|integer',
                'detail' => 'max:500',
            ],
        
            [
                'name.required' => '名前欄が入力されていません。',
                'type.required'  => '種別欄が選択されていません。',
            ]);

            
        //ログインしたユーザIDを設定する
        $user_id = Auth::id();
        $detail=isset($request->detail)?$request->detail:'';
        $image=isset($request->image)?base64_encode(file_get_contents($request->image)):null;

            // 商品登録
            Item::create([
                'user_id'=>$user_id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $detail,
                'image' => $image,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
}
