<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
        'image',
    ];

    const TYPE = [
        1 => [ 'label' => '家電'],
        2 => [ 'label' => 'ビューティー・健康家電'],
        3 => [ 'label' => '照明'],
        4 => [ 'label' => 'パソコン・周辺機器'],
        5 => [ 'label' => 'テレビ'],
        6 => [ 'label' => 'その他'],
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    // DBのtypeを変換
    public function typeAsString(){
        $types = ["1"=>"家電","2"=>"ビューティー・健康家電","3"=>"照明","4"=>"パソコン・周辺機器","5"=>"テレビ","6"=>"その他"];

        return $types[$this->type];
}

//新着商品表示
public function Items()
{
    return Item::orderBy('created_at','desc')->get();
}
}