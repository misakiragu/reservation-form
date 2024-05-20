<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // データベーステーブル名を指定
    protected $table = 'shops';

    // リレーションの定義
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // テーブルのカラムで、Eloquentによる代入を許可する属性（Mass Assignment）
    protected $fillable = [
        'name',
        'address',
        'genre',
        'overview',
        'image_url'
    ];

    // 日付として扱う属性
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}