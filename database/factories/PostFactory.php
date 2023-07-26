<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        $excerpt = $this->faker->sentence(mt_rand(5, 10));
        // Menghapus tag HTML dan karakter khusus menggunakan strip_tags
        $excerpt = strip_tags($excerpt);

        return [
            'title' => $this->faker->sentence(mt_rand(2, 6)),
            'slug' => $this->faker->slug(),
            'excerpt' => $excerpt,
            // 'body' => '<p>'. implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
