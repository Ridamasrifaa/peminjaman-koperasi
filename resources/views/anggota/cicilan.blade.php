@extends('anggota.layout')

@section('content')
<div class="app-cu">
  <div class="header-cu">
    <div class="back-btn-cu">
      <a href="{{ route('anggota.dashboard') }}">
        <!-- svg arrow back -->
      </a>
    </div>
    <div>Riwayat & Cicilan</div>
  </div>

  <div class="section-cu-amount">
    <h4>Tagihan Saat Ini</h4>
    @foreach($cicilan as $tagihan)
      <div class="card-green-cu">
        <div class="card-title-cu">Total Pembayaran</div>
        <div class="card-amount-cu">Rp {{ number_format($tagihan->jumlah,0,',','.') }}</div>
    </div>
    @endforeach


    <h4>Tagihan Selanjutnya</h4>
    @foreach($cicilanSelanjutnya as $tagihan)
      <div class="card-green-cu light-cu">
        <div class="card-title-cu">Total Pembayaran</div>
        <div class="card-amount-cu">Rp {{ number_format($tagihan->jumlah,0,',','.') }}</div>
      </div>
    @endforeach
  </div>

  <div class="section-cu">
    <h4>Riwayat Tagihan</h4>
    @foreach($riwayatTagihan as $riwayat)
      <div class="card-green-cu riwayat-cu">
        <div>
          <div class="card-title-cu">Total Pembayaran</div>
          <div class="card-amount-cu">Rp {{ number_format($riwayat->jumlah,0,',','.') }}</div>
        </div>
        <div class="bulan-cu">{{ $riwayat->bulan }}</div>
      </div>
    @endforeach
  </div>
</div>
@endsection
