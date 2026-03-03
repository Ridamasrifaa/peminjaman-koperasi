<!DOCTYPE html>
<html lang="id">
<head>
  @vite('public/css/style-fe.css')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cicilan App</title>
<script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="body-ds">
<div class="app-ds">

  @php
      $nomorAdmin = "628123456789"; // 🔥 GANTI NOMOR ADMIN DI SINI
  @endphp

  <div class="header-ds">
    <div class="profile-ds">
      <div class="avatar-ds">

    @if(auth()->user()->foto)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}?v={{ time() }}"
            alt="avatar">
    @else
        <img src="{{ asset('assets/images/dedimulyadi.jpg') }}"
            alt="avatar">
    @endif
      </div>
      <div>
        <div class="name-ds">{{ auth()->user()->nama }}</div>
        <div class="phone-ds">{{ auth()->user()->email }}</div>
      </div>
    </div>
  <a href="{{ route('anggota.customer_service') }}" class="hedset-ds">
      <i data-feather="headphones"></i>
  </a>
  </div>

  <div class="content-ds">

    <div class="total-wrap-ds">
      <div class="total-card-ds">
        <small>Kredit :</small>
        <h1 class="center">Rp {{ number_format($kredit, 0, ',', '.') }}</h1>
      </div>

      <div class="info-row-ds">
        <div class="info-ds">
          <small>Bunga :</small>
          <b>{{ $bunga }}%</b>
        </div>
        <div class="info-ds">
          <small>Cicilan :</small>
          <b>
            <a href="{{ route('anggota.cicilan') }}">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M3 18V16H21V18H3ZM3 13V11H21V13H3ZM3 8V6H21V8H3Z" fill="#FEF7FF"/>
              </svg>
            </a>
          </b>
        </div>
      </div>
    </div>

    <div class="section-ds">
      <div class="section-title-ds">Cicilan Barang</div>

      <div class="grid-ds">

        <!-- HANPHONE -->
        <a href="https://wa.me/{{ env('WA_ADMIN') }}?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan Hanphone') }}" 
           target="_blank" 
           class="card-item-ds">

          <img src="{{ asset('img/phone.webp') }}" alt="Foto">
          <div class="label-ds">Hanphone</div>
        </a>

        <!-- SEPATU -->
        <a href="https://wa.me/{{ env('WA_ADMIN') }}?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan Sepatu') }}" 
           target="_blank" 
           class="card-item-ds">

          <img src="{{ asset('img/shoes.webp') }}" alt="Foto">
          <div class="label-ds">Sepatu</div>
        </a>

      </div>
    </div>

  </div>
</div>

<div class="bottom-nav-ds">
    <a href="{{ route('anggota.dashboard') }}"><i data-feather="home"></i></a>
    <a href="{{ route('anggota.profile') }}"><i data-feather="user"></i></a>
    <a href="#logoutModal" onclick="openModal()"><i data-feather="log-out"></i></a>
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

feather.replace();
</script>

</body>
</html>