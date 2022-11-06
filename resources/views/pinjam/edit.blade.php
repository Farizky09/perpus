
<form action="/pinjam/update/{{$pinjam->id}}" method="POST">
    @csrf

    {{--  <select name="id_anggota" >
        @foreach ($anggota as $anggota )
        <option value="{{$anggota->id_anggota}}" " @if ($anggota->id_anggota == 'id_anggota')
            selected @endif"> {{$anggota->nama_anggota}}</option>
            @endforeach
    </select>  --}}
    {{--  tgl_pinjam :
    <input type="date" name="tgl_pinjam" readonly value="{{$pinjam->tgl_pinjam}}"><br>
    tgl_balikin :
    <input type="date" name="tgl_balikin" readonly value="{{$pinjam->tgl_balikin}}" ><br>
    tgl_dibalikin :
    <input type="date" name="tgl_dibalikin" value="{{$pinjam->tgl_dibalikin}}" ><br>
    denda :
    <input type="text" name="denda" value="{{$pinjam->denda}}" ><br>
status :
<input type="text" name="status" value="{{$pinjam->status}}">  --}}
Tanggal balikin :
<input type="date" name="tgl_balikin">
denda :
<input type="text" name="denda">

<input type="submit" value="simpan">
</form>


