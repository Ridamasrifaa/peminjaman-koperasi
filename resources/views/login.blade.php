<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Koperasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/style-fe.css')
  <style>
.forgot-password{
color:#FFC107;
text-decoration:none;
font-weight:500;
}

.forgot-password:hover{
color:#ffca2c;
}
</style>
</head>

<body class="body-login">

<div class="login-container">

<div class="header-login">
    <img src="{{ asset('img/logo/logo.png') }}" style="width:118px;height:auto;margin:20px;">
    <div class="logo-right">
        <img src="{{ asset('img/logo/smk.png') }}" style="width:40px;height:auto;">
        <img src="{{ asset('img/logo/jabar.png') }}" style="width:40px;height:auto;">
    </div>
</div>

<div class="form">
<form action="{{ route('login') }}" method="POST">
@csrf

<label class="label-login">Masukan Email</label>
<input class="input-login" type="email" name="email" placeholder="Email" required>

@error('email')
<div style="color:red; font-size:13px; margin-bottom:10px;">
    {{ $message }}
</div>
@enderror


<label class="label-login">Masukan Password</label>
<div style="position:relative;">
<input id="password" class="input-login" type="password" name="password" placeholder="Password" required>

<span onclick="togglePassword()" 
style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">

<svg id="eyeIcon" width="22" height="22" viewBox="0 0 24 24" fill="none">
<path d="M12 5C7 5 2.73 8.11 1 12C2.73 15.89 7 19 12 19C17 19 21.27 15.89 23 12C21.27 8.11 17 5 12 5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17Z" fill="#555"/>
<circle cx="12" cy="12" r="2.5" fill="#555"/>
</svg>

</span>
</div>

@error('password')
<div style="color:red; font-size:13px; margin-bottom:10px;">
    {{ $message }}
</div>
@enderror

<a href="{{ route('password.request') }}" class="forgot-password">Lupa Password?</a>

<button type="submit" class="button-login">Masuk</button>

</form>
</div>

</div>

</body>
<script>
function togglePassword() {
const password = document.getElementById("password");

if (password.type === "password") {
password.type = "text";
} else {
password.type = "password";
}
}
</script>
</html>