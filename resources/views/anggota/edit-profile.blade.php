<!DOCTYPE html>
<html lang="id">
<head>
    @vite('resources/css/style-fe.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto Profile</title>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        
        
        /* Custom Alert Pop-up */
        .custom-alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 25px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            z-index: 9999;
            max-width: 320px;
            width: 90%;
        }

        .custom-alert.show {
            display: block;
            animation: popIn 0.3s ease;
        }

        @keyframes popIn {
            from { transform: translate(-50%, -60%); opacity: 0; }
            to { transform: translate(-50%, -50%); opacity: 1; }
        }

        .custom-alert i {
            font-size: 42px;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .custom-alert p {
            font-size: 16px;
            margin: 10px 0 20px 0;
            color: #333;
        }

        .custom-alert button {
            background: #0B6E1E;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .custom-alert button:hover {
            background: #096527;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        .overlay.show {
            display: block;
        }

        .info-text {
            text-align: center;
            margin: 70px 0 20px 0; /* sebelumnya 25px → sekarang 45px */
            color: #666;
            font-size: 16px;
            font-weight: 500;
        }
    </style>
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
        <div id="successAlert" style="background: #d4edda; color: #155724; padding: 10px; margin: 15px; border-radius: 8px; text-align: center; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('anggota.update_profile') }}" method="POST" enctype="multipart/form-data" id="profileForm">
        @csrf

    
        <div class="upload-box">
             <div class="info-text">
            Foto yang di upload Maksimal 2MB
        </div>
            <input type="file" id="imageInput" name="foto" accept="image/*">
            <label for="imageInput" class="upload-label">
                @if(auth()->user()->foto)
                    <img id="preview" src="{{ asset('storage/' . auth()->user()->foto) }}">
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

    <div class="bottom-nav-edit">
        <a href="{{ route('anggota.dashboard') }}" class="menu-edit"><i data-feather="home"></i></a>
        <a href="{{ route('anggota.profile') }}" class="menu-edit"><i data-feather="user"></i></a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="menu-edit" style="background:none;border:none;">
                <i data-feather="log-out"></i>
            </button>
        </form>
    </div>

</div>

<div class="overlay" id="overlay"></div>
<div class="custom-alert" id="customAlert">
    <i data-feather="alert-triangle"></i>
    <p id="alertMessage">Maaf Foto anda melebihi 2MB</p>
    <button onclick="closeAlert()">OK</button>
</div>

<script>
    feather.replace();

    function showCustomAlert(message) {
        document.getElementById('alertMessage').textContent = message;
        document.getElementById('overlay').classList.add('show');
        document.getElementById('customAlert').classList.add('show');
    }

    function closeAlert() {
        document.getElementById('overlay').classList.remove('show');
        document.getElementById('customAlert').classList.remove('show');
    }

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        const maxSize = 2 * 1024 * 1024;

        if (file) {
            if (file.size > maxSize) {
                showCustomAlert("Maaf Foto anda melebihi 2MB, silakan pilih foto lain yang lebih kecil.");
                this.value = '';
                preview.hidden = true;
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.hidden = false;
        }
    });

    document.getElementById('profileForm').addEventListener('submit', function(e) {
        const fileInput = document.getElementById('imageInput');
        const file = fileInput.files[0];
        const maxSize = 2 * 1024 * 1024;

        if (file && file.size > maxSize) {
            showCustomAlert("Maaf Foto anda melebihi 2MB");
            e.preventDefault();
            return false;
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

</body>
</html>