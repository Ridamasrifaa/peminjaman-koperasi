<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>

@vite('resources/css/style-fe.css')

</head>

<body class="body-pu">

<div class="app-pu">

    <div class="header-pu">
        <a href="{{ url('/admin/pencarian') }}">
            <i data-feather="arrow-left"></i>
        </a>
    </div>

    <div class="content-pu">
        <div class="card-area-pu">

            <div class="card-profile-pu shadow">

                <img src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : asset('assets/images/default-avatar.jpg') }}" 
                class="avatar-pu" alt="Avatar">

                <a href="{{ url('/admin/edit-profile') }}" class="editprofile-link-pu">
                    Edit Profile
                </a>

                <h4>
                    Halo, {{ auth()->user()->nama ? auth()->user()->nama : 'Admin' }}
                </h4>

                <div class="field-pu">
                    <span style="opacity: 50%; font-weight: bold;">Nama :</span>
                    <span style="margin-left: 10px; font-weight: 500;">
                        {{ auth()->user()->nama }}
                    </span>
                </div>

                <div class="field-pu">
                    <span style="opacity: 50%; font-weight: bold;">Email :</span>
                    <span style="margin-left: 10px; font-weight: 500;">
                        {{ auth()->user()->email }}
                    </span>
                </div>

                <!-- tombol keluar -->
                <button onclick="openModal()" class="keluar-pu mt-3">
                    Keluar
                </button>

            </div>

        </div>
    </div>

    <div class="bottom-nav-pu">
        <a href="{{ route('anggota.create') }}"><i data-feather="plus"></i></a>
        <a href="{{ url('/admin/pencarian') }}"><i data-feather="search"></i></a>
        <a href="{{ url('/admin/profile') }}"><i data-feather="user"></i></a>
    </div>

</div>


<!-- MODAL LOGOUT -->
<div id="logoutModal" class="modal-backdrop-custom-pu" style="display:none;">
  <div class="modal-box-pu">

    <h5>Peringatan</h5>
    <p>Apakah anda yakin ingin keluar?</p>

    <div class="modal-actions-pu">

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-yes-pu">Ya</button>
      </form>

      <button type="button" class="btn-no-pu" onclick="closeModal()">Tidak</button>

    </div>

  </div>
</div>


<script>

function openModal() {
    document.getElementById('logoutModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('logoutModal').style.display = 'none';
}

feather.replace();

</script>

</body>
</html>