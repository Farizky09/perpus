<h1>Data buku</h1>
<button><a href="/buku/create">Tambah</a></button>
<table>
    <tr>
        <th>id</th>
        <th>judul_buku</th>
        <th>nama_pengarang</th>
        <th>nama_penerbit</th>
        <th>tahun_terbit</th>
        <th>Action</th>
    </tr>
    @foreach ($buku as $buku )
    <tr>
        <td>{{$buku->id}}</td>
        <td>{{$buku->judul_buku}}</td>
        <td>{{$buku->nama_pengarang}}</td>
        <td>{{$buku->nama_penerbit}}</td>
        <td>{{$buku->tahun_terbit}}</td>
        <td>
            <a href="/buku/edit/{{$buku->id}}"><button>Edit</a></button>
            <a href="/buku/delete/{{$buku->id}}"><button>delete</a></button>
        </td>
    </tr>

    @endforeach
</table>
