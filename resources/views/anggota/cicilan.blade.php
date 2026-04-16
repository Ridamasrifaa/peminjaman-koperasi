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
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                <path d="M7.825 13L13.425 18.6L12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825Z" fill="#1D1B20"/>
            </svg>
      </a>
    </div>
    <div>Riwayat & Cicilan</div>
  </div>

  {{-- TAGIHAN SAAT INI --}}
  <div class="section-cu-amount">

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

    <h4>Tagihan Saat Ini</h4>

    @if($tagihanSekarang)
    <div class="card-green-cu">
      <div class="card-title-cu">Total Pembayaran</div>
      <div class="card-amount-cu">
        Rp {{ number_format($tagihanSekarang->total_bayar, 0, ',', '.') }}
      </div>
      <small>
        Pembayaran {{ $tagihanSekarang->cicilan_ke }}
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
                Pembayaran {{ $item->cicilan_ke }}
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
        Pembayaran {{ $item->cicilan_ke }}
      </div>
    </div>
    @empty
      <p>Belum ada riwayat pembayaran</p>
    @endforelse

  </div>

</div>

</body>
</html>