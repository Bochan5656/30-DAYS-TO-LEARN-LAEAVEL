# 30 Days to Learn Laravel 11 - Practice Repository

このリポジトリは、Laracastsの「[30 Days to Learn Laravel](https://laracasts.com/series/30-days-to-learn-laravel-11)」を教材として学習・作成したLaravelアプリケーションです。

## 概要

Laravel 11の基礎を学ぶために作成した、シンプルな掲示板（ブログ）アプリケーションです。ユーザー登録・ログイン機能（Laravel Breeze）を備え、投稿の作成・閲覧・更新・削除（CRUD）が可能です。また、ポリシー（Policy）を用いた認可処理も実装しており、自分自身の投稿のみ編集・削除ができるように制御されています。

## 主な機能

- **ユーザー認証**: Laravel Breezeを使用した登録、ログイン、ログアウト機能
- **投稿機能 (CRUD)**:
  - 投稿一覧の表示 (ペジネーション機能付き)
  - 投稿の詳細表示
  - 新規投稿の作成
  - 投稿の編集・更新 (投稿者本人のみ)
  - 投稿の削除 (投稿者本人のみ)

## 使用技術

- **バックエンド**: PHP, Laravel 11
- **フロントエンド**: HTML, Tailwind CSS, Alpine.js
- **ビルドツール**: Vite
- **データベース**: SQLite / MySQL (環境による)

## 環境構築の手順

ローカル環境でこのプロジェクトを動かすための一般的な手順です。

### 前提条件

- PHP 8.2 以上
- Composer
- Node.js & npm

### インストール手順

1. **リポジトリのクローン**
   ```bash
   git clone <このリポジトリのURL>
   cd 30-DAYS-TO-LEARN-LAEAVEL
   ```

2. **PHPパッケージのインストール**
   ```bash
   composer install
   ```

3. **Nodeパッケージのインストールとビルド**
   ```bash
   npm install
   npm run build
   ```

4. **環境変数の設定**
   `.env.example` をコピーして `.env` ファイルを作成します。
   ```bash
   cp .env.example .env
   ```
   必要に応じて `.env` ファイル内のデータベース設定（`DB_CONNECTION` など）を自身の環境に合わせて変更してください。

5. **アプリケーションキーの生成**
   ```bash
   php artisan key:generate
   ```

6. **データベースのマイグレーション**
   ```bash
   php artisan migrate
   ```

7. **ローカルサーバーの起動**
   ```bash
   php artisan serve
   ```
   別のターミナルを開き、Viteのプロセスも起動します（開発時のフロントエンドのコンパイル用）。
   ```bash
   npm run dev
   ```

   ブラウザで `http://localhost:8000` にアクセスすると、アプリケーションが表示されます。
