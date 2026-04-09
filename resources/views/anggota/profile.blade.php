<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/style-fe.css')
<meta charset="UTF-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="../../assets/style.css">
</head>
<body class="body-pu">

<div class="app-pu">
<div class="header-pu">
<a href="{{ route('anggota.dashboard') }}"><i data-feather="arrow-left"></i></a>
</div>

<div class="content-pu">
<div class="card-area-pu">

<div class="card-profile-pu shadow">
    @if(auth()->user()->foto)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}?v={{ time() }}"
            class="avatar-pu"
            style="margin-bottom: 8px;">
    @else
        <img src="{{ asset('assets/images/') }}"
            class="avatar-pu"
            style="margin-bottom: 8px;">
    @endif
     <a href="{{ route('anggota.edit_profile') }}" class="editprofile-link-pu">Edit Foto</a>
        
    <h4>Halo, {{ auth()->user()->nama }}</h4>

<div class="field-pu">
    <span style="opacity: 50%; font-weight: bold;">Nama :</span>
    <span style="margin-left: 10px; font-weight: 500;">
        {{ auth()->user()->nama }}
    </span>
</div>

<div class="field-pu">
    <span style="opacity: 50%; font-weight: bold;">Email :</span>
    <span style="margin-left: 10px; font-weight: 500;">
        {{ auth()->user()->email }}
    </span>
</div>
{{-- <div class="field-pu" style="margin-top:15px;">
    <a href="{{ route('anggota.pinjaman') }}" 
       style="display:block; text-align:center; font-weight:600;">
        Lihat Pinjaman & Cicilan
    </a>
</div> --}}
</div>

</div>
</div>

<div class="bottom-nav-pu">
<a href="{{ route('anggota.dashboard') }}"><i data-feather="home"></i></a>
<a href="{{ route('anggota.profile') }}"><i data-feather="user"></i></a>
<a href="#logoutModal" onclick="openModal()"><i data-feather="log-out"></i></a>
</div>
</div>

<div id="logoutModal" class="modal-backdrop-custom-pu">
  <div class="modal-box-pu">
    <h5>Peringatan</h5>
    <p>Apakah anda yakin ingin keluar?</p>
    <div class="modal-actions-pu">

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button onclick="logout()" class="btn-yes-pu">Ya</button>
      </form>

      <button type="button" class="btn-no-pu" onclick="closeModal()">Tidak</button>

    </div>
  </div>
</div>

<script>
function openModal() {
    document.getElementById('logoutModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('logoutModal').style.display = 'none';
}
</script>
<script>
      feather.replace();
    </script>
</body>
</html>