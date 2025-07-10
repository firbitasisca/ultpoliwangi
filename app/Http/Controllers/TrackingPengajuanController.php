<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ProgressPengajuan;
use Illuminate\Http\Request;

class TrackingPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::where('nomor_identitas', session('nim'))
    ->where(function($query) {
        $query->whereIn('status', ['Diproses','Dokumen Selesai','Formulir Pengajuan Berhasil Terkirim'])
              ->orWhereNull('status');
    })
    ->get();
        return view('pages.client.tracking-pengajuan.index', compact('pengajuan'));
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
    public function show($pengajuan_id)
    {
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);

        $data = [
            'pengajuan' => $pengajuan,
            'document_submitted' => ProgressPengajuan::select('id', 'pesan', 'file_dokumen', 'tanggal', 'status')->where('id_pengajuan', $pengajuan->id)->whereIn('status', ['Formulir Pengajuan Berhasil Terkirim'])->get(),
            'document_on_progress' => ProgressPengajuan::select('id', 'pesan', 'file_dokumen', 'tanggal', 'status')->where('id_pengajuan', $pengajuan->id)->whereIn('status', ['Dokumen Diproses'])->get(),
            'document_done' => ProgressPengajuan::select('id', 'pesan', 'file_dokumen', 'tanggal', 'status')->where('id_pengajuan', $pengajuan->id)->whereIn('status', ['Dokumen Selesai'])->get(),
        ];

        // dd($data['document_submitted']);

        return view('pages.client.tracking-pengajuan.tracking-pengajuan', $data);
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
    public function destroy($id)
    {
        //
    }
}
