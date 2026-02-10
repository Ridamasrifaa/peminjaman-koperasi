@extends('anggota.layout')

@section('content')
<div class="app-pu">
  <div class="header-pu">
    <a href="{{ route('anggota.dashboard') }}"><i data-feather="arrow-left"></i></a>
  </div>

  <div class="content-pu">
    <div class="card-area-pu">
      <div class="card-profile-pu shadow">
        <img src="{{ asset('assets/images/dedimulyadi.jpg') }}" class="avatar-pu">
        <a href="{{ route('anggota.edit_profile') }}" class="editprofile-link-pu">Edit Profile</a>

        <h4>Halo, {{ Auth::user()->name }}</h4>

        <div class="field-pu">
          <span style="opacity:50%; font-weight:bold;">Nama :</span>
          <span style="margin-left:10px; font-weight:500;">{{ Auth::user()->name }}</span>
        </div>
        <div class="field-pu">
          <span style="opacity:50%; font-weight:bold;">Email :</span>
          <span style="margin-left:10px; font-weight:500;">{{ Auth::user()->email }}</span>
        </div>
      </div>
    </div>
  </div>

  <div class="bottom-nav-pu">
    <a href="{{ route('anggota.dashboard') }}"><i data-feather="home"></i></a>
    <a href="{{ route('anggota.profile') }}"><i data-feather="user"></i></a>
    <a href="#logoutModal" onclick="openModal()"><i data-feather="log-out"></i></a>
  </div>
</div>
@endsection
