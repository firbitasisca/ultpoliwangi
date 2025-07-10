<?php

namespace App\Http\Controllers; //

use App\Models\Panduan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PanduanPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'panduan_count' => Panduan::count(),
            'panduans' => Panduan::all(),
            'action' => route('admin.panduan.store'),
        ];

        return view('pages.admin.panduan.index', $data);
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
        $validated = $request->validate([
            'nama_file' => ['required', 'string', Rule::unique('panduans', 'nama_file')],
            'dokumen_file' => ['required', 'mimes:pdf', 'max:20480'],
        ]);

        $saveData = [];

        // Mengecek apakah field untuk upload file sudah di-upload atau belum
        if ($request->hasFile('dokumen_file')) {
            $uploadedFile = $request->file('dokumen_file');
            $saveData['dokumen_file'] = $uploadedFile->store('public/panduan');
            $fileSizeInBytes = $uploadedFile->getSize(); // Mendapatkan ukuran file dalam bytes
            $fileSizeInMB = round($fileSizeInBytes / 1024 / 1024, 2); // Konversi ke MB dengan 2 desimal
        } else {
            $fileSizeInMB = 0; // Atur ukuran file ke 0 jika tidak ada file yang diunggah
        }

        Panduan::create([
            'nama_file' => $validated['nama_file'],
            'dokumen_file' => isset($saveData['dokumen_file']) ? $saveData['dokumen_file'] : null,
            'size_file' => $fileSizeInMB, // Simpan ukuran file dalam MB
        ]);

        Alert::success('Success', 'Dokumen Panduan Berhasil Ditambahkan');

        return redirect()->route('admin.panduan.index');
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
    public function destroy($id)
    {
        $panduan = Panduan::findOrFail($id);

        // Periksa apakah ada file yang terkait dengan panduan
        if ($panduan->dokumen_file != null) {
            // Hapus file terkait dari penyimpanan
            Storage::delete($panduan->dokumen_file);
        }

        // Hapus catatan dari database
        $panduan->delete();

        Alert::success('Success', 'Dokumen Panduan Berhasil Dihapus');

        return redirect()->route('admin.panduan.index');
    }
}
