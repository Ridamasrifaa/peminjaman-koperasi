<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akses Tidak Diizinkan</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
        }
        .box {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>405</h1>
    <p>Halaman tidak bisa diakses dengan cara ini</p>

   @auth
    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'sekertaris')
        <a href="/admin/pencarian">Kembali</a>
    @else
        <a href="/anggota">Kembali</a>
    @endif
@else
    <a href="/login">Kembali</a>
@endauth
</div>

</body>
</html>