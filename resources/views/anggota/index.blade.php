<h1>Data Anggota</h1>
<button><a href="/anggota/create">Tambah</a></button>
<table>
    <tr>
        <th>id</th>
        <th>kode anggota</th>
        <th>nama_anggota</th>
        <th>jk_anggota</th>
        <th>nohp_anggota</th>
        <th>kelas_anggota</th>
        <th>Action</th>
    </tr>
    @foreach ($anggota as $anggota )
    <tr>
        <td>{{$anggota->id}}</td>
        <td>{{$anggota->kdAnggota}}</td>
        <td>{{$anggota->nama_anggota}}</td>
        <td>{{$anggota->jk_anggota}}</td>
        <td>{{$anggota->nohp_anggota}}</td>
        <td>{{$anggota->kelas_anggota}}</td>
        <td>
            <a href="/anggota/edit/{{$anggota->id}}"><button>Edit</a></button>
            <a href="/anggota/delete/{{$anggota->id}}"><button>delete</a></button>
        </td>
    </tr>

    @endforeach
</table>
