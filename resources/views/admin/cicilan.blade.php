<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat & Cicilan</title>
@vite('resources/css/style-fe.css')
<style>


.card-notif {
    padding: 14px 18px;
    border-radius: 12px;
    margin: 15px 0;
    font-weight: 500;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    animation: fadeSlide 0.3s ease-in-out;
}

.card-notif.success {
    background: #E6F7EC;
    color: #1E7E34;
    border-left: 5px solid #28A745;
}

.card-notif.info {
    background: #E8F4FD;
    color: #0C5460;
    border-left: 5px solid #17A2B8;
}

@keyframes fadeSlide {
    from {
        opacity: 0;
        transform: translateY(-5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
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

@if(session('success'))
<div class="card-notif success">
    {{ session('success') }}
</div>
@endif

@if(session('info'))
<div class="card-notif info">
    {{ session('info') }}
</div>
@endif

@if($tagihanSekarang)
<div class="card-green">
  <div class="card-row">
    <div class="card-info">
      <div class="card-title">Total Pembayaran</div>
      <div class="card-amount">
        Rp {{ number_format($tagihanSekarang->total_bayar,0,',','.') }}
      </div>
  @php
$bulanTagihan = \Carbon\Carbon::now()->startOfMonth()->addMonths($tagihanSekarang->cicilan_ke - 1);
@endphp

<small>
Pembayaran {{ $tagihanSekarang->cicilan_ke }} • {{ $bulanTagihan->format('M Y') }}
</small>
    </div>

    @if($tagihanSekarang->status == 'belum')
<form action="{{ route('angsuran.bayar', $tagihanSekarang->id) }}" method="POST">
  @csrf
  <button type="submit" class="card-bayar">Bayar</button>
</form>
@else
<button class="card-bayar" disabled>Sudah Dibayar</button>
@endif

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
   @php
$bulanTagihan = \Carbon\Carbon::now()->startOfMonth()->addMonths($t->cicilan_ke - 1);
@endphp

<small>
Pembayaran {{ $t->cicilan_ke }} • {{ $bulanTagihan->format('M Y') }}
</small>
    </div>
    @endforeach
@else
    <p>Tidak ada tagihan selanjutnya</p>
@endif

</div>

<div class="section-cicilan1">
    {{-- NAMBAHIN INI --}}
    <div style="margin-bottom:10px;">
        <b>Total Pinjaman:</b> 
        Rp {{ number_format($pinjaman->total_pinjaman,0,',','.') }} <br>
        
        <b>Status:</b> 
        @if($pinjaman->status == 'approved')
        <span style="color:green;">Aktif</span>
        @elseif($pinjaman->status == 'direstruktur')
        <span style="color:red;">Direstruktur</span>
        @endif
    </div>

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
    Pembayaran ke-{{ $a->cicilan_ke }} <br>
    {{ $a->tanggal_bayar ? \Carbon\Carbon::parse($a->tanggal_bayar)->format('d M Y') : '-' }}
</div>
</div>
@empty
    <p>Belum ada riwayat pembayaran</p>
@endforelse
</div>

<a href="{{ route('admin.pinjaman.ajukan', $pinjaman->anggota_id) }}" class="fab-plus">
    
    <img src="{{ asset('img/plus.png') }}">
    
</a>

</div>
</body>
</html>