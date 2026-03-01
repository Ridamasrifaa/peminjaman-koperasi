<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat & Cicilan</title>
@vite('resources/css/style-fe.css')
</head>

<body class="body-cicilan">
<div class="app-cicilan">

<div class="header-cicilan">
<div class="back-btn-cicilan">
    <a href="{{ route('admin.pencarian') }}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
              xmlns="http://www.w3.org/2000/svg">
            <path d="M7.825 13L13.425 18.6L12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825Z" fill="#1D1B20"/>
        </svg>
    </a>
</div>
<div>Riwayat Tagihan</div>
</div>

<div class="section-cicilan">
<h4>Tagihan Saat Ini</h4>

@if($tagihanSekarang)
<div class="card-green">
  <div class="card-row">
    <div class="card-info">
      <div class="card-title">Total Pembayaran</div>
      <div class="card-amount">
        Rp {{ number_format($tagihanSekarang->total_bayar,0,',','.') }}
      </div>
      <small>
        {{ \Carbon\Carbon::parse($tagihanSekarang->tanggal_bayar)->format('d M Y') }}
      </small>
    </div>

    <!-- GANTI FORM JADI BUTTON MODAL -->
    <button type="button" class="card-bayar"
      onclick="openPinModal({{ $tagihanSekarang->id }})">
      Bayar
    </button>

  </div>
</div>
@endif

<h4>Tagihan Selanjutnya</h4>

@foreach($tagihanSelanjutnya as $t)
<div class="card-green light">
  <div class="card-title">Total Pembayaran</div>
  <div class="card-amount">
    Rp {{ number_format($t->total_bayar,0,',','.') }}
  </div>
  <small>
    {{ \Carbon\Carbon::parse($t->tanggal_bayar)->format('d M Y') }}
  </small>
</div>
@endforeach
</div>

<div class="section-cicilan1">
<h4>Riwayat Tagihan</h4>
@foreach($riwayatTagihan as $a)
<div class="card-green riwayat">
  <div>
    <div class="card-title">Total Pembayaran</div>
    <div class="card-amount">
      Rp {{ number_format($a->total_bayar,0,',','.') }}
    </div>
  </div>
  <div class="bulan">
      Bulan {{ $a->cicilan_ke }} <br>
      {{ \Carbon\Carbon::parse($a->tanggal_bayar)->format('d M Y') }}
  </div>
</div>
@endforeach
</div>

<a href="{{ route('admin.pinjaman.ajukan') }}" class="fab-plus">
    <img src="{{ asset('assets/images/plus.png') }}" width="70px" height="70px">
</a>

</div>

<div id="pinModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:999;">
  <div style="background:#fff; width:90%; max-width:360px; margin:150px auto; padding:20px; border-radius:14px; text-align:center;">
    <h3>Masukkan PIN</h3>

    <form id="pinForm" method="POST">
      @csrf
      <input type="password" name="pin" placeholder="PIN" required
        style="width:100%; padding:10px; border-radius:10px; border:1px solid #ccc; margin:12px 0;">

      <div style="display:flex; justify-content:center; gap:10px;">
        <button type="button" onclick="closePinModal()">Batal</button>
        <button type="submit" style="background:#0A9A25;color:white;">Bayar</button>
      </div>
    </form>
  </div>
</div>

<script>
function openPinModal(id) {
    document.getElementById('pinModal').style.display = 'block';
    document.getElementById('pinForm').action = `/angsuran/${id}/bayar`;
}

function closePinModal() {
    document.getElementById('pinModal').style.display = 'none';
}
</script>

</body>
</html>