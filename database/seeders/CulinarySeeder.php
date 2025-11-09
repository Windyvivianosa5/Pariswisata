<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Culinary;

class CulinarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Mie Tarempa Siak',
                'address' => 'Jl. Sultan Ismail, Siak Sri Indrapura, Riau',
                'latitude' => 0.8065123,
                'longitude' => 102.0451234,
                'description' => 'Mie Tarempa khas Kepulauan Riau dengan cita rasa gurih dan pedas, disajikan dengan ikan tongkol suwir.',
                'price_range' => 'Moderate',
                'image_url' => 'https://images.unsplash.com/photo-1604908176997-9e2a8ef5814d?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'name' => 'Rumah Makan Pak Kumis',
                'address' => 'Jl. Jenderal Sudirman No. 88, Pekanbaru, Riau',
                'latitude' => 0.5073500,
                'longitude' => 101.4478500,
                'description' => 'Masakan Melayu Riau autentik dengan lauk pilihan seperti gulai, sambal belacan, dan sayur asam.',
                'price_range' => 'Cheap',
                'image_url' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'name' => 'Kopi Kimteng',
                'address' => 'Jl. Senapelan, Pekanbaru, Riau',
                'latitude' => 0.5324100,
                'longitude' => 101.4512500,
                'description' => 'Kopi legendaris Pekanbaru dengan racikan klasik dan roti srikaya yang lembut.',
                'price_range' => 'Moderate',
                'image_url' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'name' => 'Pondok Patin HM Yunus',
                'address' => 'Jl. Kaharudin Nasution, Pekanbaru, Riau',
                'latitude' => 0.4762200,
                'longitude' => 101.4484000,
                'description' => 'Patin asam pedas khas Riau yang segar dengan bumbu meresap, favorit keluarga.',
                'price_range' => 'Expensive',
                'image_url' => 'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'name' => 'Sate Danguang-Danguang',
                'address' => 'Jl. Tuanku Tambusai, Pekanbaru, Riau',
                'latitude' => 0.5178800,
                'longitude' => 101.4359300,
                'description' => 'Sate Padang khas Minangkabau dengan kuah kental rempah, daging lembut, dan aroma menggugah.',
                'price_range' => 'Cheap',
                'image_url' => 'https://images.unsplash.com/photo-1544025162-0909fae3b5a5?q=80&w=1200&auto=format&fit=crop',
            ],
        ];

        foreach ($data as $item) {
            Culinary::query()->updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
