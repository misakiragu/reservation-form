<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // 一括代入可能な属性を指定
    protected $fillable = [
        'user_id',
        'shop_id',
        'reservation_date',
        'reservation_time',
        'reservation_number',
    ];

    // 関連付けの定義（必要に応じて）
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
