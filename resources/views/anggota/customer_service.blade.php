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
        <label>Pak Fikri</label>
        <a href="http://wa.me/628115204504" class="panah">
          <div class="cs-box">
        <i data-feather="phone"></i></a>
          <span>082115204504</span>
        </div>
      </div>
      <div class="cs-item">
        <label>Pak Ali</label>
        <a href="http://wa.me/628115204504" class="panah">
        <div class="cs-box">     
          <i data-feather="phone"></i></a>
          <span>082316504650</span>
        </div>
      </div>
    </div>
  </div>

  <div class="bottom-nav-cs">
    <a href="../users/dashboard.html" class="menu"><i data-feather="home"></i></a>
    <a href="../users/profile.html" class="menu"><i data-feather="user"></i></a>
    <a href="#logoutModal" onclick="openModal()" class="menu"><i data-feather="log-out"></i></a>
  </div>
</div>


<div id="logoutModal" class="modal-backdrop-custom-pu">
    <div class="modal-box-pu">
        <h5>Peringatan</h5>
        <p>Apakah anda yakin ingin keluar?</p>

        <div class="modal-actions-pu">
            <button class="btn-yes-pu">Ya</button>
            <button class="btn-no-pu" onclick="closeModal()">Tidak</button>
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

      feather.replace();
    </script>
</body>
</html>