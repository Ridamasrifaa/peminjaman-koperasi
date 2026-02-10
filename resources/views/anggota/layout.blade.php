<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('anggota.dashboard') }}">Koperasi</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('anggota.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anggota.cicilan') }}">Cicilan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anggota.profile') }}">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anggota.customer_service') }}">CS</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('anggota.partials.logout_modal')
    <script>
        feather.replace();
        function openModal() { document.getElementById('logoutModal').style.display = 'flex'; }
        function closeModal() { document.getElementById('logoutModal').style.display = 'none'; }
    </script>
</body>
</html>
