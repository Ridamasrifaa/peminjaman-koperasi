<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Pinjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/style-fe.css')
</head>
<body class="body-cicilan">

<div class="app-cicilan">

    <div class="header-cicilan">
        <a href="{{ route('anggota.dashboard') }}" class="back-btn-cicilan">
            ←
        </a>
        <span>Pinjaman Saya</span>
    </div>

    <div class="section-cicilan1">

        @forelse($pinjamanList as $pinjaman)

            @php
                $totalLunas = $pinjaman->angsuran->where('status','lunas')->count();
                $totalCicilan = $pinjaman->angsuran->count();
                $progress = $totalCicilan > 0 ? ($totalLunas / $totalCicilan) * 100 : 0;
            @endphp

            <a href="{{ route('anggota.cicilan.detail', $pinjaman->id) }}" style="text-decoration:none;">

                <div class="card-green light">
                    <div class="card-row">
                        <div class="card-info">
                            <div class="card-title">
                                Pinjaman {{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjaman)->format('d M Y') }}
                            </div>

                            <div class="card-amount">
                                Rp {{ number_format($pinjaman->total_pinjaman,0,',','.') }}
                            </div>

                            <small>
                                {{ $totalLunas }} / {{ $totalCicilan }} cicilan lunas
                            </small>
                        </div>

                        <div>
                            {{ round($progress) }}%
                        </div>
                    </div>
                </div>

            </a>

        @empty

            <div class="card-green">
                Belum ada pinjaman
            </div>

        @endforelse

    </div>

</div>
</body>
</html>