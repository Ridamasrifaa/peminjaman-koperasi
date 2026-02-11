<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>
@vite('resources/js/app.js')
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
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/default-avatar.jpg') }}" class="avatar-pu" alt="Avatar">


                <a href="{{ url('/admin/edit-profile') }}" class="editprofile-link-pu">
                    Edit Profile
                </a>

                <h4>Halo, {{ auth()->user()->name }}</h4>

                <div class="field-pu">
                    <span style="opacity: 50%; font-weight: bold;">Nama :</span>
                    <span style="margin-left: 10px; font-weight: 500;">{{ auth()->user()->name }}</span>
                </div>

                <div class="field-pu">
                    <span style="opacity: 50%; font-weight: bold;">Email :</span>
                    <span style="margin-left: 10px; font-weight: 500;">{{ auth()->user()->email }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="keluar-pu">Keluar</button>
                </form>
            </div>

        </div>
    </div>

    <div class="bottom-nav-pu">
       <a href="{{ route('anggota.create') }}"><i data-feather="plus"></i></a>
        <a href="{{ url('/admin/pencarian') }}"><i data-feather="search"></i></a>
        <a href="{{ url('/admin/profile') }}"><i data-feather="user"></i></a>
    </div>

</div>

<script>
    feather.replace();
</script>
</body>
</html>
