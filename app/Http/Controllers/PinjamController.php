<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pinjam;
use App\Models\User;
use Carbon\Carbon;
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
        $anggota = Anggota::create([
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
        $buku = Buku::create([
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
            $pinjam = Pinjam::join('anggota', 'anggota.id', '=', 'pinjam.id_anggota')
                ->join('buku', 'buku.id', '=', 'pinjam.id_buku')
                ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
                ->get();
            //return $pinjam;
        } else {
            $pinjam = Pinjam::all();
        }
        return view('pinjam.index', compact(['pinjam']));
        //     $pinjam = Pinjam::join('anggota','anggota.id_anggota','=','pinjam.id_anggota')
        //     ->join('buku','buku.id_buku','=','pinjam.id_buku')
        //    ->get();

    }

    public function tambahPinjam()
    {
        $pinjam = Pinjam::all();
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('pinjam.tambah', compact(['pinjam', 'buku', 'anggota']));
    }
    public function simpanPinjam(Request $request)
    {
        $admin = Auth::user()->id;
        $wong = $request->id_anggota;
        $idbuku = $request->id_buku;
        $tgl = $request->tgl_pinjam;
        $waktuSekarang = date('Y/m/d');
        $awal = strtotime($waktuSekarang);
        $akhir = Carbon::now()->addDays(5);

        $balik = $request->tgl_dibalikin;


        $from_date = Carbon::parse(date('Y-m-d', strtotime($akhir)));
        $through_date = Carbon::parse(date('Y-m-d', strtotime($balik)));
        if ($balik > $from_date) {
            $mengembalikan = $from_date->diffInDays($through_date);
            $sanksi = $mengembalikan * $request->denda;
        } else {
            $sanksi = "0";
            echo $sanksi;
        }


        $p = "BUK";
        $idPinjam = Pinjam::count();
        $ke = $idPinjam + 1;
        $nomor = $p . $waktuSekarang . "/" . $admin . "/" . $wong . "/" . $idbuku . "/" . $ke;
        $pinjam = Pinjam::create([
            'nomor' => $nomor,
            'id_anggota' => $wong,
            'id_buku' => $idbuku,
            'tgl_pinjam' => $waktuSekarang,
            'tgl_balikin' => $from_date->toDateTimeString(),
            'tgl_mengembalikan' => $request->tgl_mengembalikan,
            'denda' => $request->denda,
            'status' => $request->status,
            'jml' => $sanksi,
        ]);
        return redirect('/pinjam/bukti');
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
        $pinjam = Pinjam::where('id', $id)
            ->join('anggota', 'anggota.id', '=', 'pinjam.id_anggota')
            ->join('buku', 'buku.id', '=', 'pinjam.id_buku')
            ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
            ->get();
            return $pinjam;
        return view('pinjam.bukti', ['pinjam'=>$pinjam]);
    }
    public function mengembalikanPinjam()
    {

        $pinjam = Pinjam::query()
            ->join('anggota', 'anggota.id', '=', 'pinjam.id_anggota')
            ->join('buku', 'buku.id', '=', 'pinjam.id_buku')
            ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
            ->get();
        return view('pinjam.balik', ['pinjam' => $pinjam]);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pinjam = DB::table('pinjam')
            ->where('nomor', 'like', "%" . $cari . "%")
            ->select('pinjam.*', 'buku.judul_buku', 'anggota.nama_anggota',)
            ->paginate();
        // return $pinjam;
        return view('pinjam.balik', ['pinjam' => $pinjam, 'cari' => $cari]);
    }
}
