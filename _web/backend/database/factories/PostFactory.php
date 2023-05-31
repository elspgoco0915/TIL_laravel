<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Enumでcategory_idを全取得
        $category_ids = collect(Category::cases())->pluck('value')->toArray();

        return [
            'user_id'       => User::factory(),
            'category_id'   => $this->faker->RandomElement($category_ids),
            'title'         => $this->faker->word(),
            'content'       => $this->faker->realText(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }
}
