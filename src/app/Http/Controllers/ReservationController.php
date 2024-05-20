<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // バリデーションの実行
        $request->validate([
            'shop_id' => 'required',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'reservation_number' => 'required|integer|min:1',
        ]);

        // フォームデータを保存
        Reservation::create([
            'shop_id' => $request->input('shop_id'),
            'reservation_date' => $request->input('reservation_date'),
            'reservation_time' => $request->input('reservation_time'),
            'reservation_number' => $request->input('reservation_number'),
            'user_id' => auth()->id(), // ログインユーザーのIDを保存する例
        ]);

        // 成功時のリダイレクトなどを行う
    }
}
