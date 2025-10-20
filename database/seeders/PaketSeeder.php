<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('paket')->insert([
            [
                'id' => 7,
                'ket' => 'Kelas 7',
                'created_at' => date('2025-10-01 09:42:38'),
                'updated_at' => date('2025-10-01 09:42:38'),
            ],
            [
                'id' => 8,
                'ket' => 'Kelas 8',
                'created_at' => date('2025-10-01 09:42:38'),
                'updated_at' => date('2025-10-01 09:42:38'),
            ],
            [
                'id' => 9,
                'ket' => 'Kelas 9',
                'created_at' => date('2025-10-01 09:42:38'),
                'updated_at' => date('2025-10-01 09:42:38'),
            ],
        ]);
    }
}
