<?php

use App\Models\Jurusan;
use App\Models\JurusanKuotum;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
            'j_nama'=>'Manajemen Informatika',
            'j_singkatan'=>'MI',
            'j_jenjang'=>'D3',
        ]);
        Jurusan::create([
            'j_nama'=>'Komputerisasi Akuntansi',
            'j_singkatan'=>'KA',
            'j_jenjang'=>'D3',
        ]);
        Jurusan::create([
            'j_nama'=>'Teknik Komputer',
            'j_singkatan'=>'TK',
            'j_jenjang'=>'D3',
        ]);
        Jurusan::create([
            'j_nama'=>'Teknik Informatika',
            'j_singkatan'=>'TI',
            'j_jenjang'=>'S1',
        ]);
        Jurusan::create([
            'j_nama'=>'Sistem Informasi',
            'j_singkatan'=>'SI',
            'j_jenjang'=>'S1',
        ]);
        for ($i=1;$i<=5;$i++){
            JurusanKuotum::create([
                'jk_jurusan_id' => $i,
                'jk_kuota'=> rand(60,100)
            ]);
        }
    }
}
