<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TrackingSearch extends Controller
{
    public function search_tracking(Request $request)
    {
        $keyword_kode_ticket = $request->query('kode_tiket'); // Menggunakan query() untuk GET request

        $pengajuan = Pengajuan::where('kode_tiket', 'LIKE', '%' . $keyword_kode_ticket . '%')->first();

        if (!$pengajuan) {
            Alert::error('Data tidak ditemukan', 'Mohon Masukkan Kode Tiket yang Valid');

            return redirect()->back()->with('error', 'Data Pengajuan tidak ditemukan');
        }

        return redirect()->route('tracking.pengajuan.page', $pengajuan->id);
    }
}
