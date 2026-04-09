<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/style-fe.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="body-edit">
<div class="app-edit">

    <div class="header-edit">
        <a href="{{ route('anggota.profile') }}" class="panah-edit">
            <i data-feather="arrow-left"></i>
        </a>
        <div>Edit Foto</div>
    </div>

    @if(session('success'))
        <div id="successAlert" style="
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            transition: opacity 0.5s ease;
        ">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM UPDATE PROFILE --}}
    <form action="{{ route('anggota.update_profile') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- FOTO --}}
        <div class="upload-box">
            <input type="file" id="imageInput" name="foto" accept="image/*">
            <label for="imageInput" class="upload-label">

                @if(auth()->user()->foto)
                    <img id="preview"
                         src="{{ asset('storage/' . auth()->user()->foto) }}">
                @else
                    <img id="preview" hidden>
                @endif

                <div class="placeholder">
                    <i data-feather="upload"></i>
                    <p>Masukkan Gambar</p>
                </div>
            </label>
        </div>

        <div class="submit-edit">
            <button type="submit">Simpan</button>
        </div>

    </form>

    {{-- BOTTOM NAV --}}
    <div class="bottom-nav-edit">
        <a href="{{ route('anggota.dashboard') }}" class="menu-edit">
            <i data-feather="home"></i>
        </a>

        <a href="{{ route('anggota.profile') }}" class="menu-edit">
            <i data-feather="user"></i>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="menu-edit" style="background:none;border:none;">
                <i data-feather="log-out"></i>
            </button>
        </form>
    </div>

</div>

<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.hidden = false;
    }
});
</script>


<script>
setTimeout(function() {
    const alertBox = document.getElementById('successAlert');
    if(alertBox){
        alertBox.style.opacity = '0';
        setTimeout(() => alertBox.remove(), 500);
    }
}, 3000);
</script>

<script>
    feather.replace();
</script>

</body>
</html>