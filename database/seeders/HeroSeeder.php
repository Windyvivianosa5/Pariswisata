<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mains')->insert([
            'title' => 'Hero Section',
            'image' => 'hero/istana.jpg',
            'category' => 'hero',
            'description' => 'Deskripsi hero',
            'hero_title' => 'Istana Siak Sri Indrapura',
            'hero_image' => 'hero/istana.jpg',
            'hero_description' => 'Temukan keindahan dan sejarah Istana Siak Sri Indrapura, salah satu warisan budaya Melayu yang megah.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
