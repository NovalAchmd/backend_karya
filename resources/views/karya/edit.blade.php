<!DOCTYPE html>
<html>
<head>
    <title>Edit Karya</title>
</head>
<body>
    <h1>Edit Karya</h1>
    <form action="{{ route('karya.update', $karya->id_karya) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nim_mhs">NIM:</label>
        <input type="text" name="nim_mhs" id="nim_mhs" value="{{ $karya->nim_mhs }}" required>

        <label for="desc_karya">Deskripsi Karya:</label>
        <textarea name="desc_karya" id="desc_karya" required>{{ $karya->desc_karya }}</textarea>

        <label for="tahun_rilis">Tahun Rilis:</label>
        <input type="number" name="tahun_rilis" id="tahun_rilis" value="{{ $karya->tahun_rilis }}" required>

        <label for="id_kategori">Kategori:</label>
        <select name="id_kategori" id="id_kategori" required>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $karya->id_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        <label for="gambar_karya">Gambar Karya:</label>
        <input type="file" name="gambar_karya" id="gambar_karya" accept="image/*">

        <button type="submit">Update Karya</button>
    </form>
    <a href="{{ route('karya.index') }}">Kembali ke Daftar Karya</a>
</body>
</html>
