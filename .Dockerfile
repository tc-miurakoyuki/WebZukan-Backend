# 使用するPHPのバージョンを指定
FROM php:8.3-fpm

# 必要な拡張モジュールのインストール
RUN docker-php-ext-install pdo pdo_mysql

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www

# アプリケーションソースをコンテナにコピー
COPY . .

# 依存関係のインストール
RUN composer install

# ポート設定
EXPOSE 9000