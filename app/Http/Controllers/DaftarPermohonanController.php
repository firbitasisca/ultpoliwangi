<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pengajuans' => Pengajuan::where('submission_confirmed', 'No')
                ->orderBy('created_at', 'desc')
                ->get(),
        ];

        return view('pages.admin.permohonan.index', $data);
    }

    public function accept_submission($id_permohonan)
    {
        Pengajuan::where('id', $id_permohonan)->update([
            'submission_confirmed' => 'Accept',
        ]);

        Alert::success('Success', 'Permohonan Berhasil Diterima');

        return redirect()->back();
    }

    public function decline_submission($id_permohonan)
    {
        $pengajuan = Pengajuan::findOrFail($id_permohonan);

        $pengajuan->delete();

        Alert::success('Success', 'Permohonan Berhasil Ditolak');

        return redirect()->back();
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
    public function edit($id_permohonan)
    {
        $data = [
            'permohonan' => Pengajuan::findOrFail($id_permohonan),
            'layanans' => Layanan::all(),
            'layanan' => Layanan::with('divisi')->get()->groupBy('divisi.nama_divisi'),
            'action' => route('admin.permohonan.update', $id_permohonan),
        ];

        return view('pages.admin.permohonan.form', $data);
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

        Pengajuan::where('id', $id)->update([
            'id_layanan' => $request->id_layanan,
        ]);

        Alert::success('Success', 'Data Permohonan Berhasil Diubah');

        return redirect()->route('admin.permohonan.index');
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
