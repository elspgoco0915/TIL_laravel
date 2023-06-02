<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Support\Collection;

class AdminNotificationCollection extends Collection
{


    public function markAsRead()
    {
        $now = now();
        dd($this->each->get('content'));

        // 返すコレクションに'read_at'プロパティを追加して返す
        $this->each->setAttribute('last_created_at', '' );
        // モデルから取得した結果のコレクションに対してupdate文でread_atを最新日時に更新する
//        $this->toQuery()->update(['content' => 'updated']);
//        $this->toQuery()->update(['content' => 'updated']);

        return $this;
    }
}
