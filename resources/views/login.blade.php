<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Koperasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/js/app.js')

</head>
<body class="body-login">
<div class="login-container">
<div class="header-login">
    <img src="assets/images/logo.png" class="logo-left">
    <div class="logo-right">
    <img src="assets/images/smk.png">
    <img src="assets/images/jabar.png">
    </div>
</div>

<div class="form">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label-login class="label-login">Masukan Email</label-login>
        <input class="input-login" type="email" name="email" placeholder="Email" required>

        <label class="label-login">Masukan Password</label>
        <input class="input-login" type="password" name="password" placeholder="Password" required>

        <button type="submit" class="button-login">Masuk Admin</button>
    </form>

    <!-- Kalau mau tombol Users tetap FE sama, bisa dipisah -->
    <a href="/pages/users/dashboard.html">
        <button class="button-login" type="button">Masuk Users</button>
    </a>
</div>

</div>

</body>
</html>