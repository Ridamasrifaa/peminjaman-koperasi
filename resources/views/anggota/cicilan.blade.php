<!DOCTYPE html>
<html lang="id">
<head>
    @vite('public/css/style-fe.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat & Cicilan</title>
</head>

<body class="body-cu">

<div class="app-cu">

  <div class="header-cu">
    <div class="back-btn-cu">
      <a href="{{ route('anggota.dashboard') }}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M7.825 13L13.425 18.6L12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825Z" fill="#1D1B20"/>
        </svg>
      </a>
    </div>
    <div>Riwayat & Cicilan</div>
  </div>

  {{-- ================= TAGIHAN SAAT INI ================= --}}
  <div class="section-cu-amount">
    <h4>Tagihan Saat Ini</h4>

    @if(isset($cicilanSelanjutnya[0]))
    <div class="card-green-cu">
      <div class="card-title-cu">Total Pembayaran</div>
      <div class="card-amount-cu">
        Rp {{ number_format($cicilanSelanjutnya[0]->jumlah_bayar, 0, ',', '.') }}
      </div>
    </div>
    @else
      <p>Tidak ada tagihan saat ini</p>
    @endif


    {{-- ================= TAGIHAN SELANJUTNYA ================= --}}
    <h4>Tagihan Selanjutnya</h4>

    @foreach($cicilanSelanjutnya->slice(1) as $item)
    <div class="card-green-cu light-cu">
      <div class="card-title-cu">Total Pembayaran</div>
      <div class="card-amount-cu">
        Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
      </div>
    </div>
    @endforeach

  </div>


  {{-- ================= RIWAYAT ================= --}}
  <div class="section-cu">
    <h4>Riwayat Tagihan</h4>

    @forelse($cicilan as $item)
    <div class="card-green-cu riwayat-cu">
      <div>
        <div class="card-title-cu">Total Pembayaran</div>
        <div class="card-amount-cu">
          Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
        </div>
      </div>
      <div class="bulan-cu">Bulan {{ $item->bulan_ke }}</div>
    </div>
    @empty
      <p>Belum ada riwayat pembayaran</p>
    @endforelse

  </div>

</div>

</body>
</html>
