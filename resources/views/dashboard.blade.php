<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <a href="{{ route('calon-karyawan.create') }}">Tambah Calon Karyawan</a>
    <ul>
        @foreach ($calonKaryawans as $calon)
            <li>{{ $calon->nama }} - {{ $calon->email }}</li>
        @endforeach
    </ul>
</body>

</html>
