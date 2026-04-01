<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pencarian</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://unpkg.com/feather-icons"></script>
@vite('resources/css/style-fe.css')

</head>

<body class="body-search">

<div class="app-search">

<div class="content-search">

<form action="{{ route('admin.pencarian') }}" method="GET" class="search-bar">
<i style="color:black;" data-feather="search"></i>
<input type="text" name="q" placeholder="Search" value="{{ request('q') }}">
</form>

<div class="user-box">

@forelse($anggota as $p)

<div class="user">

<!-- ICON EDIT & DELETE -->
<div class="aksi-user">

<a href="{{ route('anggota.edit', $p->id) }}">
<i data-feather="edit"></i>
</a>

<button onclick="openDeleteModal({{ $p->id }})">
<i data-feather="trash"></i>
</button>

</div>

<!-- CARD USER -->
<a href="{{ route('admin.cek.pinjaman', $p->id) }}" class="user-link">

<div class="avatar-search">
<img src="{{ $p->avatar_url }}" alt="avatar">
</div>

<div class="info">
<strong>{{ $p->nama }}</strong>
<span>{{ $p->no_hp }}</span>
</div>

</a>

</div>

@empty
<p>Tidak ada data.</p>
@endforelse

</div>

</div>

<div class="bottom-nav-search">
<a href="{{ route('anggota.create') }}"><i data-feather="plus"></i></a>
<a href="{{ route('admin.pencarian') }}"><i data-feather="search"></i></a>
<a href="{{ url('/admin/profile') }}"><i data-feather="user"></i></a>
</div>

</div>


<!-- MODAL DELETE -->
<div id="deleteModal" class="modal-backdrop-custom-pu" style="display:none;">
<div class="modal-box-pu">

<h5>Peringatan</h5>
<p>Apakah anda yakin ingin menghapus anggota ini?</p>

<div class="modal-actions-pu">

<form id="deleteForm" method="POST">
@csrf
@method('DELETE')

<button type="submit" class="btn-yes-pu">
Ya
</button>

</form>

<button type="button" class="btn-no-pu" onclick="closeDeleteModal()">
Tidak
</button>

</div>

</div>
</div>

@if(session('error'))
<div id="errorModal" class="modal-backdrop-custom-pu" style="display:flex;">
<div class="modal-box-pu">

<h5>Peringatan</h5>
<p>{{ session('error') }}</p>

<div class="modal-actions-pu">
<button type="button" class="btn-no-pu" onclick="closeErrorModal()">
Tutup
</button>
</div>

</div>
</div>
@endif


<script>

feather.replace();

function openDeleteModal(id)
{
let modal = document.getElementById("deleteModal");
let form = document.getElementById("deleteForm");

form.action = "/admin/anggota/" + id;

modal.style.display = "flex";
}

function closeDeleteModal()
{
document.getElementById("deleteModal").style.display = "none";
}

function closeErrorModal()
{
let modal = document.getElementById("errorModal");

if(modal){
modal.style.display = "none";
}
}

</script>

</body>
</html>