<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Paket Rental</title>
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
        <h2>Ubah Paket</h2>
        <form action="{{ route('rental.update', $paket->id) }}" method="POST" class="card card-body">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Paket</label>
                <select name="jenis" class="form-select" required>
                    <option value="Lepas Kunci" {{ $paket->jenis == 'Lepas Kunci' ? 'selected' : '' }}>Lepas Kunci</option>
                    <option value="All-in" {{ $paket->jenis == 'All-in' ? 'selected' : '' }}>All-in</option>
                    <option value="Luar Kota" {{ $paket->jenis == 'Luar Kota' ? 'selected' : '' }}>Luar Kota</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Durasi (Hari)</label>
                <input type="number" name="durasi" class="form-control" min="1" value="{{ $paket->durasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ketentuan</label>
                <textarea name="ketentuan" class="form-control" rows="3" required>{{ $paket->ketentuan }}</textarea>
            </div>
            <div>
                <a href="{{ route('rental.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>
</html>