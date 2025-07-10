<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ProgressPengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage; // 
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;


class ProgressPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
    public function store(Request $request, $id_pengajuan)
    {
        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        $validated = $request->validate([
            'create_pesan' => ['required', 'string'],
            'file_dokumen' => 'nullable|mimes:pdf|max:10240',
            'create_tanggal' => ['required', 'date'],
            'create_status' => ['required'],
        ]);

        $saveData = [];

        // Mengecek apakah field untuk upload file sudah di-upload atau belum
        if ($request->hasFile('file_dokumen')) {
            $saveData['file_dokumen'] = $request->file('file_dokumen')->store('public/pengajuan/progress-pengajuan');
        }

        ProgressPengajuan::create([
            'pesan' => $validated['create_pesan'],
            'file_dokumen' => isset($saveData['file_dokumen']) ? $saveData['file_dokumen'] : null,
            'tanggal' => $validated['create_tanggal'],
            'status' => $validated['create_status'],
            'id_pengajuan' => $pengajuan->id
        ]);

        Alert::success('Success', 'Progres Pengajuan Berhasil Ditambahkan');

        return redirect()->route('admin.progress.pengajuan.index', $pengajuan->id);
    }

    public function store_ska(Request $request, $id_pengajuan)
    {
        $pengajuan = Pengajuan::findOrFail($id_pengajuan);

        $validated = $request->validate([
            'create_pesan' => ['required', 'string'],
            'create_status' => ['required'],
        ]);

        ProgressPengajuan::create([
            'pesan' => $validated['create_pesan'],
            'tanggal' => Carbon::now(),
            'status' => $validated['create_status'],
            'id_pengajuan' => $pengajuan->id
        ]);

        Alert::success('Success', 'Progres Pengajuan Berhasil Ditambahkan');

        return redirect()->route('admin.progress.pengajuan.index', $pengajuan->id);
    }

    public function store_no_surat(Request $request, $id_pengajuan)
    {

        $validated = $request->validate([
            'nomor_surat' => ['required', 'string'],
            'create_status' => ['required'],
        ]);

        $pengajuan = Pengajuan::with('prodi')->findOrFail($id_pengajuan);
        $pengajuan->status = $request->create_status;
        $pengajuan->nomor_surat = $request->nomor_surat;
        $pengajuan->status_herregistrasi = 'Aktif';
        $pengajuan->save();

        $progress = ProgressPengajuan::create([
            'pesan' => 'Dokumen Selesai',
            'tanggal' => Carbon::now(),
            'status' => $validated['create_status'],
            'id_pengajuan' => $pengajuan->id
        ]);

        $pdf = Pdf::loadView('pages.client.surat_ska', compact('pengajuan'));
        $fileName = Str::random(10) . '_' . time() . '.pdf';
        Storage::disk('public')->put("file-ska/{$fileName}", $pdf->output());

        $progress->file_dokumen = "storage/file-ska/{$fileName}";
        $progress->save();

        Alert::success('Success', 'Progres Pengajuan Berhasil Ditambahkan');

        return redirect()->route('admin.progress.pengajuan.index', $pengajuan->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($progress_pengajuan_id)
    {
        $data = [
            'progress_pengajuans' => ProgressPengajuan::where('id_pengajuan', $progress_pengajuan_id)->get(),
            'pengajuan' => Pengajuan::findOrFail($progress_pengajuan_id),
            'last_progress_pengajuan' => ProgressPengajuan::where('id_pengajuan', $progress_pengajuan_id)->latest()->first(),
        ];

        $idPelayanan = $data['pengajuan']->id_layanan;

        if ($idPelayanan == 3) {
            return view('pages.admin.progress-pengajuan.index_ska', $data);
        } else {
            return view('pages.admin.progress-pengajuan.index', $data);
        }
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
    public function destroy($id_progress_pengajuan)
    {
        $progresspengajuan = ProgressPengajuan::findOrFail($id_progress_pengajuan);

        $id_pengajuan = $progresspengajuan->id_pengajuan;

        if ($progresspengajuan->file_dokumen != null) {
            Storage::delete($progresspengajuan->file_dokumen);
        }

        $progresspengajuan->delete();

        Alert::success('Success', 'Progress Pengajuan Berhasil Dihapus');

        return redirect()->route('admin.progress.pengajuan.index', $id_pengajuan);
    }
}
