<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Berkas;
use App\Models\Divisi;
use App\Models\Layanan;
use App\Models\Pengajuan;
use App\Models\Pertanyaan;
use App\Models\PertanyaanSurvei;
use App\Models\Prodi;
use App\Models\ProgressPengajuan;
use App\Models\Saran;
use App\Models\Skor;
use App\Models\Survei;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home_page()
    {
        return view('pages.client.home');
    }

    public function home_login_page()
    {
        return view('pages.client.home-login');
    }

    public function admin_page()
    {
        // inisialisasi variabel
        $all_progress_pengajuan = ProgressPengajuan::all();
        $pengulas_count = Saran::count();
        $manajemen_pengajuan_count = 0;
        $pengajuan_selesai_count = 0;
        $pertanyaan_survei_count = PertanyaanSurvei::select('id_survei')->distinct()->count('id_survei');

        $nama_divisi_user = Auth()->user()->divisi->nama_divisi;

        $all_pengajuan = Pengajuan::where('submission_confirmed', 'Accept')->whereHas('layanan.divisi', function ($query) use ($nama_divisi_user) {
            $query->where('nama_divisi', $nama_divisi_user);
        })->get();

        $ulasan_count = Saran::whereHas('pengajuan.layanan.divisi', function ($query) use ($nama_divisi_user) {
            $query->where('nama_divisi', $nama_divisi_user);
        })->count();

        // Mengambil jumlah data manajemen pengajuan
        foreach ($all_pengajuan as $pengajuan) {
            // Ambil data progress pengajuan terakhir berdasarkan id_pengajuan
            $last_progress = $all_progress_pengajuan
                ->where('id_pengajuan', $pengajuan->id)
                ->sortByDesc('created_at') // Urutkan berdasarkan created_at descending
                ->first();

            // Jika progress terakhir ditemukan
            if ($last_progress) {
                if ($last_progress->status !== 'Dokumen Selesai') {
                    $manajemen_pengajuan_count++;
                }
            }
        }

        // mengambil jumlah data pengajuan selesai
        foreach ($all_pengajuan as $pengajuan) {
            // Ambil data progress pengajuan terakhir berdasarkan id_pengajuan
            $last_progress = $all_progress_pengajuan
                ->where('id_pengajuan', $pengajuan->id)
                ->sortByDesc('created_at') // Urutkan berdasarkan created_at descending
                ->first();

            // Jika progress terakhir ditemukan
            if ($last_progress) {
                if ($last_progress->status === 'Dokumen Selesai') {
                    $pengajuan_selesai_count++;
                }
            }
        }

        // Mengambil semua data skor dari tabel
        $skorData = Skor::all();

        $totalSkor = 0;
        $jumlahSkor = count($skorData);

        // Menghitung total skor
        foreach ($skorData as $skor) {
            $totalSkor += $skor->skor;
        }

        // Menghitung rata-rata skor
        if ($jumlahSkor > 0) {
            $rataRataSkor = $totalSkor / $jumlahSkor;
        } else {
            $rataRataSkor = 0;
        }

        $data = [
            // jumlah data
            'prodi_count' => Prodi::count(),
            'divisi_count' => Divisi::count(),
            'admin_count' => Admin::count(),
            'layanan_count' => Layanan::count(),
            'berkas_count' => Berkas::count(),
            'pertanyaan_count' => Pertanyaan::count(),
            'survei_count' => Survei::count(),
            'daftar_permohonan_count' => Pengajuan::where('submission_confirmed',  ['No'])->count(),
            'manajemen_pengajuan_count' => $manajemen_pengajuan_count,
            'pengajuan_selesai_count' => $pengajuan_selesai_count,
            'pertanyaan_survei_count' => $pertanyaan_survei_count,
            'ulasan_count' => $ulasan_count,
            'ratarata_skor' => $rataRataSkor,
            'pengulas_count' => $pengulas_count,
        ];

        return view('pages.admin.home', $data);
    }

    public function maklumat_pelayanan_page()
    {
        return view('pages.client.maklumat-layanan');
    }
}
