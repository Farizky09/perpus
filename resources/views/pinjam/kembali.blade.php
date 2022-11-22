<form action="/pinjam/cari" method="GET">
    @csrf
    <input type="text" name="kdPinjam">
    <input type="submit" name="cari" placeholder="masukkan kode">
</form>
  
    <form action="/pinjam/updateKembali" method="POST">
        @csrf
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
    <input type="submit" value="yes"><br>
    <input type="reset" value="reset">
</form>
</div>