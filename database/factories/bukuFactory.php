<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\buku>
 */
class bukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_buku' => $this->faker->sentence(mt_rand(2,5)),
            'pengarang_buku' => $this->faker->sentence(mt_rand(2,5)),
            'penerbit_buku' => $this->faker->sentence(mt_rand(2,5)),
            'gambar_buku' => $this->faker->sentence(mt_rand(2,5)),
            'deskripsi_buku' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->sentence(mt_rand(2,5)),

            // 'teks_buku' => $this->faker->sentence(mt_rand(5,20)),
            'halaman_buku'  => mt_rand(60,350),
            'jumlah_buku'  => mt_rand(60,350),
        ];
    }
}
