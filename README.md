# 手順

-前提-
クローン（コピー）後、src/php ディレクトリは削除する
.env のプロジェクト名「test0612」は好きに変えてください(コンテナ名がかぶらないように)

1. docker-compose.yml をもとに docker compose build で docker を立ち上げ
2. docker up -d でコンテナを作成。docker compose exec php bash でコンテナの中に入る
3. ls コマンドで laravel プロジェクトが同期されているかを確認
4. localhost (laravel)につながることを確認
5. エラーが出る場合は、 composer install や (cd ../)chmod -R 777 html/ などで localhost(laravel)につながることを確認
6. DB と接続する

### ≪ プロジェクトの yml ファイル配下で mysql コンテナ内に入る ≫

docker compose exec db2 bash

### ≪ ログインする ≫

mysql -u root -prootpass

### DB の作成コマンド

CREATE DATABASE database_name DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

### データベースを操作するユーザの作成(初回のみ。基本的に省略可)

CREATE USER 'laraveluser' IDENTIFIED BY 'laravelpass';

### 権限の付与

GRANT ALL PRIVILEGES ON database_name.\* TO 'laraveluser';
use database_name;

6. docker の ./env ファイルに DB_HOST、 DB 名、User、Pass を記述。php artisan migrate を実行し、DB と接続できているか確認する
