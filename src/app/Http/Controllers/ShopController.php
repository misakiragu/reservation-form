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
    public function shopAll(Request $request)
    {
        $shops = Shop::all();
        return view('shopall', compact('shops'));
    }

    public function show($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        return view('shop', compact('shop'));
    }

    public function favorite(Request $request, Shop $shop)
    {
        $user = Auth::user();

        if ($user) {
            $user_id = Auth::id();

            $existingFavorite = Favorite::where('article_id', $shop->id)
                ->where('user_id', $user_id)
                ->first();

            if (!$existingFavorite) {
                $favorite = new Favorite();
                $favorite->article_id = $shop->id;
                $favorite->user_id = $user_id;
                $favorite->save();
            }

            return response()->json([
                'article' => [
                    'slug' => $shop->slug,
                    'title' => $shop->title,
                    'description' => $shop->description,
                    'body' => $shop->body,
                    'tagList' => $shop->tags->pluck('name'),
                    'createdAt' => $shop->created_at,
                    'updatedAt' => $shop->updated_at,
                    'favorited' => true,
                    'favoritesCount' => $shop->favorites()->count(),
                ]
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function search(Request $request)
    {
        $areaId = $request->input('area');
        $genreId = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::query();

        if ($areaId) {
            $query->where('area_id', $areaId);
        }

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        $shops = $query->get();

        return view('shopall', ['shops' => $shops]);
    }
}