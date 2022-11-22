<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'kdAnggota' => '1212132',
            'nama_anggota' => 'farhan',
            'jk_anggota' => 'laki laki',
            'nohp_anggota' => '09887655678',
            'kelas_anggota' => 'RPL 1'
        ]);

        Anggota::create([
            'kdAnggota' => '2212343',
            'nama_anggota' => 'reno',
            'jk_anggota' => 'laki laki',
            'nohp_anggota' => '648882838',
            'kelas_anggota' => 'RPL 1'
        ]);
        Anggota::create([
            'kdAnggota' => '1321121',
            'nama_anggota' => 'fahril',
            'jk_anggota' => 'laki laki',
            'nohp_anggota' => '648882838',
            'kelas_anggota' => 'RPL 1'
        ]);
        Anggota::create([
            'kdAnggota' => '323432',
            'nama_anggota' => 'aldi',
            'jk_anggota' => 'laki laki',
            'nohp_anggota' => '648882838',
            'kelas_anggota' => 'RPL 1'
        ]);
        Anggota::create([
            'kdAnggota' => '33222',
            'nama_anggota' => 'mansur',
            'jk_anggota' => 'laki laki',
            'nohp_anggota' => '648882838',
            'kelas_anggota' => 'RPL 1'
        ]);
    }
}
