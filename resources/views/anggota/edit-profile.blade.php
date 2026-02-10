@extends('anggota.layout')

@section('content')
<div class="app-edit">
  <div class="header-edit">
    <a href="{{ route('anggota.profile') }}" class="panah-edit"><i data-feather="arrow-left"></i></a>
    <div>Edit Profil</div>
  </div>

  <form action="{{ route('anggota.update_profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="upload-box">
      <input type="file" name="avatar" id="imageInput" accept="image/*">
      <label for="imageInput" class="upload-label">
        @if($anggota->avatar)
          <img id="preview" src="{{ asset('assets/images/'.$anggota->avatar) }}">
        @else
          <img id="preview" hidden>
          <div class="placeholder">
            <i data-feather="upload"></i>
            <p>Masukan Gambar</p>
          </div>
        @endif
      </label>
    </div>

    <div class="submit-edit">
      <button type="submit">Simpan</button>
    </div>
  </form>

  <div class="bottom-nav-edit">
    <a href="{{ route('anggota.dashboard') }}" class="menu-edit"><i data-feather="home"></i></a>
    <a href="{{ route('anggota.profile') }}" class="menu-edit"><i data-feather="user"></i></a>
    <a href="#logoutModal" onclick="openModal()" class="menu-edit"><i data-feather="log-out"></i></a>
  </div>
</div>
@endsection
