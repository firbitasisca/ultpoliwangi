<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ProgressPengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_progress_pengajuan = ProgressPengajuan::all();
        $pengajuans = [];

        $nama_divisi_user = Auth()->user()->divisi->nama_divisi;

        $all_pengajuan = Pengajuan::where('submission_confirmed', 'Accept')->whereHas('layanan.divisi', function ($query) use ($nama_divisi_user) {
            $query->where('nama_divisi', $nama_divisi_user);
        })->orderBy('created_at', 'desc')->get();

        foreach ($all_pengajuan as $pengajuan) {
            // Ambil data progress pengajuan terakhir berdasarkan id_pengajuan
            $last_progress = $all_progress_pengajuan
                ->where('id_pengajuan', $pengajuan->id)
                ->sortByDesc('created_at') // Urutkan berdasarkan created_at descending
                ->first();

            // Jika progress terakhir ditemukan dan status bukan 'Dokumen Selesai'
            if ($last_progress && $last_progress->status !== 'Dokumen Selesai') {
                $pengajuans[] = $pengajuan; // Simpan data pengajuan ke dalam array
            }
        }

        $data = [
            'pengajuans' => $pengajuans,
        ];

        return view('pages.admin.pengajuan.index', $data);
    }

    public function index_ska()
    {
      $pengajuans = Pengajuan::whereIn('status', ['Diproses', 'Dokumen Selesai'])

    ->with(['progress_pengajuans' => function ($query) {
        $query->where('status', 'Dokumen Selesai');
    }])
    ->orderBy('created_at', 'desc')
    ->get();

        $data = [
            'pengajuans' => $pengajuans,
        ];

        return view('pages.admin.pengajuan.index_ska', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengajuan)
    {
        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        $pengajuan->delete();

        Alert::success('Success', 'Pengajuan Berhasil Dihapus');

        return redirect()->route('admin.pengajuan.index');
    }
}
