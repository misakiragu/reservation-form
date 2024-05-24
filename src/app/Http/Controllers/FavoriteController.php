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

        if (!$favorite) {
            Favorite::create([
                'user_id' => $user->id,
                'shop_id' => $shop->id
            ]);
        }

        return back();
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

    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites; // ログインユーザーのお気に入り店舗を取得

        return view('mypage', [
            'user' => $user,
            'favorites' => $favorites,
        ]);
    }
}
