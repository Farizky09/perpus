<form action="/pinjam/cari" method="GET">
    @csrf
    <input type="text" name="kdPinjam">
    <input type="submit" name="cari" placeholder="masukkan kode">
</form>
@if (!is_null($pinjam))

    <form action="/pinjam/balik" method="POST">
        @csrf
        <h5>Nomor : {{ $pinjam->kdPinjam }}</h5>
        <table>
            <tr>
                <td>tanggal Pinjam</td>
                <td>{{$pinjam->tgl_pinjam}}</td>
            </tr>
            <tr>
                <td>Nama peminjam :</td>
                <td>{{ $pinjam->nama_anggota }}</td>
            </tr>
            <tr>
                <td> Judul Buku :</td>
                <td> {{ $pinjam->judul_buku }}</td>
            </tr>

            <tr>
                <td> Harus kembali</td>
                <td>{{ $pinjam->tgl_balikin }}</td>
            </tr>
            @if (is_null($pinjam->denda))
                @if (date('Ymd') + 10 > date('Ymd', strtotime($pinjam->tgl_balikin)))
                    <td> Denda</td>
                    <td>{{ (date('Ymd') + 10 - date('Ymd', strtotime($pinjam->tgl_balikin))) * App\Models\Batasan::first()->denda }}
                    </td>
                @endif
            @else
                <tr>
                    <td> Denda</td>
                    <td>{{ $pinjam->jml }}</td>
                </tr>
            @endif
            <tr>
                <td>Petugas</td><br>
                <td>{{ Auth::user()->name }}</td>

            </tr>


        </table>
        <input type="text" name="kdPinjam" value="{{ $pinjam->kdPinjam }}" hidden><br>
        <input type="submit" value="yes"><br>
        <input type="reset" value="reset">
    </form>

@endif
</div>
