<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('storage/database/db32ribu/kategori.csv'), 'r');
        
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Category::create([
                'name' => $data['0']
            ]);
        }
    }
}
