<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('rental.index') }}">RentalMobil</a>
            <div>
                <a class="text-white me-3 text-decoration-none" href="{{ route('rental.index') }}">Daftar Paket</a>
                <a class="text-white text-decoration-none" href="{{ route('rental.create') }}">Tambah Paket</a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="text-center my-4">
            <h2>Modul Paket Rental</h2>
            <a href="{{ route('rental.create') }}" class="btn btn-primary mt-2">+ Tambah Paket</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Jenis</th>
                    <th>Durasi</th>
                    <th>Ketentuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pakets as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_paket }}</td>
                    <td>{{ $row->jenis }}</td>
                    <td>{{ $row->durasi }} hari</td>
                    <td>{{ $row->ketentuan }}</td>
                    <td>
                        <a href="{{ route('rental.edit', $row->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                        <form action="{{ route('rental.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>