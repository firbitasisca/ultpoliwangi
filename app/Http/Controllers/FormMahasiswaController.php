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

class FormMahasiswaController extends Controller
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
        $berkas_layanans = BerkasLayanan::with('berkas');
        $layanans = Layanan::with('divisi')->orderBy('id_divisi', 'asc')->get();



        return view('pages.client.formulir.mahasiswa.form-mahasiswa', compact(
            'prodis',
            'berkas_layanans',
            'layanans',

            'byLayanans'
        ));
    }

    public function getBerkas($layananId)
    {

        $layanan = BerkasLayanan::with('berkas')
            ->where('id_layanan', $layananId)
            ->get();

        $berkas = $layanan->map(function ($item) {
            return [
                'id' => $item->berkas->id,
                'nama_berkas' => $item->berkas->nama_berkas
            ];
        });

        return response()->json($berkas);
    }

    public function create_skak(Request $request)
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

        return view('pages.client.formulir.mahasiswa.form-skak', compact(
            'prodis',
            'berkas_layanans',
            'layanans',
            'persyaratan_berkas',
            'byLayanans'
        ));
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (preg_match('/[+eE-]/', $request->nomor_telepon)) {
            Alert::error('Pengajuan Gagal', 'Mohon Inputkan Nomor Telepon yang Valid');
            return redirect()->route('pengajuan.mahasiswa.page');
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
            'kode_tiket' => Str::random(7),
            'jenis_permohonan' => 'Mahasiswa',
        ]);
        ProgressPengajuan::create([
            'pesan' => 'Dokumen Berhasil Diunggah',
            'tanggal' => Carbon::now(),
            'status' => 'Formulir Pengajuan Berhasil Terkirim',
            'id_pengajuan' => $newPengajuan->id,
        ]);

        $id_pengajuan = $newPengajuan->id;
        if ($request->id_layanan == 3) {
            return view('pages.client.formulir.mahasiswa.form-skak', compact('id_pengajuan'));
        } else {
            Alert::success('Pengajuan Berhasil Dikirim', 'Jangan Lupa Salin Kode Tiket');
            return redirect()->route('survei.kepuasan.pengguna.page', $newPengajuan->id);
        }
    }


    // fir batas

    public function store_skak(Request $request)
    {
        if (session('nim') == null) {
            return redirect()->route('do.logout');
        }
        if (preg_match('/[+eE-]/', $request->nomor_telepon)) {
            Alert::error('Pengajuan Gagal', 'Mohon Inputkan Nomor Telepon yang Valid');
            return redirect()->route('pengajuan.mahasiswa.create_skak');
        }
        $cekPengajuan = Pengajuan::where('nomor_identitas', session('nim'))
            ->where('id_layanan', $request->id_layanan)
            ->whereIn('status', ['Diproses', 'Formulir Pengajuan Berhasil Terkirim'])
            ->first();
        if ($cekPengajuan) {
            Alert::error('Pengajuan Gagal', 'Anda sudah mengajukan layanan ini dan dokumennya masih diproses.');
            return redirect()->back();
        }
        $nim = session('nim');
        $tahun = $request->tahun;
        $semester = $_POST['semester'];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://sit.poliwangi.ac.id/v2/api/v1/sitapi/mahasiswaher',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'nim' => $nim,
                'tahun' => $tahun,
                'semester' => $semester
            ]),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2RiYjliYmNlYzI4NGE2YjAzZGMyYzNkZTg4OWM0OGJmZTllM2M4MjJjODVjZTVhZDZjMDQwN2FkMDlmMzI0OTI1NTcxMmIxNTA1MGZlNmQiLCJpYXQiOjE3NDUzODU4NTMuMjMzNzMzLCJuYmYiOjE3NDUzODU4NTMuMjMzNzM4LCJleHAiOjE3NzY5MjE4NTMuMTAyNTY2LCJzdWIiOiIyODgiLCJzY29wZXMiOlsicmVhZG9ubHkiXX0.RmTkA1mlhqK3BgjPjFZqursRKg_wE0J3laXJHtkyKSlfL_4aSvzCegD9EnjbnsUUmO-hDkgDTnDKK1JzJ6bF3caZoUTisR1-C8qC3z40IpnwfnqnYtCsaWs7SSYomB4Pc5omC-VH93RpSbVfuzBtwVWE_ubqhQjAa31qxyzQWrb9gtHZ_J1iCPF1ZixiGmsT_1dPwW0co3FIId84MFaZVeF5V7wYamxHj4iAhF-aAH0QkcE72XoIYAd-Xli8qAP77auzhRc1E-FCPFUvvRMH-FL2_XbuAcJ1BGUZj7fEFvFFhuymLiHJBC_4LOfbc0NKzfgBTjhry_uFtviL7jBviflGC7ZgcgAIJclFe2sWDHJSvAUmltzafnYdhHj43-2_ZX6OIdvb-urQQU0uH95YTgidNRsU73AiOT5Ahoy1eneSB7NzSVUaXbk6Whm11vYWMv5EwGGclXXFEQv9qQH0OsurfwTZhigFsdRLP1UgF9FqTYIrrB9I-2msOAXHjwG-s2huVpzOxg7E3oK47nnizgTHOYYinlSs4sO8jzfcDMmLFLsYHcnBGhe9uj1T_Q3Bl5SvNH2VOSB3_JaK6o0U9rRY7DpaViyUOr6gKmgsppe1cwvqA8vvG6W5Df9DwD8fr0EXmuFyle0kXP61RHa-z5UENbbpPacxsKCiriaIU-A'
            ]
        ]);
        $response = curl_exec($curl);
        $result = json_decode($response, true);
        if (isset($result['data']['heregistrasi']) && $result['data']['heregistrasi'] == true) {
            $newPengajuan = Pengajuan::create([
                'nama_pemohon' => $request->nama_pemohon,
                'nomor_identitas' => $request->nomor_identitas,
                'email' => $request->email,
                'nomor_telepon' =>  $request->nomor_telepon,
                'id_prodi' =>  $request->id_prodi,
                'id_layanan' =>  $request->id_layanan,
                'tanggal_permohonan' =>  Carbon::now(),
                'kode_tiket' => Str::random(7),
                'jenis_permohonan' => 'Mahasiswa',
                'pekerjaan' =>  $request->pekerjaan,
                'tahun_angkatan' =>  $request->tahun_angkatan,
                'tahun' =>  $request->tahun,
                'tanggal' => Carbon::now(),
                'status' => 'Diproses',
                'keperluan_surat' =>  $request->keperluan_surat,
                'nama_wali' =>  $request->nama_wali,
                'pekerjaan' =>  $request->pekerjaan,
                'nik' =>  $request->nik,
                'jabatan' =>  $request->jabatan,
                'instansi' => $request->instansi,
                'dusun' => $request->dusun,
                'desa' => $request->desa,
                'kecamatan' =>  $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'pesan' => $request->pesan,
                'jurusan' => $request->jurusan,
                'semester' => $request->semester,
            ]);
            Alert::success('Pengajuan Berhasil Dikirim', 'Cek Status di Lacak Dokumen');
            return redirect()->route('survei.kepuasan.pengguna.page', $newPengajuan->id);
        } else {
            Alert::error('Pengajuan Gagal', 'Anda Belum Melakukan Heregistrasi!');
            return redirect()->back();
        }
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
