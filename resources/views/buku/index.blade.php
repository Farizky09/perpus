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
            <div class="row col-12">
                <div class="lg-3 mr-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                </div>

            </div>

            <hr>
            <div class="table-responsive">
                <table class="table" id="table-1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $buku)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $buku->kdBuku }}</td>
                                <td>{{ $buku->judul_buku }}</td>
                                <td>{{ $buku->nama_pengarang }}</td>
                                <td>{{ $buku->nama_penerbit }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                                <td>
                                    <a class="btn btn-warning" href="/buku/edit/{{ $buku->id }}">Edit</a>
                                    <a class="btn btn-danger" href="/buku/delete/{{ $buku->id }}">delete</a>
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
                        <form action="/buku/store" method="POST">
                            @csrf
                            <?php
                            $s = date('s');
                            $p = date('Ymd');
                            $kdBuku = 'BUK' . '/' . $p . '/' . $s;
                            ?>
                            kode Buku :
                            <input type="text" class="form-control" name="kdBuku" value="{{ $kdBuku }}"
                                readonly><br>
                            judul_buku :
                            <input type="text" class="form-control" name="judul_buku"><br>
                            nama_pengarang :
                            <input type="text" class="form-control" name="nama_pengarang"><br>
                            nama_penerbit :
                            <input type="text" class="form-control" name="nama_penerbit"><br>
                            tahun_terbit :
                            <input type="text" class="form-control" name="tahun_terbit"><br>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                    </form>
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
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
