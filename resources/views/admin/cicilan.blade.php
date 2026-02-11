<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat & Cicilan</title>
   @vite('resources/js/app.js')
</head>

<body class="body-cicilan">
<div class="app-cicilan">

<div class="header-cicilan">
<div class="back-btn-cicilan" onclick="history.back()">
<a href="profile.html">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.825 13L13.425 18.6L12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825Z" fill="#1D1B20"/>
</svg>
</a>
</div>
<div>Riwayat & Cicilan</div>
</div>

<div class="section-cicilan">
<h4>Tagihan Saat Ini</h4>

<div class="card-green">
  <div class="card-row">
    <div class="card-info">
      <div class="card-title">Total Pembayaran</div>
      <div class="card-amount">Rp 290.000</div>
    </div>
    <a href="dashboard.html" class="card-bayar">Bayar</a>
  </div>
</div>

<h4>Tagihan Selanjutnya</h4>

<div class="card-green light">
  <div class="card-title">Total Pembayaran</div>
  <div class="card-amount">Rp 290.000</div>
</div>

<div class="card-green light">
  <div class="card-title">Total Pembayaran</div>
  <div class="card-amount">Rp 290.000</div>
</div>
</div>

<div class="section-cicilan1">
<h4>Riwayat Tagihan</h4>

<div class="card-green riwayat">
  <div>
    <div class="card-title">Total Pembayaran</div>
    <div class="card-amount">Rp 290.000</div>
  </div>
  <div class="bulan">Bulan 3</div>
</div>

<div class="card-green riwayat">
  <div>
    <div class="card-title">Total Pembayaran</div>
    <div class="card-amount">Rp 290.000</div>
  </div>
  <div class="bulan">Bulan 2</div>
</div>

<div class="card-green riwayat">
  <div>
    <div class="card-title">Total Pembayaran</div>
    <div class="card-amount">Rp 290.000</div>
  </div>
  <div class="bulan">Bulan 1</div>
</div>
</div>

<a href="ajukan-peminjaman.html" class="fab-plus">
<img src="../../assets/images/plus.png" width="70px" height="70px">
</a>

</div>
</body>
</html>
