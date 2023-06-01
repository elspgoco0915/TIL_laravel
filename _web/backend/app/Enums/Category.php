<?php

namespace App\Enums;

enum Category: int
{
    case Joy    = 1;
    case Anger  = 2;
    case Sorrow = 3;
    case Fun    = 4;


    /**
     * enumラベル
     * enumのラベルを文字列で返す
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            Category::Joy      => 'よろこび',
            Category::Anger    => 'いかり',
            Category::Sorrow   => 'かなしみ',
            Category::Fun      => 'たのしみ',
        };
    }


    /**
     * シーディング用のデータ取得
     *
     * @return string
     */
    public static function getDataForSeeder(): array
    {
        $data = [];
        foreach (self::cases() as $case) {
            $data[] = [
                'id'      => $case->value,
                'name'    => Category::tryFrom($case->value)->label(),
            ];
        }
        return $data;
    }
}
