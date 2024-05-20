<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of all shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopAll()
    {
        // リレーションをロードしてデータを取得
        $shops = Shop::with(['area', 'genre'])->get();
        return view('shopall', compact('shops'));
    }

    public function show($shop_id)
    {
        $shop = Shop::findOrFail($shop_id); // IDに基づき店舗情報を取得、見つからない場合は404エラー
        return view('shop', compact('shop')); // 詳細ビューにデータを渡す
    }

    public function favorite(Request $request, Shop $shop)
    {
        // 認証済みユーザーを取得
        $user = Auth::user();

        if ($user) {
            // Userのid取得
            $user_id = Auth::id();

            // 既にいいねしているかチェック
            $existingFavorite = Favorite::where('article_id', $shop->id)
                ->where('user_id', $user_id)
                ->first();

            // 既にいいねしている場合は何もせず、そうでない場合は新しいいいねを作成する
            if (!$existingFavorite) {
                $favorite = new Favorite();
                $favorite->article_id = $shop->id;
                $favorite->user_id = $user_id;
                $favorite->save();
            }

            // 記事の状態を返す
            return response()->json([
                'article' => [
                    'slug' => $shop->slug,
                    'title' => $shop->title,
                    'description' => $shop->description,
                    'body' => $shop->body,
                    'tagList' => $shop->tags->pluck('name'),
                    'createdAt' => $shop->created_at,
                    'updatedAt' => $shop->updated_at,
                    'favorited' => true, // いいねされた状態を示す
                    'favoritesCount' => $shop->favorites()->count(), // いいねの合計数を取得
                ]
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}