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
    <input type="text" name="kdAnggota">
    Judul Buku :
    <input type="text" name="kdBuku">


    <input type="submit" value="simpan">
</form>
