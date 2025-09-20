<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokets;

class LoketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokets = [
            ['nama' => 'Loket 1'],
            ['nama' => 'Loket 2'],
            ['nama' => 'Loket 3'],
            ['nama' => 'Loket 4'],
        ];
        foreach ($lokets as $l) {
            Lokets::firstOrCreate(['nama' => $l['nama']]);
        }
    }
}
