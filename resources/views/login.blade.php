<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Koperasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/style-fe.css')

</head>
<body class="body-login">
<div class="login-container">
<div class="header-login">
    <img src="{{ asset('img/logo/logo.png') }}" style="width: 118px; height:auto; margin: 20px;">
    <div class="logo-right">
    <img src="{{ asset('img/logo/smk.png') }}" style="width: 40px; height:auto;">
    <img src="{{ asset('img/logo/jabar.png') }}" style="width: 40px; height:auto;">
    </div>
</div>

<div class="form">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label-login class="label-login">Masukan Email</label-login>
        <input class="input-login" type="email" name="email" placeholder="Email" required>
        
        <label class="label-login">Masukan Password</label>
        <input class="input-login" type="password" name="password" placeholder="Password" required>
        <a href="{{ route('password.request') }}">Lupa Password?</a>
        <button type="submit" class="button-login">Masuk</button>
        
    </form>

</a>
</div>

</div>

</body>
</html>