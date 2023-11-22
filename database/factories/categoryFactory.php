<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryNames = ['Elettronica', 'Abbigliamento', 'Casa e Giardino', 'Sport', 'Libri', 'Gioielli', 'Cucina', 'Film e TV', 'Auto e Moto', 'Salute e Bellezza'];

        return [
            'name' => $this->faker->unique()->randomElement($categoryNames),
            'user_id' => rand(1, 10),
        ];
    }
}
