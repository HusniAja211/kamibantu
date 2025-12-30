<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Lingkungan',
            'Pendidikan',
            'Sosial',
            'Kesehatan',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
