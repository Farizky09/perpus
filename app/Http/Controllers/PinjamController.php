<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Batasan;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pinjam;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PinjamController extends Controller
{
    public function indexAnggota()
    {
        $anggota = Anggota::all();
        return view('anggota.index', ['anggota' => $anggota]);
    }

    public function tambahAnggota()
    {
        return view('anggota.tambah');
    }
    public function simpanAnggota(Request $request)
    {
        $kdANggota = $request->kdAnggota;
        Anggota::create([
            'kdAnggota' => $kdANggota,
            'nama_anggota' => $request->nama_anggota,
            'jk_anggota' => $request->jk_anggota,
            'nohp_anggota' => $request->nohp_anggota,
            'kelas_anggota' => $request->kelas_anggota
        ]);
        return redirect('/anggota');
    }

    public function editAnggota($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact(['anggota']));
    }
    public function updateAnggota($id, Request $request)
    {
        $anggota = Anggota::find($id);
        $anggota->update($request->except(['_token', 'submit']));
        return redirect('/anggota');
    }
    public function hapusAnggota($id)
    {
        $anggota = Anggota::findOrfail($id);
        $anggota->delete();
        return redirect('/anggota');
    }

    //BukuController
    public function indexBuku()
    {
        $buku = Buku::all();
        return view('buku.index', ['buku' => $buku]);
    }

    public function tambahBuku()
    {

        return view('buku.tambah');
    }
    public function simpanBuku(Request $request)
    {
        $kdBuku = $request->kdBuku;
        Buku::create([
            'kdBuku' => $kdBuku,
            'judul_buku' => $request->judul_buku,
            'nama_pengarang' => $request->nama_pengarang,
            'nama_penerbit' => $request->nama_penerbit,
            'tahun_terbit' => $request->tahun_terbit
        ]);
        return redirect('/buku');
    }

    public function editBuku($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact(['buku']));
    }
    public function updateBuku($id, Request $request)
    {
        $buku = Buku::find($id);
        $buku->update($request->except(['_token', 'submit']));
        return redirect('/buku');
    }
    public function hapusBuku($id)
    {
        $buku = Buku::findOrfail($id);
        $buku->delete();
        return redirect('/buku');
    }
    //KategoriController
    public function indexKategori()
    {
        $kategori = Kategori::all();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function tambahKategori()
    {
        return view('kategori.tambah');
    }
    public function simpanKategori(Request $request)
    {
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/kategori');
    }

    public function editKategori($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact(['kategori']));
    }
    public function updateKategori($id, Request $request)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->except(['_token', 'submit']));
        return redirect('/kategori');
    }
    public function hapuskategori($id)
    {
        $kategori = kategori::findOrfail($id);
        $kategori->delete();
        return redirect('/kategori');
    }

    //PinjamController

    public function indexPinjam()
    {
        $user = Auth::user();
        if ($user->role == 'siswa') {
            $pinjam = Pinjam::join('anggota', 'anggota.kdAnggota', '=', 'pinjam.kdAnggota')
                ->join('buku', 'buku.kdBuku', '=', 'pinjam.kdBuku')
                ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
                ->get();
            //return $pinjam;
        } else {
            $pinjam = Pinjam::all();
        }
        return view('pinjam.index', compact(['pinjam']));
        //     $pinjam = Pinjam::join('anggota','anggota.kdAnggota','=','pinjam.kdAnggota')
        //     ->join('buku','buku.kdBuku','=','pinjam.kdBuku')
        //    ->get();

    }

    public function tambahPinjam()
    {
        // $pinjam = Pinjam::join('anggota', 'anggota.id', '=', 'pinjam.kdAnggota')
        //         ->join('buku', 'buku.id', '=', 'pinjam.kdBuku')
        //         ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
        //         ->get();
        return view('pinjam.tambah');
    }
    //     public function simpanPinjam(Request $request)
    //     {
    //         $admin = Auth::user()->id;
    //         $wong = $request->kdAnggota;
    //         $idbuku = $request->kdBuku;
    //         $tgl = $request->tgl_pinjam;
    //         $waktuSekarang = date('Y/m/d');
    //         $awal = strtotime($waktuSekarang);
    //         $akhir = Carbon::now()->addDays(5);

    //         $balik = $request->tgl_dibalikin;


    //         $from_date = Carbon::parse(date('Y-m-d', strtotime($akhir)));
    //         $through_date = Carbon::parse(date('Y-m-d', strtotime($balik)));

    //             $mengembalikan = $from_date->diffInDays($through_date);
    //             $sanksi = $mengembalikan * $request->denda;


    // $id = $request->id;
    //         $p = "BUK";
    //         $idPinjam = Pinjam::count();
    //         $ke = $idPinjam + 1;
    //         $kdPinjam = $p . $waktuSekarang . "/" . $admin . "/" . $wong . "/" . $idbuku . "/" . $ke;
    //          Pinjam::create([
    //             'kdPinjam' => $kdPinjam,
    //             'kdAnggota' => $wong,
    //             'kdBuku' => $idbuku,
    //             'tgl_pinjam' => $waktuSekarang,
    //             'tgl_balikin' => $from_date->toDateTimeString(),
    //             'tgl_mengembalikan' => $request->tgl_mengembalikan,
    //             'denda' => $request->denda,
    //             'status' => $request->status,
    //             'jml' => $sanksi,
    //         ]);
    //         $pinjam = Pinjam::where('pinjam.id', $id)
    //             ->join('anggota', 'anggota.id', '=', 'pinjam.kdAnggota')
    //             ->join('buku', 'buku.id', '=', 'pinjam.kdBuku')
    //             ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
    //             ->get();
    //            // return $pinjam;
    //         return view('pinjam.bukti', ['pinjam'=>$pinjam]);


    // }

    public function simpanPinjam(Request $request)
    {
        $tgl = date('Ymd');
        $s = date('s');
        $anggota = $request->kdAnggota;
        $buku = $request->kdBuku;
        $idAdmin = Auth::user()->id;
        $kdPinjam = $anggota . "/" . $tgl . "/" . $s;
        $cekAnggota = Anggota::where('kdAnggota', $anggota)->count();
        $cekBuku = Buku::where('kdBuku', $buku)->count();
        if ($cekAnggota > 0) {
        if ($cekBuku > 0) {
            $pinjam = Pinjam::where('kdAnggota', $anggota)->where('kdBuku', $buku)->where('status', 'pinjam')->count();
            if ($pinjam == 0) {

                $batas = Batasan::all();
                $meminjam = strtotime($tgl);
                $lama = $batas[0]->lama;
                $kembali = Carbon::now()->addDays($lama);
                // $kembali = date('Ymd', strtotime(('+' . $lama . 'days' . $meminjam)));
                $request->session()->put('kembali', $kembali);

                Pinjam::create([
                    'kdPinjam' => $kdPinjam,
                    'tgl_pinjam' => $tgl,
                    'kdAnggota' => $anggota,
                    'kdBuku' => $buku,
                     'tgl_balikin' => $kembali,
                    'status' => 'pinjam'
                ]);

                $pinjam = Pinjam::where('kdPinjam', $kdPinjam)
                    ->join('anggota', 'anggota.kdAnggota', '=', 'pinjam.kdAnggota')
                    ->join('buku', 'buku.kdBuku', '=', 'pinjam.kdBuku')
                    ->select('pinjam.*', 'nama_anggota', 'judul_buku')
                    ->get();


                return view('pinjam.bukti', ['pinjam' => $pinjam, 'batas' => $kembali]);
            } else {
                echo "anggota dengan kode" . $anggota . "telah meminjam buku dengan kode " . $buku;
            }
        } else {
            echo "Anggota tidak ditemukan";
        }

        }else{
            echo "Buku tidak ditemukan";
    }
}

    public function editPinjam($id)
    {
        $pinjam = Pinjam::find($id);
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('pinjam.edit', compact(['pinjam', 'buku', 'anggota']));
    }
    public function updatePinjam($id, Request $request)
    {
        $pinjam = Pinjam::find($id);
        $pinjam->update($request->except(['_token', 'submit']));
        return redirect('/pinjam/bukti/{id}');
    }
    public function hapusPinjam($id)
    {
        $pinjam = Pinjam::findOrFail($id);

        $pinjam->delete();
        return redirect('/pinjam');
    }
    public function buktiPinjam($id)
    {
    }
    // public function mengembalikanPinjam()
    // {

    //     $pinjam = Pinjam::query()
    //         ->join('anggota', 'anggota.id', '=', 'pinjam.kdAnggota')
    //         ->join('buku', 'buku.id', '=', 'pinjam.kdBuku')
    //         ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
    //         ->get();
    //     return view('pinjam.balik', ['pinjam' => $pinjam]);
    // }
    public function cari(Request $request)
    {

        $cari = $request->kdPinjam;
        $pinjam = DB::table('pinjam')

        ->where('kdPinjam', $cari )

            ->count();
if($pinjam >0){
$pinjam = DB::table('pinjam')
->join('anggota', 'anggota.kdAnggota', '=', 'pinjam.kdAnggota')
->join('buku', 'buku.kdBuku', '=', 'pinjam.kdBuku')
->where('kdPinjam', $cari )
->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
    ->first();
}else{
    echo 'data kosong';
    return;
}

        return view('pinjam.kembali', ['pinjam' => $pinjam, 'cari' => $cari]);
    }

    public function tambahBatasan()
    {
        $batas = Batasan::all();
        return view('pinjam.batas', ['batas' => $batas]);
    }
    public function simpanBatasan(Request $request)
    {
        $denda = $request->denda;
        $lama = $request->lama;

        $batas = Batasan::all()->count();
        if ($batas == 0) {
            Batasan::create([
                'lama' => $lama,
                'denda' => $denda
            ]);
        } else {
            DB::table('batasan')->update([
                'lama' => $lama,
                'denda' => $denda
            ]);
        }
        return redirect('/batas');
    }
    public function kembali()
    {
        return view('pinjam.kembali');
    }
    public function prosesKembali(Request $request)
    {
        $batas = Batasan::first();
        $tgl = date('Ymd')+10;
        $kode = $request->kdPinjam;
        $dataPinjam = Pinjam::where('kdPinjam', $kode)->first();
        $tglConvert =  date('Ymd', strtotime($dataPinjam->tgl_balikin));
        $diff =  $tglConvert - $tgl;
        $convertToPositive = abs($diff);
        $jml= $convertToPositive *$batas->denda;

        if($diff < 0){
            $convertToPositive = abs($diff);
                Pinjam::where('kdPinjam', $kode)->update([
                    'status' => 'tersedia',
                    'tgl_mengembalikan' => $tgl,
                    'denda' => $batas->denda,
                    'jml'=> $jml
                ]);
                $pinjam = Pinjam::where('kdPinjam', $kode)
                    ->join('anggota', 'anggota.kdAnggota', '=', 'pinjam.kdAnggota')
                    ->join('buku', 'buku.kdBuku', '=', 'pinjam.kdBuku')
                    ->select('pinjam.*', 'nama_anggota', 'judul_buku')
                    ->first();
                return redirect('/pinjam');

        }else{
            Pinjam::where('kdPinjam', $kode)->update([
                'status' => 'tersedia',
                'tgl_mengembalikan' => $tgl,
                'jml' => 0
            ]);
            $pinjam = Pinjam::where('kdPinjam', $kode)
                ->join('anggota', 'anggota.kdAnggota', '=', 'pinjam.kdAnggota')
                ->join('buku', 'buku.kdBuku', '=', 'pinjam.kdBuku')
                ->select('pinjam.*', 'nama_anggota', 'judul_buku')
                ->first();
            return redirect('/pinjam');
        }

    }

    public function formBalik(){
        return view('pinjam.kembali', ['pinjam' => null]);
    }

}
