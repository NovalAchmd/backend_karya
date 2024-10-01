<!DOCTYPE html>
<html>
<head>
    <title>Daftar Biodata</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Biodata Mahasiswa</h1>
    
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('biodata.create') }}">Tambah Biodata</a>
    
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        @foreach ($biodatas as $biodatum) <!-- Ganti dari $biodata menjadi $biodatas -->
            <tr>
                <td>{{ $biodatum->nim_mhs }}</td>
                <td>{{ $biodatum->nama_mhs }}</td>
                <td>{{ $biodatum->prodi }}</td>
                <td>{{ $biodatum->jurusan }}</td>
                <td>{{ $biodatum->email }}</td>
                <td>{{ $biodatum->no_hp }}</td>
                <td>
                    <a href="{{ route('biodata.edit', $biodatum->nim_mhs) }}">Edit</a>
                    <form action="{{ route('biodata.destroy', $biodatum->nim_mhs) }}" method="POST" style="display:inline;">
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
