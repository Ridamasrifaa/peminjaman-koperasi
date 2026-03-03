<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Ajukan Pinjaman</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/style-fe.css')
<script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="body-ajukan">
<div class="mobile-ajukan">

<div class="header-ajukan">
  <a href="{{ url()->previous() }}" class="panah-ajukan">
    <i data-feather="arrow-left"></i>
  </a>
  <span>Ajukan Pinjaman</span>
</div>

<form method="POST" action="{{ route('admin.pinjaman.store') }}">
@csrf

<div class="card-green-ajukan">
<small>Masukan Jumlah Pinjaman</small>

<div class="amount-box">
<input type="number" id="jumlah" name="jumlah_pinjaman" placeholder="Rp0" max="10000000" required>
</div>

<small>Maksimal Pinjaman Rp10.000.000</small>
</div>

<div class="duration-ajukan">
<h3>Pilih Durasi Pinjaman</h3>
<div class="duration-btns">
<button type="button" class="btn-ajukan" onclick="setTenor(10)">10 bulan</button>
<button type="button" class="btn-ajukan" onclick="setTenor(3)">3 bulan</button>
<button type="button" class="btn-ajukan" onclick="setTenor(2)">2 bulan</button>
<button type="button" class="btn-ajukan" onclick="setTenor(1)">1 bulan</button>
</div>
</div>

<input type="hidden" name="tenor" id="tenor" required>
<input type="hidden" name="tanggal_pinjaman" value="{{ date('Y-m-d') }}">
<input type="hidden" name="anggota_id" value="{{ $id }}">

<div class="info-box">
<div class="info-row-ajukan">
<span>Jumlah Yang Diterima</span>
<strong id="diterima">Rp0</strong>
</div>
<div class="info-row-ajukan">
<span>Tagihan Bulanan</span>
<strong id="cicilan">Rp0</strong>
</div>
</div>

<div class="submit-ajukan">
<button type="submit">Kirim</button>
</div>

</form>
</div>
<script>
feather.replace();

let tenor = 0;
const bunga = 2; // 2%

function setTenor(bulan) {
    tenor = bulan;
    document.getElementById('tenor').value = bulan;
    hitung();
}

document.getElementById('jumlah').addEventListener('input', hitung);

function hitung() {
    let jumlah = parseFloat(document.getElementById('jumlah').value);
    if (!jumlah || tenor === 0) return;

    let pokokPerBulan = jumlah / tenor;
    let sisaPokok = jumlah;

    let hasil = "";

    for (let i = 1; i <= tenor; i++) {
        let bungaBulanIni = sisaPokok * bunga / 100;
        let cicilan = pokokPerBulan + bungaBulanIni;

        hasil += `Bulan ${i}: ${formatRupiah(cicilan)}<br>`;

        sisaPokok -= pokokPerBulan;
    }

    document.getElementById('diterima').innerText = formatRupiah(jumlah);
    document.getElementById('cicilan').innerHTML = hasil;
}

function formatRupiah(angka) {
    return 'Rp ' + Math.round(angka).toLocaleString('id-ID');
}
</script>

</body>
</html>
