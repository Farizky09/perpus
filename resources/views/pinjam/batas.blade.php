<h1>Batasan Pinjam</h1><br>

<h3>Tentukan Batas Pinjam</h3><br>

<form action="/batas/simpan" method="POST">
    @csrf
Lama Pinjam:
<input type="text" name="lama"><br>
Denda :
<input type="text" name="denda"><br>
<button type="submit">Simpan</button>
</form>


<h2>Batasan Pinjam BUKU</h2>
<table>
@foreach ($batas as $batas)
<tr>
    <td> Lama Pinjam :</td>
    <td>{{$batas->lama}} Hari terhitung dari tgl pinjam</td>
</tr>
<tr>
    <td> Denda jika terlambat :</td>
    <td>Rp.{{$batas->denda}} per hari terlambat</td>
</tr>

@endforeach
</table>
