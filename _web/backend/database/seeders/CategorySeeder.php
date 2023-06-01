<?php

namespace Database\Seeders;

use App\Enums\Category as CategoryEnum;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Category $category): void
    {
        // 実行するたび、更新する
        $categories = CategoryEnum::getDataForSeeder();
        $category->upsert(
            $categories,
            ['id'],
            ['name']
        );
    }
}
