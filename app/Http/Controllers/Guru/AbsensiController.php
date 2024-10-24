<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use App\Models\presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index() {
        return view('guru.absensi');
    }

    public function absenMasuk(Request $request)
    {
        // Cek apakah guru sudah absen masuk hari ini
        $presensi = presensi::where('user_id', Auth::id())
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($presensi) {
            return redirect()->back()->with('error', 'Anda sudah absen masuk hari ini.');
        }

        // Simpan waktu masuk
        Presensi::create([
            'user_id' => Auth::id(),
            'masuk' =>  Carbon::now()->format('H:i'),
        ]);

        return redirect()->back()->with('success', 'Absen masuk berhasil.');
    }

    // Fungsi untuk absen pulang
    public function absenPulang(Request $request)
    {
        // Cek apakah guru sudah absen masuk
        $presensi = presensi::where('user_id', Auth::id())
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if (!$presensi) {
            return redirect()->back()->with('error', 'Anda belum absen masuk.');
        }

        if ($presensi->pulang) {
            return redirect()->back()->with('error', 'Anda sudah absen pulang hari ini.');
        }

        // Simpan waktu pulang
        $presensi->update([
            'pulang' =>  Carbon::now()->format('H:i'),
        ]);

        return redirect()->back()->with('success', 'Absen pulang berhasil.');
    }
}
