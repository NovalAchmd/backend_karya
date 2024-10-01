<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #dddddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Karya Mahasiswa</h1>
    <a href="{{ route('karya.create') }}">Tambah Karya</a>
    <table>
        <tr>
            <th>ID Karya</th>
            <th>NIM</th>
            <th>Deskripsi</th>
            <th>Tahun Rilis</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @if($karyas->isEmpty())
            <tr>
                <td colspan="7">Tidak ada karya yang ditemukan.</td>
            </tr>
        @else
            @foreach ($karyas as $item)
                <tr>
                    <td>{{ $item->id_karya }}</td>
                    <td>{{ $item->nim_mhs }}</td>
                    <td>{{ $item->desc_karya }}</td>
                    <td>{{ $item->tahun_rilis }}</td>
                    <td>{{ $item->kategori->jenis_karya ?? 'Tidak ada kategori' }}</td>
                    <td><img src="{{ asset($item->gambar_karya) }}" alt="Gambar Karya" width="100"></td>
                    <td>
                        <a href="{{ route('karya.edit', $item->id_karya) }}">Edit</a>
                        <form action="{{ route('karya.destroy', $item->id_karya) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</body>
</html>
