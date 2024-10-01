<!DOCTYPE html>
<html>
<head>
    <title>Detail Biodata</title>
</head>
<body>
    <h1>Detail Biodata Mahasiswa</h1>
    <p>NIM: {{ $biodata->nim_mhs }}</p>
    <p>Nama: {{ $biodata->nama_mhs }}</p>
    <p>Prodi: {{ $biodata->prodi }}</p>
    <p>Jurusan: {{ $biodata->jurusan }}</p>
    <p>Email: {{ $biodata->email }}</p>
    <p>No HP: {{ $biodata->no_hp }}</p>
    <a href="{{ route('biodata.index') }}">Kembali</a>
</body>
</html>
