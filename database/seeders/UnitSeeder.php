<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('storage/database/db32ribu/unit satuan.csv'), 'r');
        
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Unit::create([
                'unit_name' => $data['0']
            ]);
        }
    }
}
