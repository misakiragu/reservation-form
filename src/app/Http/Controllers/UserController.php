<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
}
