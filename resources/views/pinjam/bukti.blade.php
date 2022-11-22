<div class="container">
    <h3>bukti pinjam</h3>
    @foreach ($pinjam as $pinjam)
    <h5>Nomor : {{$pinjam->kdPinjam}}</h5>
    <table>
        <tr>
            <td>tanggal Pinjam</td>
            <td>{{date('Ymd')}}</td>
        </tr>
        <tr>
            <td>Nama peminjam :</td>
            <td>{{$pinjam->nama_anggota}}</td>
        </tr>
        <tr>
            <td> Judul Buku :</td>
            <td> {{$pinjam->judul_buku}}</td>
        </tr>

        <tr>
            <td> Harus kembali</td>
            <td>{{ Session::get('kembali') }}</td>
        </tr>
        <tr>
            <td>Petugas</td><br>
            <td>{{ Auth::user()->name }}</td>

        </tr>


    </table>
    @endforeach
</div>
