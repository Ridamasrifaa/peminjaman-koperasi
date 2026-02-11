<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Ajukan Pinjaman</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/js/app.js')
<script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="body-ajukan">
<div class="mobile-ajukan">

<div class="header-ajukan">
<a href="cicilan.html" class="panah-ajukan">
<i data-feather="arrow-left"></i>
</a>
<span>Ajukan Pinjaman</span>
</div>

<div class="card-green-ajukan">
<small>Masukan Jumlah Pinjaman</small>

<div class="amount-box">
<form>
<input type="number" inputmode="numeric" placeholder="Rp0">
</form>
</div>

<small>Maksimal Pinjaman Rp10.000.000</small>
</div>

<div class="duration-ajukan">
<h3>Pilih Durasi Pinjaman</h3>
<div class="duration-btns">
<button class="btn-ajukan">10 bulan</button>
<button class="btn-ajukan">3 bulan</button>
<button class="btn-ajukan">2 bulan</button>
<button class="btn-ajukan">1 bulan</button>
</div>
</div>

<div class="info-box">
<div class="info-row-ajukan">
<span>Jumlah Yang Diterima</span>
<strong>Rp10.000.000 ></strong>
</div>
<div class="info-row-ajukan">
<span>Tagihan Bulanan</span>
<strong>Rp1.200.000 ></strong>
</div>
</div>

<div class="submit-ajukan">
<button>Kirim</button>
</div>

</div>

<script>
feather.replace();
</script>

</body>
</html>
