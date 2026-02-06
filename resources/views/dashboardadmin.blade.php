<h1>Dashboard</h1>
<p>Login sebagai: {{ auth()->user()->role }}</p>

<ul>
    <li><a href="/anggota">Data Anggota</a></li>
    <li><a href="/pinjaman">Data Pinjaman</a></li>

    @if(auth()->user()->role == 'admin')
        <li><a href="/users">Kelola User</a></li>
    @endif
</ul>
