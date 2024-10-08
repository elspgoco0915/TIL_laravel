<?php

namespace App\Models;

use App\Enums\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $dates = ['created_at', 'updated_at',];

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * 指定した順番で一覧を取得
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSortedList(Request $request)
    {
        $query = self::query();
        // sortの入力値があるか判定し、第二引数で指定したクロージャーを実行
        $query->when($request->input('sort'), function ($query, $sort) {
            // switch文で入力値によって、順番を変更する
            switch ($sort) {
                case Order::Category->value:
                    return $query->orderBy('category_id');
                case Order::User->value:
                    return $query->orderBy('user_id');
                case Order::Created->value:
                    return $query->orderBy('created_at');
            }
            // 第1引数の値がfalsyな値の場合、第3引数のクロージャーが実行される(id順)
        }, function ($query) {
            return $query->orderBy('id');
        });
        return $query->get();
    }
}
