<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kategori</title>
</head>
<body>
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}">Tambah Kategori</a>
    <table border="1">
        <tr>
            <th>ID Kategori</th>
            <th>jenis_karya</th>
            <th>Aksi</th>
        </tr>
        @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id_kategori }}</td>
                <td>{{ $kategori->jenis_karya }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $kategori->id_kategori) }}">Edit</a>
                    <form action="{{ route('kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
