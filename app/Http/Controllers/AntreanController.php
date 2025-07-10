<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AntreanController extends Controller
{
    public function home()
    {
         $today = Carbon::today()->toDateString();
        $lastAntrean =Antrean::whereDate('tanggal', $today)
        ->orderByDesc('nomor_antrean')
        ->first();
       if($lastAntrean !== null){
        $nomorTerakhir = $lastAntrean->nomor_antrean ? $lastAntrean->nomor : 0;
         if($lastAntrean->nomor_antrean == null){
            $nomorTerakhir= 0;
        }else{
             $nomorTerakhir = $lastAntrean->nomor_antrean;
        
        }
        } else{
        $nomorTerakhir= 0; 
        }
        return view('pages.client.home', compact('nomorTerakhir'));
    }

    public function ambil(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $today = Carbon::today()->toDateString();

    $lastToday = Antrean::whereDate('tanggal', $today)
        ->orderByDesc('nomor_antrean')
        ->first();

    $nextNumber = $lastToday ? $lastToday->nomor_antrean + 1 : 1;

    $antrean = Antrean::create([
        'nama' => $request->nama,
        'nomor_antrean' => $nextNumber,
        'tanggal' => $today,
    ]);
    return redirect()->route('antrean.detail', $antrean->id_antrean);
}


    public function detail($id)
    {
        $antrean = Antrean::findOrFail($id);
        return view('pages.client.antrean.detail', compact('antrean'));
    }

public function adminIndex()
{
    $antreans = Antrean::all();
    // Hitung total semua antrean
    $totalAntrean = $antreans->count();

    $sisaAntrean = $totalAntrean;
     $duaAntrean = Antrean::
        orderBy('nomor_antrean', 'asc')
        ->take(2)
        ->get();
    $antreanSekarang = $duaAntrean[0] ?? null;
    $antreanSelanjutnya = $duaAntrean[1] ?? null;
    return view('pages.admin.antrean.antrean', compact(
        'antreans',
        'totalAntrean',
        'antreanSekarang',
        'sisaAntrean',
        'duaAntrean',
        'antreanSelanjutnya'
    ));
}

public function destroy($nomor_antrean)
{
    Antrean::where('nomor_antrean', $nomor_antrean)->delete();
    return redirect()->back()->with('success', 'Data berhasil dihapus.');
}

public function download($id)
{
    $antrean = Antrean::findOrFail($id);
    $pdf = Pdf::loadView('pages.client.antrean.kartu-antrean', compact('antrean'));
    return $pdf->download('kartu-antrean'.$antrean->nomor.'.pdf');
}
}
