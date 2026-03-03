<!DOCTYPE html>
<html lang="id">
<head>
    @vite('resources/css/style-fe.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat & Cicilan</title>
</head>

<body class="body-cu">

<div class="app-cu">

  <div class="header-cu">
    <div class="back-btn-cu">
      <a href="{{ route('anggota.dashboard') }}">
        ←
      </a>
    </div>
    <div>Riwayat & Cicilan</div>
  </div>

  {{-- TAGIHAN SAAT INI --}}
  <div class="section-cu-amount">
    <h4>Tagihan Saat Ini</h4>

    @if($tagihanSekarang)
    <div class="card-green-cu">
      <div class="card-title-cu">Total Pembayaran</div>
      <div class="card-amount-cu">
        Rp {{ number_format($tagihanSekarang->total_bayar, 0, ',', '.') }}
      </div>
      <small>
        Bulan {{ $tagihanSekarang->cicilan_ke }}
      </small>
    </div>
    @else
      <p>Tidak ada tagihan saat ini</p>
    @endif

    {{-- TAGIHAN SELANJUTNYA --}}
    <h4>Tagihan Selanjutnya</h4>
@if($tagihanSelanjutnya->count() > 0)
    @foreach($tagihanSelanjutnya as $item)
        <div class="card-green-cu light-cu">
            <div class="card-title-cu">Total Pembayaran</div>
            <div class="card-amount-cu">
                Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
            </div>
            <small>
                Bulan {{ $item->cicilan_ke }}
            </small>
        </div>
    @endforeach
@else
    <p>Tidak ada tagihan selanjutnya</p>
@endif

  </div>

  {{-- RIWAYAT --}}
  <div class="section-cu">
    <h4>Riwayat Tagihan</h4>

    @forelse($riwayatTagihan as $item)
    <div class="card-green-cu riwayat-cu">
      <div>
        <div class="card-title-cu">Total Pembayaran</div>
        <div class="card-amount-cu">
          Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
        </div>
      </div>
      <div class="bulan-cu">
        Bulan {{ $item->cicilan_ke }}
      </div>
    </div>
    @empty
      <p>Belum ada riwayat pembayaran</p>
    @endforelse

  </div>

</div>

</body>
</html>