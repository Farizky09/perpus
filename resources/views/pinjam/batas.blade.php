@extends('layouts.app')
@section('main')
    <div class="main-content">
        <div class="card p-5">
            <div class="card-header">
                <h3 class="text-primary">Tentukan Batas Pinjam</h3><br>
            </div>

            <div class="card-body">
                <form action="/batas/simpan" method="POST">
                    @csrf
                    Lama Pinjam:
                    <input class="form-control" type="text" name="lama" required><br>
                    Denda :
                    <input class="form-control" type="text" name="denda" required><br>
                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                </form>

            </div>
        </div>
        <div class="card w-50 p-5 text-center d-flex mx-auto">
            <h2>Batasan Pinjam BUKU</h2>
            <hr>
            <table class="text-left">
                @foreach ($batas as $batas)
                    <tr>
                        <td> Lama Pinjam :</td>
                        <td>{{ $batas->lama }} Hari terhitung dari tgl pinjam</td>
                    </tr>
                    <tr>
                        <td> Denda jika terlambat :</td>
                        <td>Rp.{{ $batas->denda }} per hari terlambat</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
