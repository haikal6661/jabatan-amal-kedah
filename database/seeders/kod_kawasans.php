<?php

namespace Database\Seeders;

use App\Models\KodKawasan;
use Illuminate\Database\Seeder;

class kod_kawasans extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KodKawasan::updateOrCreate([
            'id' => 1 ,
            'kod_kawasan' => '01 - Langkawi'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 2 ,
            'kod_kawasan' => '02 - Jerlun'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 3 ,
            'kod_kawasan' => '03 - Kubang Pasu'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 4 ,
            'kod_kawasan' => '04 - Padang Terap'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 5 ,
            'kod_kawasan' => '05 - Pokok Sena'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 6 ,
            'kod_kawasan' => '06 - Alor Setar'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 7 ,
            'kod_kawasan' => '07 - Kuala Kedah'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 8 ,
            'kod_kawasan' => '08 - Pendang'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 9 ,
            'kod_kawasan' => '09 - Jerai'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 10 ,
            'kod_kawasan' => '10 - Sik'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 11 ,
            'kod_kawasan' => '11 - Merbok'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 12 ,
            'kod_kawasan' => '12 - Sungai Petani'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 13 ,
            'kod_kawasan' => '13 - Baling'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 14 ,
            'kod_kawasan' => '14 - Padang Serai'
        ]);

        KodKawasan::updateOrCreate([
            'id' => 15 ,
            'kod_kawasan' => '15 - Kulim Bandar Baharu'
        ]);
    }
}
