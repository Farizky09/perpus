<h1>Data pinjam</h1>

<h3>selamat datang {{Auth::user()->name}}</h3>
<button><a href="/pinjam/create">Tambah</a></button>
<button><a href="/pinjam/formBalik">Balikin</a></button>
<button><a href="/buku">buku</a></button>
<button><a href="/batas">Batas</a></button>
<button><a href="/anggota">anggota</a></button><hr>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
this.closest('form').submit();"
        class='sidebar-link'>
        <i class="bi bi-box-arrow-left"></i>
        <span>Logout</span>
    </a>
</form>
<table>
    <tr>
        <th>id</th>
        <th>Nomor</th>
        <th>Anggota</th>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Dikembalikan</th>
        <th>Tanggal Mengembalikan</th>
        <th>denda</th>
        <th>status</th>
        <th>Jumlah</th>


        <th>Action</th>
    </tr>
    @foreach ($pinjam as $pinjam )
    <tr>
        <td>{{$pinjam->id}}</td>
        <td>{{$pinjam->kdPinjam}}</td>
        <td>{{$pinjam->nama_anggota}}</td>
        <td>{{$pinjam->judul_buku}}</td>
        <td>{{$pinjam->tgl_pinjam}}</td>
        <td>{{$pinjam->tgl_balikin}}</td>
        <td>{{$pinjam->tgl_mengembalikan}}</td>
        <td>{{$pinjam->denda}}</td>
        @if ($pinjam->status == 'tersedia')
        <td>Sudah dikembalikan</td>
        @else
        <td>{{ $pinjam->status }}</td>
        @endif
        <td>{{$pinjam->jml}}</td>

        <td>
            <a href="/pinjam/edit/{{$pinjam->id}}"><button>Edit</a></button>
            <a href="/pinjam/delete/{{$pinjam->id}}"><button>Delete</a></button>

        </td>
    </tr>

    @endforeach
</table>







