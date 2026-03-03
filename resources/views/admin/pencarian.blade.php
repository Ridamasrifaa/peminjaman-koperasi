<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pencarian</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/feather-icons"></script>
  @vite('resources/css/style-fe.css')
</head>
<body class="body-search">
<div class="app-search">

  <div class="content-search">
    <form action="{{ route('admin.pencarian') }}" method="GET" class="search-bar">
      <i style="color: black;" data-feather="search"></i>
      <input type="text" name="q" placeholder="Search" value="{{ request('q') }}">
    </form>

    <div class="user-box">
      @forelse($anggota as $p)
        @php
          $pinjamanPertama = $p->pinjaman->first(); // aman karena eager loaded
        @endphp
       <a href="{{ $pinjamanPertama 
    ? route('pinjaman.detail', $pinjamanPertama->id) 
    : route('admin.pinjaman.ajukan', $p->id) }}" class="user">
          <div class="avatar-search">
            <img src="{{ $p->avatar ?? 'default-avatar.png' }}" alt="avatar">
          </div>
          <div class="info">
            <strong>{{ $p->nama }}</strong>
            <span>{{ substr($p->no_hp, 0, 2) }}********</span>
          </div>
        </a>
      @empty
        <p>Tidak ada data.</p>
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

</div>

<script>
  feather.replace();
</script>
</body>
</html>