<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pinjaman;
use App\Models\Angsuran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PinjamanController extends Controller
{
    public function index()
    {
        return Pinjaman::with('anggota')->get();
    }

    public function show($id)
    {
        return Pinjaman::with('anggota')->findOrFail($id);
    }

    // ===============================
    // LIST SEMUA PINJAMAN PER ANGGOTA
    // ===============================
    public function listPinjaman($id)
    {
        $pinjamanList = Pinjaman::with('angsuran')
            ->where('anggota_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.list-pinjaman', compact('pinjamanList'));
    }

// ===============================
// CEK & ARAHKAN PINJAMAN ANGGOTA
// ===============================
public function cekPinjamanAnggota($id)
{
    $pinjamanCount = Pinjaman::where('anggota_id', $id)->count();

    // Tidak ada pinjaman
    if ($pinjamanCount == 0) {
        return redirect()->route('admin.pinjaman.ajukan', $id);
    }

    // Kalau cuma 1 → langsung ke detail
    if ($pinjamanCount == 1) {
        $pinjaman = Pinjaman::where('anggota_id', $id)->first();
        return redirect()->route('pinjaman.detail', $pinjaman->id);
    }

    // Kalau lebih dari 1 → ke list
    return redirect()->route('admin.pinjaman.list', $id);
}

    // ===============================
    // DETAIL CICILAN
    // ===============================
    public function detail($id)
    {
        $pinjaman = Pinjaman::with('anggota')->find($id);

        if (!$pinjaman) {
            return view('admin.cicilan', [
                'pinjaman' => null,
                'tagihanSekarang' => null,
                'tagihanSelanjutnya' => collect(),
                'riwayatTagihan' => collect()
            ]);
        }

        $tagihanSekarang = $pinjaman->angsuran()
            ->where('status','belum')
            ->orderBy('cicilan_ke')
            ->first();

        $tagihanSelanjutnya = $pinjaman->angsuran()
            ->where('status','belum')
            ->orderBy('cicilan_ke')
            ->skip(1)
            ->take(2)
            ->get();

        $riwayatTagihan = $pinjaman->angsuran()
            ->where('status','lunas')
            ->orderBy('cicilan_ke')
            ->get();

        return view('admin.cicilan', compact(
            'pinjaman',
            'tagihanSekarang',
            'tagihanSelanjutnya',
            'riwayatTagihan'
        ));
    }

   // ===============================
// BAYAR ANGSURAN
// ===============================


public function bayar($id)
{
    $angsuran = Angsuran::findOrFail($id);

    if ($angsuran->status == 'lunas') {
        return back()->with('info','Cicilan sudah dibayar');
    }

    $now = Carbon::now();

    // Update cicilan → status lunas + bulan & tahun diubah ke hari bayar
    $angsuran->update([
    'status' => 'lunas',
    'tanggal_bayar' => $now,
    'bulan' => $now->month,
    'tahun' => $now->year,
]);
    return back()->with('success','Pembayaran berhasil.');
}

    // ===============================
    // STORE PINJAMAN BARU
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id'        => 'required|integer',
            'jumlah_pinjaman'   => 'required|numeric',
            'tenor'             => 'required|integer',
            'tanggal_pinjaman'  => 'required|date',
        ]);

        $bunga = 2;

        $pinjaman = Pinjaman::create([
            'anggota_id'        => $request->anggota_id,
            'approved_by'       => null,
            'jumlah_pinjaman'   => $request->jumlah_pinjaman,
            'bunga_persen'      => $bunga,
            'tenor'             => $request->tenor,
            'status'            => 'approved',
            'tanggal_pinjaman'  => $request->tanggal_pinjaman,
            'total_pinjaman'    => 0,
        ]);



$sisaPokok = $pinjaman->jumlah_pinjaman;
$pokokPerBulan = $pinjaman->jumlah_pinjaman / $pinjaman->tenor;
$startMonth = Carbon::parse($request->tanggal_pinjaman)->month;
$startYear  = Carbon::parse($request->tanggal_pinjaman)->year;
$totalPinjaman = 0;

for ($i = 0; $i < $pinjaman->tenor; $i++) {
    $bungaBulanIni = $sisaPokok * ($pinjaman->bunga_persen / 100);
    $totalBayar = $pokokPerBulan + $bungaBulanIni;

    $bulan = $startMonth + $i;
    $tahun = $startYear;
    if ($bulan > 12) {
        $tahun += intdiv($bulan-1, 12);
        $bulan = ($bulan-1) % 12 + 1;
    }

    Angsuran::create([
        'pinjaman_id'   => $pinjaman->id,
        'cicilan_ke'    => $i+1,
        'pokok'         => $pokokPerBulan,
        'bunga'         => $bungaBulanIni,
        'total_bayar'   => $totalBayar,
        'bulan'         => $bulan,
        'tahun'         => $tahun,
        'status'        => 'belum',
        'tanggal_bayar' => null,
    ]);

    $sisaPokok -= $pokokPerBulan;
    $totalPinjaman += $totalBayar;
}
   

   

        $pinjaman->update([
            'total_pinjaman' => $totalPinjaman
        ]);

        return redirect()->route('pinjaman.detail', $pinjaman->id);
    }

    // ===============================
    // UPDATE PINJAMAN
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pinjaman'  => 'required|numeric',
            'tenor'            => 'required|integer',
            'status'           => 'required|string',
            'tanggal_pinjaman' => 'required|date',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);

        $bunga = 2;

        $total = $request->jumlah_pinjaman +
                 ($request->jumlah_pinjaman * $bunga / 100);

        $pinjaman->update([
            'jumlah_pinjaman'  => $request->jumlah_pinjaman,
            'bunga_persen'     => $bunga,
            'tenor'            => $request->tenor,
            'status'           => $request->status,
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'total_pinjaman'   => $total,
            'approved_by'      => $request->approved_by,
        ]);

        return redirect()->route('pinjaman.detail', $pinjaman->id);
    }

    // ===============================
    // DELETE PINJAMAN
    // ===============================
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return response()->json([
            'message' => 'Data pinjaman berhasil dihapus'
        ]);
    }
}