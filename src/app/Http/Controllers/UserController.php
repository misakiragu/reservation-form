<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');  // 登録フォームのビューファイルを指定
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // リクエストからお気に入り店舗のIDを受け取り、ユーザーに紐付ける
        if ($request->has('favorites')) {
            $user->favorites()->sync($request->input('favorites'));
        }

        // 登録後、/thanksページへリダイレクト
        return redirect('/thanks')->with('status', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'ログアウトしました');
    }

    public function mypage()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->with('shop')->get();

        return view('mypage', compact('user', 'reservations'));
    }
}
