<!DOCTYPE html>
<html>

<head>
    <title>Download Script Form Input Data | PHP MySQL Tutorial</title>
    <style type="text/css" media="screen">
        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        input {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            height: 20px;
        }
    </style>
</head>

<body>
    <form action="/pinjam/cari" method="GET">
        @csrf
        <tr height="46">
            <td> </td>
            <td>Nomor</td>
            <td><input type="text" name="cari" value="{{ old('cari') }}" size="35" maxlength="60" />
                <input type="submit" value="CARI" />
            </td>
        </tr>
    </form>
    @forelse ($pinjam as $pinjam)
        <div style="border:0; padding:10px; width:760px; height:auto;">
            <form action="/pinjam/update" method="POST" name="form-input-data">
                @csrf
                <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr height="46">
                        <td width="10%"> </td>
                        <td width="25%"> </td>
                        <td width="65%">
                            <font color="orange" size="2">Form Check Data Peminjaman </font>
                        </td>
                    </tr>

                    <!--isi method buat search data by nomor -->

                    <!--hanya diatas yang dikirim dan di muat ulang -->

                    <tr height="46">
                        <td> </td>
                        <td>Nama Siswa</td>
                        <td><input type="text" name="nama_anggota" value="{{ $pinjam->nama_anggota }}"
                                disabled="disabled" size="50" maxlength="30" /></td>
                    </tr>


                    <tr height="46">
                        <td> </td>
                        <td>Nama Buku</td>
                        <td><input type="text" name="judul_buku" value="{{ $pinjam->judul_buku }}"
                                disabled="disabled" size="50" maxlength="30" /></td>
                    </tr>


                    <tr height="46">
                        <td> </td>
                        <td>Tanggal Pinjam</td>
                        <td><input type="text" name="tgl_pinjam" value="{{ $pinjam->tgl_pinjam }}"
                                disabled="disabled" size="50" maxlength="30" /></td>
                    </tr>
                    <tr height="46">
                        <td> </td>
                        <td>Tanggal Kembali</td>
                        <td><input type="text" name="tgl_balikin" value="{{ $pinjam->tgl_dibalikin }}"
                                disabled="disabled" size="50" maxlength="30" /></td>
                    </tr>

                    <tr height="46">
                        <td> </td>
                        <td>Denda</td>
                        <td><input type="text" name="telepon" disabled="disabled" size="20" maxlength="12" />
                        </td>
                    </tr>
                    <tr height="46">
                        <td> </td>
                        <td>Apakah Buku Sudah Dikembalikan ? </td>
                        <td><input type="submit" name="Submit" value="YA">
                            <input type="reset" name="reset" value="Cancel">
                        </td>
                    </tr>
                </table>
            </form>
        @empty
            <tr height="46">
                <td> </td>
                <td>Nama Siswa</td>
                <td><input type="text" name="nama_anggota" disabled="disabled" size="50" maxlength="30" /></td>
            </tr>


            <tr height="46">
                <td> </td>
                <td>Nama Buku</td>
                <td><input type="text" name="judul_buku" disabled="disabled" size="50" maxlength="30" /></td>
            </tr>


            <tr height="46">
                <td> </td>
                <td>Tanggal Pinjam</td>
                <td><input type="text" name="tgl_pinjam" disabled="disabled" size="50" maxlength="30" /></td>
            </tr>
            <tr height="46">
                <td> </td>
                <td>Tanggal Kembali</td>
                <td><input type="text" name="tgl_balikin" disabled="disabled" size="50" maxlength="30" /></td>
            </tr>

            <tr height="46">
                <td> </td>
                <td>Denda</td>
                <td><input type="text" name="telepon" disabled="disabled" size="20" maxlength="12" /></td>
            </tr>
            <tr height="46">
                <td> </td>
                <td>Apakah Buku Sudah Dikembalikan ? </td>
                <td><input type="submit" name="Submit" value="YA">
                    <input type="reset" name="reset" value="Cancel">
                </td>
            </tr>
            </table>
            </form>

        </div>
</body>

</html>
@endforelse
