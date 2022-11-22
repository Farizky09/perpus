<form action="/buku/store" method="POST">
@csrf
<?php
$s = date('s');
$p = date('Ymd');
$kdBuku = "BUK"."/".$p."/".$s;
?>
kode Buku :
<input type="text" name="kdBuku" value="{{$kdBuku}}" readonly><br>
judul_buku :
<input type="text" name="judul_buku"><br>
nama_pengarang :
<input type="text" name="nama_pengarang" ><br>
nama_penerbit :
<input type="text" name="nama_penerbit"><br>
tahun_terbit :
<input type="text" name="tahun_terbit" ><br>
<input type="submit" value="simpan">
</form>
