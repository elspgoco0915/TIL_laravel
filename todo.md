# 思いつきTODO
- 立ち上げ手順
  - .env.example を コピーする
  - php artisan key:generate
  - 疎通確認
  - 初期設定系
  - chmod -R 777 /var/www/html/storage/
  - docker重いので軽量化(vendor-store)
  - npm run dev
  - npm run build
  - TODO: dockerの構成誤っているので直す(コメントアウト部分)
  - apiとファットコントローラーを解決する

```bash
php artisan tinker

DB::select('select 1');
#  Illuminate\Database\QueryException  SQLSTATE[HY000] [2002] Connection refused (Connection: mysql, SQL: select 1).の場合疎通できてない
# = [
#     {#6209
#       +"1": 1,
#     },
#   ]
# が返ってくれば疎通ok

```

- phpmyadmin
- mailhog
の追加

- tailwind cssをいれる
- 
