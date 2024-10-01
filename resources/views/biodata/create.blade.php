<!DOCTYPE html>
<html>
<head>
    <title>Tambah Biodata</title>
</head>
<body>
    <h1>Tambah Biodata Mahasiswa</h1>
    <form action="{{ route('biodata.store') }}" method="POST">
        @csrf
        <label>NIM:</label>
        <input type="text" name="nim_mhs" required><br>
        <label>Nama:</label>
        <input type="text" name="nama_mhs" required><br>
        <label>Prodi:</label>
        <input type="text" name="prodi" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>No HP:</label>
        <input type="text" name="no_hp" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('biodata.index') }}">Kembali</a>
</body>
</html>
