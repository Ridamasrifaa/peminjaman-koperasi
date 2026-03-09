<!DOCTYPE html>
<html lang="id">
<head>
  @vite('public/css/style-fe.css')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Service</title>
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="../../assets/style.css">
</head>

<body class="body-cs">
<div class="app-cs">
  <div class="header-cs">
    <a href="{{ route('anggota.dashboard') }}" class="panah"><i data-feather="arrow-left"></i></a>
  </div>

  <div class="content-cs">
    <h1>Customer Service</h1>
    <div class="cs-wrapper">

      <div class="cs-item">
        <label>Suminar</label>
        <a href="https://wa.me/628115204504?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan') }}" 
           target="_blank" class="cs-box" style="color:black; text-decoration:none; display:flex; align-items:center; gap:8px;">
          <i data-feather="phone"></i>
          <span>081323025049</span>
        </a>
      </div>

      <div class="cs-item">
        <label>Deni</label>
        <a href="https://wa.me/628115204504?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan') }}" 
           target="_blank" class="cs-box" style="color:black; text-decoration:none; display:flex; align-items:center; gap:8px;">
          <i data-feather="phone"></i>
          <span>081323025049</span>
        </a>
      </div>

    </div>
  </div>

  <div class="bottom-nav-cs">
    <a href="{{ route('anggota.dashboard') }}" class="menu">
        <i data-feather="home"></i>
    </a>

    <a href="{{ route('anggota.profile') }}" class="menu">
        <i data-feather="user"></i>
    </a>

    <a href="#logoutModal" onclick="openModal()" class="menu">
        <i data-feather="log-out"></i>
    </a>
  </div>
</div>

<div id="logoutModal" class="modal-backdrop-custom-pu">
  <div class="modal-box-pu">
    <h5>Peringatan</h5>
    <p>Apakah anda yakin ingin keluar?</p>
    <div class="modal-actions-pu">

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-yes-pu">Ya</button>
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

// Feather icons replacement
feather.replace();
</script>
</body>
</html>