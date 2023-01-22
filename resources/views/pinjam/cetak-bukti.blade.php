<html>

<body style="height: 40%; width: fit-content;">
    <h5>Nomor : {{ $pinjam->kdPinjam }}</h5>
    <table>
        <tr>
            <td>tanggal Pinjam</td>
            <td>{{ $pinjam->tgl_pinjam }}</td>
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
            <td> Harus kembali :</td>
            <td>{{ $pinjam->tgl_balikin }}</td>
        </tr>
        <br>
        <br>
        <tr>
            <td></td>
            <td style="text-align: right;">Petugas</td>
        </tr>
        <br>
        <br>
        <br>
        <tr>
            <td></td>
            <td style="text-align: right;">{{ Auth::user()->name }}</td>
        </tr>
    </table>

</body>

</html>
