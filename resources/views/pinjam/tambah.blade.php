<form action="/pinjam/store" method="POST">
    @csrf
    {{--  tgl_pinjam :
    <input type="date" name="tgl_pinjam"><br>  --}}
    {{--  @foreach ($pinjam as $pinjam)
    nomor :
        <input type="text" name="nomor" readonly value="{{ $pinjam->nomor }}">
        <br>
        @endforeach  --}}
        Nama Anggota :
<select name="id_anggota">
    <option value="0">pilih anggota</option>
    @foreach ($anggota as $anggota)
    <option value="{{$anggota->id}}">{{$anggota->nama_anggota}}</option>

    @endforeach
</select><br>
Judul Buku :
<select name="id_buku">
    <option value="0">pilih buku</option>
    @foreach ($buku as $buku)
    <option value="{{$buku->id}}">{{$buku->judul_buku}}</option>

    @endforeach
</select><br>


    <input type="submit" value="simpan">
</form>
