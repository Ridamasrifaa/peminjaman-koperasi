@extends('anggota.layout')

@section('content')
<div class="app-cs">
  <div class="header-cs">
    <a href="{{ route('anggota.dashboard') }}" class="panah"><i data-feather="arrow-left"></i></a>
  </div>

  <div class="content-cs">
    <h1>Customer Service</h1>
    <div class="cs-wrapper">
      @foreach($csList as $cs)
      <div class="cs-item">
        <label>{{ $cs->nama }}</label>
        <a href="https://wa.me/{{ $cs->wa }}" class="panah">
          <div class="cs-box"><i data-feather="phone"></i></div>
        </a>
        <span>{{ $cs->no_hp }}</span>
      </div>
      @endforeach
    </div>
  </div>

  <div class="bottom-nav-cs">
    <a href="{{ route('anggota.dashboard') }}" class="menu"><i data-feather="home"></i></a>
    <a href="{{ route('anggota.profile') }}" class="menu"><i data-feather="user"></i></a>
    <a href="#logoutModal" onclick="openModal()" class="menu"><i data-feather="log-out"></i></a>
  </div>
</div>
@endsection
