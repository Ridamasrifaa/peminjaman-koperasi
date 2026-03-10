<form action="{{ route('anggota.update',$anggota->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $anggota->nama }}">
<input type="text" name="no_hp" value="{{ $anggota->no_hp }}">
<input type="email" name="email" value="{{ $anggota->email }}">

<button type="submit">Simpan</button>

</form>