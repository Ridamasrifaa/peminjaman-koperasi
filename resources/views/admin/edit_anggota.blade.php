<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>

<style>
body{
background-color:#fff;
}

.mobile-wrapper{
max-width:450px;
min-height:100vh;
margin:auto;
background-color:#ffffff;
position:relative;
padding-bottom:70px;
}

.header{
background:white;
color:black;
padding:12px 15px;
display:flex;
align-items:center;
gap:15px;
border:2px solid #0A9A25;
}

.header h6{
margin:0;
font-weight:600;
}

.container{
margin-top:40%;
}

.form-control{
border-radius:15px;
border:3px solid #0A9A25;
padding:13px;
margin-bottom:55px;
}

.form-control:focus{
box-shadow:none;
border-color:#0B6E1E;
}

.btn-kirim{
background-color:#0B6E1E;
color:white;
border-radius:15px;
padding:12px;
font-weight:600;
margin-top:60px;
}

.btn-kirim:hover{
background-color:#096527;
}
.icon-btn a{
color:black;
text-decoration:none;
}
</style>

</head>

<body>

<div class="mobile-wrapper">

<div class="header">
<div class="icon-btn">
<a href="{{ route('admin.pencarian') }}" style="color:black; text-decoration:none;">
<i data-feather="arrow-left"></i>
</a>
</div>

<h6>Edit</h6>
</div>

<div class="container">

<form action="{{ route('anggota.update',$anggota->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label fw-semibold">Nama Lengkap</label>
<input type="text" name="nama" class="form-control"
value="{{ $anggota->nama }}"
placeholder="Masukkan Nama Lengkap">
</div>

<div class="mb-3">
<label class="form-label fw-semibold">Nomor Telepon</label>
<input type="tel" name="no_hp" class="form-control"
value="{{ old('no_hp',$anggota->no_hp) }}"
placeholder="Masukkan Nomor Telepon">
</div>

<div class="mb-4">
<label class="form-label fw-semibold">Email</label>
<input type="email" name="email" class="form-control"
value="{{ $anggota->email }}"
placeholder="Masukkan Email">
</div>

<div class="d-grid mb-4">
<button type="submit" class="btn btn-kirim">Simpan</button>
</div>

</form>

</div>

</div>

<script>
feather.replace();
</script>

</body>
</html>