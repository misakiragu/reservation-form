<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request, Shop $shop)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください');
        }

        $favorite = Favorite::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

        if ($favorite) {
            return back()->with('message', '既にお気に入りに追加されています');
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'shop_id' => $shop->id
            ]);
            return back()->with('message', 'お気に入りに追加しました');
        }
    }

    public function remove(Request $request, Shop $shop)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください');
        }

        $favorite = Favorite::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('message', 'お気に入りから削除しました');
        } else {
            return back()->with('message', 'お気に入りに登録されていません');
        }
    }
}
