<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Layanan;
use App\Models\Ska;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\BerkasLayanan;
use App\Models\ProgressPengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FormDosenController extends Controller
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
    public function create(Request $request)
    {
        $data = [
            'prodis' => Prodi::all(),
            'layanans' => Layanan::with('divisi')->orderBy('id_divisi', 'asc')->get(),
            'berkas_layanans' => Berkas::all(),
        ];
        $byLayanans = $request->input('layanan');
        $prodis = Prodi::all();
        $berkas_layanans = Berkas::all();
        $layanans = Layanan::with('divisi')->orderBy('id_divisi', 'asc')->get();
        $query_berkas_layanans = BerkasLayanan::query();

        if ($byLayanans) {
            $query_berkas_layanans->where('id_layanan', $byLayanans);
        }
        $persyaratan_berkas = $query_berkas_layanans->with('berkas')->get();
        return view('pages.client.formulir.dosen.form-dosen', compact(
            'prodis',
            'berkas_layanans',
            'layanans',
            'persyaratan_berkas',
            'byLayanans'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (preg_match('/[+eE-]/', $request->nomor_telepon)) {
            Alert::error('Pengajuan Gagal', 'Mohon Inputkan Nomor Telepon yang Valid');
            return redirect()->route('pengajuan.dosen.page');
        }

        $validated = $request->validate([
            'nama_pemohon' => 'required|string',
            'nomor_identitas' => 'required|string|between:12,16',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string|between:11,15',
            'id_prodi' => 'required',
            'id_layanan' => 'required',
            'tanggal_permohonan' => 'required|date',
        ]);

        $newPengajuan = Pengajuan::create([
            'nama_pemohon' => $validated['nama_pemohon'],
            'nomor_identitas' => $validated['nomor_identitas'],
            'email' => $validated['email'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'id_prodi' => $validated['id_prodi'],
            'id_layanan' => $validated['id_layanan'],
            'tanggal_permohonan' => $validated['tanggal_permohonan'],

            // generate kode tiket dan jenis permohonan
            'kode_tiket' => Str::random(7),
            'jenis_permohonan' => 'Dosen',
        ]);

        ProgressPengajuan::create([
            'pesan' => 'Dokumen Berhasil Diunggah',
            'tanggal' => Carbon::now(),
            'status' => 'Formulir Pengajuan Berhasil Terkirim',
            'id_pengajuan' => $newPengajuan->id,
        ]);

        Alert::success('Pengajuan Berhasil Dikirim', 'Lacak Dokumen Untuk Informasi Lebih Lanjut');

        return redirect()->route('survei.kepuasan.pengguna.page', $newPengajuan->id);
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
        //
    }
}
