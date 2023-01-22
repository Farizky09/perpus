@extends('layouts.app')
@push('style')
    <!-- CSS Libraries -->

    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.1/css/rowReorder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush
@section('main')
    <div class="main-content">
        <div class="card p-5">
            <div class="row ml-1 w-100">
                <div class="mr-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                </div>
                <div class="">
                    <a href="/pinjam/formBalik" class="btn btn-primary">Balikin</a>
                </div>

            </div>

            <hr>
            <div class="table-responsive">
                <table class="table" id="table-1">
                    <thead>
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
                    </thead>
                    <tbody>
                        @foreach ($pinjam as $pinjam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pinjam->kdPinjam }}</td>
                                <td>{{ $pinjam->nama_anggota }}</td>
                                <td>{{ $pinjam->judul_buku }}</td>
                                <td>{{ $pinjam->tgl_pinjam }}</td>
                                <td>{{ $pinjam->tgl_balikin }}</td>
                                <td>{{ $pinjam->tgl_mengembalikan }}</td>
                                <td>{{ $pinjam->denda }}</td>
                                @if ($pinjam->status == 'tersedia')
                                    <td>
                                        <div class="bg-success text-center p-2 rounded text-white">

                                            Dikembalikan
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div class="bg-warning text-center p-2 rounded text-white">
                                            {{ $pinjam->status }}
                                    </td>
                                @endif
                                <td>{{ $pinjam->jml }}</td>

                                <td class="text-center">
                                    <a class="btn btn-danger" href="/pinjam/delete/{{ $pinjam->id }}">Delete</a>
                                    <a href="/cetakBukti/{{ $pinjam->id }}" class="btn btn-primary ">Cetak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pinjam/store" method="POST">
                            @csrf
                            Nama Anggota :
                            <input class="form-control" type="text" name="kdAnggota">
                            Judul Buku :
                            <input class="form-control" type="text" name="kdBuku">
                            <input class="btn btn-primary mt-2" type="submit" value="simpan">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
