<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request, $shopId)
    {
        $userId = auth()->id();
        DB::table('favorites')->insert([
            'user_id' => $userId,
            'shop_id' => $shopId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back();
    }

    public function removeFavorite(Request $request, $shopId)
    {
        $userId = auth()->id();
        DB::table('favorites')->where([
            ['user_id', '=', $userId],
            ['shop_id', '=', $shopId],
        ])->delete();
        return back();
    }
}
