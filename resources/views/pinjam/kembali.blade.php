@extends('layouts.app')
@section('main')
    <div class="main-content">
        <div class="card p-4">
            <form action="/pinjam/cari" method="GET">
                @csrf
                <div class="row">
                    <div class="col-lg-11">
                        <input class="form-control" type="text" name="kdPinjam">
                    </div>
                    <div class="col-lg-1">
                        <input class="btn btn-primary w-100" type="submit" name="cari" placeholder="masukkan kode">
                    </div>
                </div>
            </form>
        </div>
        @if (!is_null($pinjam))

            <div class="card p-4">
                <form action="/pinjam/balik" method="POST">
                    @csrf
                    <h5>Nomor : {{ $pinjam->kdPinjam }}</h5>
                    <table>
                        <tr>
                            <td>tanggal Pinjam</td>
                            <td>:</td>
                            <td>{{ $pinjam->tgl_pinjam }}</td>
                        </tr>
                        <tr>
                            <td>Nama peminjam</td>
                            <td>:</td>
                            <td>{{ $pinjam->nama_anggota }}</td>
                        </tr>
                        <tr>
                            <td> Judul Buku</td>
                            <td>:</td>
                            <td> {{ $pinjam->judul_buku }}</td>
                        </tr>

                        <tr>
                            <td> Harus kembali</td>
                            <td>:</td>
                            <td>{{ $pinjam->tgl_balikin }}</td>
                        </tr>
                        @if (is_null($pinjam->denda))
                            @if (date('Ymd') > date('Ymd', strtotime($pinjam->tgl_balikin)))
                                <td>Denda</td>
                                <td>:</td>
                                <td>{{ (date('Ymd') - date('Ymd', strtotime($pinjam->tgl_balikin))) * App\Models\Batasan::first()->denda }}
                                </td>
                            @endif
                        @else
                            <tr>
                                <td> Denda</td>
                                <td>:</td>
                                <td>{{ $pinjam->jml }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Petugas</td>
                            <td>:</td><br>
                            <td>{{ Auth::user()->name }}</td>

                        </tr>


                    </table>
                    <input type="text" name="kdPinjam" value="{{ $pinjam->kdPinjam }}" hidden><br>
                    <input class="btn btn-success" type="submit" value="yes">
                </form>
            </div>

        @endif

    </div>

@endsection
