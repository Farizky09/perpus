<form action="/buku/update/{{$buku->id_buku}}" method="POST">
    @csrf
    judul_buku :
    <input type="text" name="judul_buku" value="{{$buku->judul_buku}}"><br>
    nama_pengarang :
    <input type="text" name="nama_pengarang" value="{{$buku->nama_pengarang}}" ><br>
    nama_penerbit :
    <input type="text" name="nama_penerbit" value="{{$buku->nama_penerbit}}"><br>
    tahun_terbit :
    <input type="text" name="tahun_terbit"  value="{{$buku->tahun_terbit}}"><br>
    <input type="submit" value="simpan">
    </form>
