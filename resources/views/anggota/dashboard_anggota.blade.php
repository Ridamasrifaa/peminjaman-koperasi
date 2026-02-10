@extends('anggota.layout')

@section('content')
<div class="app-ds">
  <div class="header-ds">
    <div class="profile-ds">
      <div class="avatar-ds">
        <img src="{{ asset('assets/images/dedimulyadi.jpg') }}" alt="Avatar">
      </div>
      <div>
        <div class="name-ds">{{ Auth::user()->name }}</div>
        <div class="phone-ds">{{ $anggota->no_telepon ?? '-' }}</div>
      </div>
    </div>
    <a href="{{ route('anggota.customer_service') }}" class="hedset-ds"><i data-feather="headphones"></i></a>
  </div>

  <div class="content-ds">
    <div class="total-wrap-ds">
      <div class="total-card-ds">
        <small>Kredit :</small>
        <h1 class="center">Rp {{ number_format($kredit,0,',','.') }}</h1>
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
        @foreach($pinjamanBarang ?? [] as $barang)
          <div class="card-item-ds">
            <img src="{{ asset('assets/images/'.$barang->gambar) }}" alt="{{ $barang->nama }}">
            <div class="label-ds">{{ $barang->nama }}</div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

<div class="bottom-nav-ds">
  <a href="{{ route('anggota.dashboard') }}"><i data-feather="home"></i></a>
  <a href="{{ route('anggota.profile') }}"><i data-feather="user"></i></a>
  <a href="#logoutModal" onclick="openModal()"><i data-feather="log-out"></i></a>
</div>
@endsection
