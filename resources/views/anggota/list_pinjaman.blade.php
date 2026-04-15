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
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                <path d="M7.825 13L13.425 18.6L12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825Z" fill="#1D1B20"/>
            </svg>
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

                <div class="card-green light" style="{{ $pinjaman->status == 'direstruktur' ? 'opacity:0.6;' : '' }}">
                    <div class="card-row">
                        <div class="card-info">
                            <div class="card-title">
                                Pinjaman {{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjaman)->format('d M Y') }}
                                @if($pinjaman->status == 'approved')
                                <span style="color:green; font-size:12px;">(Aktif)</span>
                                @elseif($pinjaman->status == 'direstruktur')
                                <span style="color:red; font-size:12px;">(Direstruktur)</span>
                                @endif
                            </div>
                            <div class="card-amount">
                                Rp {{ number_format($pinjaman->total_pinjaman,0,',','.') }}
                                @if($pinjaman->status == 'approved')
                                <br><small style="color:green;">✔ Pinjaman Aktif</small>
                                @elseif($pinjaman->status == 'direstruktur')
                                <br><small style="color:red;">✖ Sudah Digabung</small>
                                @endif
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