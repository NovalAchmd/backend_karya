<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>
    <h1>Tambah Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <label for="jenis_karya">Jenis Karya:</label>
        <input type="text" name="jenis_karya" id="jenis_karya" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('kategori.index') }}">Kembali</a>
</body>
</html>
