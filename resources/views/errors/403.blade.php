<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akses Ditolak</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
            background: #f4f6f9;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 60px;
            margin-bottom: 10px;
            color: #dc3545;
        }
        p {
            margin-bottom: 20px;
            color: #555;
        }
        a {
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>403</h1>
    <p>Kamu tidak punya akses ke halaman ini</p>

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