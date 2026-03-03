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



  </div>
</div>
@endif

<h4>Tagihan Selanjutnya</h4>

@if($tagihanSelanjutnya->count() > 0)
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
@else
    <p>Tidak ada tagihan selanjutnya</p>
@endif

</div>

<div class="section-cicilan1">
<h4>Riwayat Tagihan</h4>
@forelse($riwayatTagihan as $a)
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
@empty
    <p>Belum ada riwayat pembayaran</p>
@endforelse
</div>

<a href="{{ route('admin.pinjaman.ajukan', $pinjaman->anggota_id) }}" class="fab-plus">
    <img src="{{ asset('assets/images/plus.png') }}" width="70px" height="70px">
</a>

</div>
</body>
</html>