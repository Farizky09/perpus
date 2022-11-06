<form action="/kategori/update/{{$kategori->id_kategori}}" method="POST">
    @csrf
    nama_kategori :
    <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}"><br>

    <input type="submit" value="simpan">
    </form>
