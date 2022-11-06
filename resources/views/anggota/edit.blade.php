
<form action="/anggota/update/{{$anggota->id_anggota}}" method="POST">
    @csrf

nama_anggota :
<input type="text" name="nama_anggota" value="{{$anggota->nama_anggota}}"><br>
jk_anggota :
<select name="jk_anggota" value="{{$anggota->jk_anggota}}" >
    <option value="0">Pilih jk</option>
    <option value="L"  @if ($anggota->jk_anggota == 'L') selected @endif>Laki-laki</option>
    <option value="P" @if ($anggota->jk_anggota == 'P') selected @endif>Perempuan</option>
</select><br>
nohp_anggota :
<input type="text" name="nohp_anggota" value="{{$anggota->nohp_anggota}}"><br>
kelas_anggota :
<select name="kelas_anggota" value="{{$anggota->kelas_anggota}}" >
<option value="0">Pilih kelas</option>
    <option value="RPL1" @if ($anggota->kelas_anggota == 'RPL1') selected @endif>RPL1</option>
    <option value="RPL2"@if ($anggota->kelas_anggota == 'RPL2') selected @endif>RPL2</option>
</select><br>
<input type="submit" value="simpan">
</form>
