<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  @vite('public/css/style-fe.css')
  <title>Login Koperasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body-login">
<div class="login-container">

<div class="form">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label class="label-login">Masukan Email</label>
        <input class="input-login" type="email" name="email" required>

        <label class="label-login">Masukan Password</label>
        <input class="input-login" type="password" name="password" required>

        <button type="submit" class="button-login">Masuk</button>
    </form>
</div>

</div>
</body>
</html>
