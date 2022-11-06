<h1>Bukti pinjam</h1>
<table>
    @foreach ($pinjam as $pinjam)

    <tr>
        <td>Nomor</td><td>:</td><td>{{$pinjam->nomor}}</td>
    </tr>
    <tr>
        <td>tanggal Pinjam</td><td>:</td> <td>{{$pinjam->tgl_pinjam}}</td>
    </tr>
    <tr>
        <td>Tanggal BAlikin</td><td>:</td> <td>{{$pinjam->tgl_balikin}}</td>
    </tr>
    <tr>
        <td>tanggal dibalikin</td><td>:</td>  <td>{{$pinjam->tgl_mengembalikan}}</td>
    </tr>

    <tr>
        <td>status</td><td>:</td>  <td>{{$pinjam->status}}</td>
    </tr>
    <tr>
        <td>jumlah</td><td>:</td> <td>{{$pinjam->jml}}</td>
    </tr>

    <tr>
        <td>Nama Peminjam</td><td>:</td>


        <td>
            {{$pinjam->nama_anggota}}

        </td>

    </tr>


    <tr>
        <td>Judul buku</td><td>:</td><td>{{$pinjam->judul_buku}}</td>

    </tr>


</table>

@endforeach
<h1 class="center"> Lunas</h1>

<a href="/pinjam">balik cuy</a>
