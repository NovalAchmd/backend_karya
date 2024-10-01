<!DOCTYPE html>
<html>
<head>
    <title>Edit Biodata</title>
</head>
<body>
    <h1>Edit Biodata Mahasiswa</h1>
    <form action="{{ route('biodata.update', $biodata->nim_mhs) }}" method="POST">
        @csrf
        @method('PUT')
        <label>NIM:</label>
        <input type="text" name="nim_mhs" value="{{ $biodata->nim_mhs }}" readonly><br>
        <label>Nama:</label>
        <input type="text" name="nama_mhs" value="{{ $biodata->nama_mhs }}" required><br>
        <label>Prodi:</label>
        <input type="text" name="prodi" value="{{ $biodata->prodi }}" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="{{ $biodata->jurusan }}" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $biodata->email }}" required><br>
        <label>No HP:</label>
        <input type="text" name="no_hp" value="{{ $biodata->no_hp }}" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('biodata.index') }}">Kembali</a>
</body>
</html>
