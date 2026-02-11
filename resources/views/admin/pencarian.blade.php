<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pencarian</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/feather-icons"></script>
  @vite('resources/js/app.js')
  
</head>
<body class="body-search">
<div class="app-search">

  <div class="content-search">
   <form action="{{ route('admin.pencarian') }}" method="GET" class="search-bar">
  <i style="color: black;" data-feather="search"></i>
  <input type="text" name="q" placeholder="Search" value="{{ request('q') }}">
</form>

 <div class="user-box">
@forelse($pinjaman as $p)
  <a href="{{ route('pinjaman.detail', $p->id) }}" class="user">
    <strong>{{ $p->anggota->nama }}</strong>
    <span>Rp {{ number_format($p->jumlah_pinjaman) }}</span>
  </a>
@empty
  <p>Tidak ada data</p>
@endforelse
</div>


    <div class="empty">
      <img src="/assets/images/pencarian.png" class="search-icon">
    </div>
  </div>
 <div class="bottom-nav-search">
  <a href="{{ route('anggota.create') }}"><i data-feather="plus"></i></a>
  <a href="{{ route('admin.pencarian') }}"><i data-feather="search"></i></a>
  <a href="{{ url('/admin/profile') }}"><i data-feather="user"></i></a>
</div>
>
</div>

<script>
  feather.replace();
</script>
</body>
</html>