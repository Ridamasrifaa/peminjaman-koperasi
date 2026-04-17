<!DOCTYPE html>
<html lang="id">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/style-fe.css')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cicilan App</title>
<script src="https://unpkg.com/feather-icons"></script>
<style>
  
.body-ds{
  background:#fff;
  display:flex;
  justify-content:center;
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

.app-ds{
  width:100%;
  max-width:430px;
  min-height:100vh;
  background:#fff;
  padding-bottom:90px;
  position: relative;
  max-height:100vh;
  overflow:auto;
}

.header-ds{
  background:#0a8f2c;
  color:#fff;
  padding:12px 16px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  position:sticky;
  top:0;
  z-index:50;
}

.profile-ds{
  display:flex;
  align-items:center;
  gap:10px;
}

.avatar-ds{
  width:42px;
  height:42px;
  border-radius:50%;
  background:#fff;
}

.avatar-ds img{
  width:100%;
  height:100%;
  object-fit:cover;
  border-radius:50%;
  display:block;
}

.name-ds{
  font-size:14px;
  font-weight:700;
}

.phone-ds{
  font-size:12px;
  opacity:.9;
}

.content-ds{
  padding:18px;
  margin-top: 20px;
}

.total-wrap-ds{
  background:#f2f2f2;
  border-radius:20px;
  padding:14px;
  margin-top: 10px;
}

.total-card-ds{
  background:linear-gradient(180deg,#0d7f2b,#043d16);
  border-radius:18px;
  padding:18px;
  color:#fff;
}

.total-card-ds small{
  font-size:13px;
}

.total-card-ds h1{
  margin-top:6px;
  font-size:28px;
  text-align: center;
  font-weight:600;
}

.info-row-ds{
  display:flex;
  gap:12px;
  margin-top:14px;
}

.info-ds{
  flex:1;
  background:linear-gradient(180deg,#0d7f2b,#043d16);
  border-radius:16px;
  padding:14px;
  color:#fff;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:flex-start;
  margin-top: 10px;
}

.info-ds small{
  font-size:12px;
  opacity:.9;
}

.info-ds b{
  font-size:22px;
  text-align:center;
  margin-top:4px;
  align-self:center;
}

.info-ds.menu-ds{
  align-items:center;
  justify-content:center;
  font-size:22px;
  flex:0;
  padding:14px 12px;
}

.section-ds{
  margin-top:50px;
  background: linear-gradient(to bottom, #ffffff, #20A839);
  border-radius:22px;
  border: 1px solid #000;
  padding:18px;
  height: 320px;
}

.section-title-ds{
  background: linear-gradient(90deg,  #000000, #109626);
  color: white;
  border-radius:30px;
  padding:10px;
  text-align:center;
  font-weight:600;
  margin-bottom:18px;
}

.grid-ds{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:16px;
  margin-top: 10px;
}

.card-item-ds img{
  width: 100%;
  height: 140px;
  object-fit: cover;
  display: block;
  border-radius: 16px;
  padding: 0;
  background: transparent;
}

.border {
  border-radius: 50%;
}



.label-ds{
  margin-top:30px;
  background:white;
  color:#000;
  font-weight: 500;
  padding:8px;
  height: 30px;
  border-radius:14px;
  font-size:15px;
  align-items: center;
  display: flex;
  justify-content: center; 
}

.cicilan-box {
  padding: 20px;
  text-align: center;
  border-radius: 8px;
  width: fit-content;
  margin: 20px auto;
  font-family: Arial, sans-serif;
  margin-top: 10px;
}

.cicilan-box p {
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 10px;
}

.btn-dashboard {
  display: inline-block;
  padding: 10px 20px;
  border: 2px solid black;
  border-radius: 999px;
  text-decoration: none;
  color: black;
  font-size: 10px;
  transition: 0.3s;
}

.btn-dashboard:hover {
  background-color: black;
  color: white;
}

.bottom-nav-ds{
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  max-width: 430px;
  height: 55px;
  background: #0fa028;
  display: flex;
  justify-content: center;
  gap: 25%;
  color: white;
  font-size: 22px;
  padding: 15px 0;
  z-index: 999;
  height: 30px;
 
}

.bottom-nav-ds a{
 color: white; 
}


.bottom-nav-ds a:hover{
  color: #000;
}

@media(min-width:768px){
  .app{
    margin:0;
    border-radius:0;
    box-shadow:none;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
  }
}

.hedset-ds{
  color: #fff;
  font-size: 22px;
}
.hedset-ds:hover{
  color: #000;
}


.modal-backdrop-custom-pu {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 999;
}

.modal-box-pu {
    background: #FFFEFE;
    padding: 20px;
    border-radius: 14px;
    width: 90%;
    max-width: 360px;
    text-align: center;
}

.modal-actions-pu {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 16px;
}

.btn-yes-pu {
    background: #0A9A25;
    color: #FFFEFE;
    border: none;
    padding: 6px 18px;
    border-radius: 8px;
    width: 120px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-no-pu {
    background: #9A0A0A;
    color: #FFFEFE;
    border: none;
    padding: 6px 18px;
    border-radius: 8px;
    width: 120px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-item-ds {
  text-decoration: none;
}

.card-item-ds img,
.card-item-ds .label-ds {
  color: black;
}
</style>
</head>

<body class="body-ds">
<div class="app-ds">

  @php
      $nomorAdmin = "628123456789"; 
  @endphp

  <div class="header-ds">
    <div class="profile-ds">
      <div class="avatar-ds">

    @if(auth()->user()->foto)
        <img src="{{ asset('storage/' . auth()->user()->foto) }}?v={{ time() }}">
    @else
        <img src="{{ asset('assets/images/dedimulyadi.jpg') }}">
    @endif

      </div>
      <div>
        <div class="name-ds">{{ auth()->user()->nama }}</div>
        <div class="phone-ds">{{ auth()->user()->email }}</div>
      </div>
    </div>

  <a href="{{ route('anggota.customer_service') }}" class="hedset-ds">
      <i data-feather="phone"></i>
  </a>
  </div>

  <div class="content-ds">

    <div class="total-wrap-ds">
      <div class="total-card-ds">
        <small>Kredit :</small>
        <h1>Rp {{ number_format($kredit, 0, ',', '.') }}</h1>
      </div>

      <div class="info-row-ds">
        <div class="info-ds">
          <small>Bunga :</small>
          <b>{{ $bunga }}%</b>
        </div>

        <div class="info-ds">
          <small>Cicilan :</small>
          <b>
            <a href="{{ route('anggota.list.pinjaman') }}">
              <img src="{{ asset('img/logo/cicilan.png') }}" style="width:30px">
            </a>
          </b>
        </div>
      </div>
    </div>

    <div class="section-ds">
      <div class="section-title-ds">BIKIN IMPIANMU JADI KENYATAAN</div>

      <div class="grid-ds">

        <a href="https://wa.me/{{ env('WA_ADMIN2') }}?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan Handphone') }}" 
           target="_blank" 
           class="card-item-ds">

          <img src="{{ asset('img/phone.webp') }}">
          <div class="label-ds">Handphone</div>
        </a>

        <a href="https://wa.me/{{ env('WA_ADMIN2') }}?text={{ urlencode('Halo admin, saya '.auth()->user()->nama.' ingin mengajukan cicilan Sepatu') }}" 
           target="_blank" 
           class="card-item-ds">

          <img src="{{ asset('img/shoes.webp') }}">
          <div class="label-ds">Sepatu</div>
        </a>

      </div>
    </div>

    <div class="cicilan-box">
      <p>Tertarik untuk mengajukan cicilan barang lainnya?</p>
      <a href="https://wa.me/{{ env('WA_ADMIN2') }}" class="btn-dashboard">
        Yuk klik disini untuk menghubungi admin sekarang!!
      </a>
    </div>

  </div>
</div>

<div class="bottom-nav-ds">
  <a href="{{ route('anggota.dashboard') }}"><i data-feather="home"></i></a>
  <a href="{{ route('anggota.profile') }}"><i data-feather="user"></i></a>
  <a href="#logoutModal" onclick="openModal()"><i data-feather="log-out"></i></a>
</div>

<!-- Modal Logout -->
<div id="logoutModal" class="modal-backdrop-custom-pu">
    <div class="modal-box-pu">
        <h5>Peringatan</h5>
        <p>Apakah anda yakin ingin keluar?</p>

        <div class="modal-actions-pu">
            <!-- Form Logout yang sudah diperbaiki -->
            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                @csrf
                <button type="submit" class="btn-yes-pu">Ya</button>
            </form>

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

// Pastikan form logout mengirim CSRF dengan benar
document.addEventListener('DOMContentLoaded', function() {
    const logoutForm = document.getElementById('logoutForm');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function() {
            // Optional: bisa tambah loading jika mau
        });
    }
});

feather.replace();
</script>

</body>
</html>