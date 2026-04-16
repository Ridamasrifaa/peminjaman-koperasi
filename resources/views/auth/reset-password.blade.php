<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        body {
            background-color: #fff;
        }

        .mobile-wrapper {
            max-width: 450px;
            min-height: 100vh;
            margin: auto;
            background-color: #ffffff;
            position: relative;
            padding-bottom: 70px;
        }

        .header {
            background:white;
            color: black;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 2px solid #0A9A25;
        }

        .header h6 {
            margin: 0;
            font-weight: 600;
        }

        .container {
            margin-top: 40%;
        }       

        .form-control {
            border-radius: 15px;
            border: 3px solid #0A9A25;
            padding: 13px 45px 13px 13px; /* ruang untuk icon mata */
            margin-bottom: 55px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0B6E1E;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #555;
        }

        .btn-kirim {
            background-color: #0B6E1E;
            color: white;
            border-radius: 15px;
            padding: 12px;
            font-weight: 600;
            margin-top: 60px; 
        }

        .btn-kirim:hover {
            background-color: #096527;
        }

        .email-box {
            background-color: #f8f9fa;
            border: 3px solid #0A9A25;
            border-radius: 15px;
            padding: 13px;
            margin-bottom: 55px;
            font-weight: 500;
            color: #0B6E1E;
        }
    </style>
</head>

<body>

<div class="mobile-wrapper">

    <div class="header">
        <div class="icon-btn" style="cursor:pointer;" onclick="window.location.href='/login-page'">
            <i data-feather="arrow-left"></i>
        </div>
        <h6>Reset Password</h6>
    </div>

    <div class="container">

        <form method="POST" action="/reset-password">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email yang otomatis terisi -->
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <div class="email-box">
                    {{ request('email') }}
                </div>
                <input type="hidden" name="email" value="{{ request('email') }}">
            </div>

            <!-- Sandi Baru dengan toggle -->
            <div class="mb-3">
                <label class="form-label fw-bold">Sandi Baru</label>
                <div class="password-wrapper">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control" 
                           placeholder="Sandi Baru" 
                           required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i data-feather="eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <!-- Konfirmasi Sandi dengan toggle -->
            <div class="mb-4">
                <label class="form-label fw-bold">Konfirmasi Sandi Baru</label>
                <div class="password-wrapper">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-control" 
                           placeholder="Konfirmasi Sandi baru" 
                           required>
                    <span class="toggle-password" onclick="toggleConfirmPassword()">
                        <i data-feather="eye" id="eyeIconConfirm"></i>
                    </span>
                </div>
            </div>

            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-kirim">Reset Password</button>
            </div>

        </form>

    </div>

</div>

<script>
    feather.replace();

    // Toggle untuk Sandi Baru
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.setAttribute("data-feather", "eye-off");
        } else {
            passwordField.type = "password";
            icon.setAttribute("data-feather", "eye");
        }
        feather.replace(); // refresh icon
    }

    // Toggle untuk Konfirmasi Sandi
    function toggleConfirmPassword() {
        const confirmField = document.getElementById("password_confirmation");
        const icon = document.getElementById("eyeIconConfirm");

        if (confirmField.type === "password") {
            confirmField.type = "text";
            icon.setAttribute("data-feather", "eye-off");
        } else {
            confirmField.type = "password";
            icon.setAttribute("data-feather", "eye");
        }
        feather.replace(); // refresh icon
    }
</script>

</body>
</html>