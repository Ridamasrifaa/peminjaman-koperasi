<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Anggota</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>
@vite('resources/js/app.js')
</head>

<body class="body-tambah">
<div class="mobile-tambah">

<div class="header-tambah">
    <div class="icon-btn">
        <a href="{{ url('/admin/pencarian') }}"><i data-feather="arrow-left"></i></a>
    </div>
    <h6>Tambah Anggota</h6>
    <div class="icon-btn">
        <img src="{{ asset('assets/images/smk.png') }}" alt="Profile" class="profile-img">
    </div>
</div>

<div class="container">
  <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo-tambah">

  <form id="formAnggota" action="{{ route('anggota.store') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
      </div>

      <div class="mb-3">
          <label class="form-label fw-semibold">Alamat</label>
          <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required>
      </div>

      <div class="mb-3">
          <label class="form-label fw-semibold">Nomor Telepon</label>
          <input type="tel" name="no_hp" class="form-control" placeholder="Masukan Nomor Telepon" required>
      </div>

      <!-- user login -->
      <input type="hidden" name="id_users" value="{{ auth()->id() }}">

      <div class="d-grid mb-4">
          <button type="submit" class="btn-kirim-tambah w-100">Kirim</button>
      </div>
  </form>
</div>

<div class="bottom-nav-edit">
    <a href="{{ route('anggota.create') }}" class="menu-edit">
        <i data-feather="plus"></i>
    </a>

    <a href="{{ url('/admin/pencarian') }}" class="menu-edit">
        <i data-feather="search"></i>
    </a>

    <a href="{{ url('/admin/profile') }}" class="menu-edit">
        <i data-feather="user"></i>
    </a>
</div>

</div>

<script>
    feather.replace();
</script>
</body>
</html>
