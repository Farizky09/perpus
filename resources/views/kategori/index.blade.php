<h1>Data kategori</h1>
<button><a href="/kategori/create">Tambah</a></button>
<table>
    <tr>
        <th>id</th>
        <th>nama_kategori</th>

        <th>Action</th>
    </tr>
    @foreach ($kategori as $kategori )
    <tr>
        <td>{{$kategori->id_kategori}}</td>
        <td>{{$kategori->nama_kategori}}</td>

            <a href="/kategori/edit/{{$kategori->id_kategori}}"><button>Edit</a></button>
            <a href="/kategori/delete/{{$kategori->id_kategori}}"><button>delete</a></button>
        </td>
    </tr>

    @endforeach
</table>
