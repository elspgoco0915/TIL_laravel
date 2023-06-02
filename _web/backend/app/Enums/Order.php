<?php

namespace App\Enums;

enum Order: int
{
    case Category   = 1;
    case User       = 2;
    case Created    = 3;


    /**
     * enumラベル
     * enumのラベルを文字列で返す
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            Order::Category     => 'カテゴリーID順',
            Order::User         => 'ユーザーID順',
            Order::Created   => '作成日時順',
        };
    }
}
