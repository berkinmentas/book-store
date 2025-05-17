<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Tarihî Roman',
            'Polisiye Roman',
            'Bilim Kurgu',
            'Fantastik',
            'Roman',
            'Macera',
            'Psikolojik Roman',
            'Dram',
            'Distopya',
            'Klasik Roman',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'title' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
