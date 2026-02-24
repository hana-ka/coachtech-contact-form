# coachtech-contact-form

## 概要
お問い合わせフォームアプリケーションです。

## 環境構築

### ① リポジトリをクローン

git clone git@github.com:hana-ka/coachtech-contact-form.git

### ② Docker起動

docker-compose up -d

### ③ コンテナに入る

docker-compose exec php bash

### ④ composer install

composer install

### ⑤ .env作成

cp .env.example .env

.envファイル内のDB設定を確認してください。

### ⑥ マイグレーションとシーディング

php artisan migrate --seed

## 使用技術

- PHP 8.1.34
- Laravel 8.83.29
- MySQL 8.0.26
- Docker

## ER図

