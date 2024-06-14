# Rese（リーズ）
ある企業のグループ会社の飲食店予約サービス

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## アプリケーションURL
http://localhost

※ログインが必要なため、下記URLより会員登録が必要
http://localhost/register

## 他のリポジトリ

## 機能一覧
会員登録
ログイン
ログアウト
ユーザー情報取得
ユーザー飲食店お気に入り一覧取得
ユーザー飲食店予約情報取得
飲食店一覧取得
飲食店詳細取得
飲食店お気に入り追加
飲食店お気に入り削除
飲食店予約情報追加
飲食店予約情報削除
エリアで検索する
ジャンルで検索する
店名で検索する


## 使用技術（実行環境）
Laravel8
mysql:8.0.26
PHP >= 7.3
Composer
Node.js & npm

## テーブル設計
<img width="670" alt="スクリーンショット 2024-06-14 17 43 08" src="https://github.com/misakiragu/reservation-form/assets/141226793/814eff07-aafd-4f78-b0a2-eb32610f2a59">
<img width="675" alt="スクリーンショット 2024-06-14 17 43 15" src="https://github.com/misakiragu/reservation-form/assets/141226793/e01545b3-4abd-4c31-a9b9-b087c31859fd">
<img width="673" alt="スクリーンショット 2024-06-14 17 43 24" src="https://github.com/misakiragu/reservation-form/assets/141226793/b10663ce-cedb-4917-a08e-ab963797580c">
<img width="677" alt="スクリーンショット 2024-06-14 17 43 35" src="https://github.com/misakiragu/reservation-form/assets/141226793/d6d8a205-93c8-4a86-8f4a-053d4847c3ac">

## ER図
![image](https://github.com/misakiragu/reservation-form/assets/141226793/feac905c-f289-4778-8e74-eb676804c90a)

## 環境構築
### リポジトリをクローン
git clone https://github.com/your-repo/shop-reservation-system.git
cd shop-reservation-system

### 依存関係をインストール
composer install
npm install

### 環境変数を設定
cp .env.example .env
php artisan key:generate
.envファイルを開き、データベースや他の設定を更新します。

### マイグレーションとシーダーを実行
php artisan migrate --seed

### アセットをビルド
npm run dev

### アプリケーションをサーブ
php artisan serve

