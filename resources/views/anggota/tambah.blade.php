<form action="/anggota/store" method="POST">
    @csrf

nama_anggota :
<input type="text" name="nama_anggota"><br>
jk_anggota :
<select name="jk_anggota" >
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
</select><br>
nohp_anggota :
<input type="text" name="nohp_anggota" ><br>
kelas_anggota :
<select name="kelas_anggota" >
    <option value="0">Pilih kelas</option>
    <option value="RPL1">RPL1</option>
    <option value="RPL2">RPL2</option>
</select><br>
<input type="submit" value="simpan">
</form>
