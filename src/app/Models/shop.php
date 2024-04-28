<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // データベーステーブル名を指定
    protected $table = 'shops';

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
}