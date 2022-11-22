<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'kdBuku' => 'Buk-1111',
            'judul_buku' => 'manga',
            'nama_pengarang' => 'unknown',
            'nama_penerbit' => 'unknown',
            'tahun_terbit' => '2011'
        ]);
        Buku::create([
            'kdBuku' => 'Buk-3313123',
            'judul_buku' => 'dongeng',
            'nama_pengarang' => 'unknown',
            'nama_penerbit' => 'unknown',
            'tahun_terbit' => '2011'
        ]);
        Buku::create([
            'kdBuku' => 'Buk-11212',
            'judul_buku' => 'novel',
            'nama_pengarang' => 'unknown',
            'nama_penerbit' => 'unknown',
            'tahun_terbit' => '2011'
        ]);
        Buku::create([
            'kdBuku' => 'Buk-99829',
            'judul_buku' => 'hayal',
            'nama_pengarang' => 'unknown',
            'nama_penerbit' => 'unknown',
            'tahun_terbit' => '2011'
        ]);
        Buku::create([
            'kdBuku' => 'Buk-7363773',
            'judul_buku' => 'cerita',
            'nama_pengarang' => 'unknown',
            'nama_penerbit' => 'unknown',
            'tahun_terbit' => '2011'
        ]);
    }
}
