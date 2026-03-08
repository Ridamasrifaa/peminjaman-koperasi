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
            color:  black;
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
            padding: 13px;
            margin-bottom: 55px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0B6E1E;
        }

        .btn-kirim {
            background-color: #0B6E1E;
            color: white;
            border-radius: 15px;
            padding: 12px;
            font-weight: 600;
        }

        .btn-kirim {
            margin-top: 60px; 
        }

        .btn-kirim:hover {
            background-color: #096527;
        }

    </style>
</head>

<body>

<div class="mobile-wrapper">

    <div class="header">
        <div class="icon-btn" style="cursor:pointer;" onclick="history.back()">
            <i data-feather="arrow-left"></i>
        </div>

        <h6>Reset Password</h6>
    </div>

    <div class="container">

        <form method="POST" action="/reset-password">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Masukan Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Sandi Baru" required>
            </div>

            <div class="mb-4">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Sandi baru" required>
            </div>

            <div class="d-grid mb-4">
                <button type="submit" class="btn btn-kirim">Reset</button>
            </div>

        </form>

    </div>

</div>

<script>
    feather.replace();
</script>

</body>
</html>