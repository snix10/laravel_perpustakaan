<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GambarBuku>
 */
class GambarBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'buku_id' => mt_rand(1,10),
            'gambar1_buku' => mt_rand(60,350),
            'gambar2_buku' => mt_rand(60,350),
            'gambar3_buku'  => mt_rand(60,350),
        ];
    }
}
