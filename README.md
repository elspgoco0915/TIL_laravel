# til_laravel
save what today I learned in Laravel

## 立ち上げ方 (TODO: 要確認！)
- wslで以下コマンドを実行
- `mnt/`ディレクトリ配下の対象のプロジェクトへ
- プロジェクト内、`vendor/bin/sail up`　で立ち上げ

### 参考にさせていただいたurl
- [もう迷わない！Windows + Laravel Sail(Docker)で動作が遅くならない開発環境構築 Windows10 Home対応](https://zenn.dev/na9/articles/ffe7b884fee7d2)
- [Laravel Sailで開発環境構築](https://chigusa-web.com/blog/laravel-sail/)
- [laravel10時代のプロジェクトの始め方](https://zenn.dev/imah/articles/5d761f8f8c26fe)
- [プロジェクトをGitHubからクローンした後にやること](https://chigusa-web.com/blog/laravel-github-clone/)
- [既にLaravel Sailで構築済みのプロジェクトにおけるの開発環境構築手順まとめ Windows10 Home対応](https://zenn.dev/na9/articles/e5d70c156ea141)
- [Laravel SailのSailコマンドと仲良くなりたい](https://zenn.dev/ryuu/articles/what-is-sail)


### cloneして構築の仕方
- .envファイルの作成
```bash
cp .env.example .env
```

- ubuntuで以下コマンドを実行
```bash
cd ./til-laravel


docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```