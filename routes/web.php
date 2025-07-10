<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DaftarPermohonanController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProgressPengajuanController;
use App\Http\Controllers\FormMahasiswaController;
use App\Http\Controllers\FormDosenController;
use App\Http\Controllers\FormUmumController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PanduanPenggunaController;
use App\Http\Controllers\PengajuanSelesai;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PertanyaanSurveiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\SurveiKepuasanPenggunaController;
use App\Http\Controllers\TrackingPengajuanController;
use App\Http\Controllers\TrackingSearch;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AntreanController;

use App\Http\Middleware\FilterDivisi;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // kalau pakai Str::random
use App\Models\User; // 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/get-berkas/{layanan}', [FormMahasiswaController::class, 'getBerkas']);

Route::get('/', [PageController::class, 'home_page'])->name('home.page');
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');
Route::get('/maklumat-pelayanan-poliwangi', [PageController::class, 'maklumat_pelayanan_page'])->name('maklumat.pelayanan.poliwangi');

// route not found and not have access
Route::fallback(function () {
    return view('pages.error.not-found-404');
});

Route::get('/error/403', [ErrorController::class, 'accessDenied'])->name('error.403');

// Route::middleware(['guest'])->group(function () {
// authenticate for login
// Route::get('/login', [AuthController::class, 'login_page'])->name('login.page');
// Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');

// route formulir
Route::get('/formulir-survei/kepuasan-pengguna/{id}', [SurveiKepuasanPenggunaController::class, 'create'])->name('survei.kepuasan.pengguna.page');
Route::post('/formulir-survei/kepuasan-pengguna/create/{id}', [SurveiKepuasanPenggunaController::class, 'store'])->name('survei.kepuasan.pengguna.create');

Route::get('/formulir-pengajuan/dosen', [FormDosenController::class, 'create'])->name('pengajuan.dosen.page');
Route::post('/formulir-pengajuan/dosen/create', [FormDosenController::class, 'store'])->name('pengajuan.dosen.store');

Route::get('/mahasiswa/pilihan', function () {
    return view('pages.client.formulir.mahasiswa.pilihan');
})->name('pages.client.formulir.mahasiswa.pilihan');
// Route::get('/formulir-pengajuan/mahasiswa', [FormMahasiswaController::class, 'create'])->name('pengajuan.mahasiswa.page');
Route::get('/formulir-pengajuan/mahasiswa/create', [FormMahasiswaController::class, 'create'])->name('pengajuan.mahasiswa.create');
Route::get('/formulir-pengajuan/mahasiswa/create_skak', [FormMahasiswaController::class, 'create_skak'])->name('pengajuan.mahasiswa.create_skak');
Route::post('/formulir-pengajuan/mahasiswa/store', [FormMahasiswaController::class, 'store'])->name('pengajuan.mahasiswa.store');
Route::post('/formulir-pengajuan/mahasiswa/store_skak', [FormMahasiswaController::class, 'store_skak'])->name('pengajuan.mahasiswa.store_skak');
Route::get('/formulir-pengajuan/form_skak', [FormMahasiswaController::class, 'form_skak'])->name('pengajuan.skak.page');

Route::get('/formulir-pengajuan/umum', [FormUmumController::class, 'create'])->name('pengajuan.umum.page');
Route::post('/formulir-pengajuan/umum/create', [FormUmumController::class, 'store'])->name('pengajuan.umum.store');
Route::get('/ganti', [AdminController::class, 'ganti'])->name('admin.ganti');
// route tracking
Route::get('/tracking-progress-pengajuan', [TrackingSearch::class, 'search_tracking'])->name('tracking.pengajuan.search');
Route::get('/tracking-progress-pengajuan/{kode_tiket}', [TrackingPengajuanController::class, 'show'])->name('tracking.pengajuan.page');
Route::get('/tracking-progress-pengajuan-mahasiswa', [TrackingPengajuanController::class, 'index'])->name('tracking.pengajuan.page.mahasiswa');

// antrean
Route::get('/', [AntreanController::class, 'home'])->name('home.page');
Route::post('/antrean/ambil', [AntreanController::class, 'ambil'])->name('antrean.ambil');
Route::get('/antrean/{id}/detail', [AntreanController::class, 'detail'])->name('antrean.detail');
Route::get('/antrean/download/{id}', [AntreanController::class, 'download'])->name('antrean.download');

// });

// Route::middleware(['auth'])->group(function () {

// route all divisi
Route::get('/admin/dashboard', [PageController::class, 'admin_page'])->name('admin.dashboard.page');

// Route::get('/', [PageController::class, 'home_page'])->name('home');


//pengajuan
Route::get('/admin/manajemen-pengajuan', [PengajuanController::class, 'index'])->name('admin.pengajuan.index');
Route::get('/admin/manajemen-pengajuan-ska', [PengajuanController::class, 'index_ska'])->name('admin.pengajuan.index.ska');
Route::get('/admin/manajemen-pengajuan/{id_pengajuan}/delete', [PengajuanController::class, 'destroy'])->name('admin.pengajuan.destroy');
Route::get('/admin/manajemen-pengajuan/progress-pengajuan/{id_progress_pengajuan}', [ProgressPengajuanController::class, 'show'])->name('admin.progress.pengajuan.index');
Route::post('/admin/manajemen-pengajuan/progress-pengajuan/{id_progress_pengajuan}/create', [ProgressPengajuanController::class, 'store'])->name('admin.progress.pengajuan.create');
Route::post('/admin/manajemen-pengajuan/progress-pengajuan/{id_progress_pengajuan}/create-ska', [ProgressPengajuanController::class, 'store_ska'])->name('admin.progress.pengajuan.create.ska');
Route::post('/admin/manajemen-pengajuan/progress-pengajuan/{id_progress_pengajuan}/create-no-surat', [ProgressPengajuanController::class, 'store_no_surat'])->name('admin.progress.pengajuan.create.no_surat');
Route::get('/admin/manajemen-pengajuan/progress-pengajuan/{id_progress_pengajuan}/delete', [ProgressPengajuanController::class, 'destroy'])->name('admin.progress.pengajuan.delete');

//daftar pengajuan selesai
Route::get('/admin/manajemen-pengajuan/daftar-pengajuan-selesai', [PengajuanSelesai::class, 'index'])->name('admin.pengajuan.selesai.index');
Route::get('/admin/daftar-saran', [SurveiKepuasanPenggunaController::class, 'index'])->name('admin.saran.index');
Route::get('/admin/daftar-saran/daftar-ulasan/{id_saran}', [SurveiKepuasanPenggunaController::class, 'show'])->name('admin.ulasan.index');

// panduan pengguna
Route::get('/admin/panduan-pengguna', [PanduanPenggunaController::class, 'index'])->name('admin.panduan.index');
Route::post('/admin/panduan-pengguna/store', [PanduanPenggunaController::class, 'store'])->name('admin.panduan.store');
Route::get('/admin/panduan-pengguna/delete/{id}', [PanduanPenggunaController::class, 'destroy'])->name('admin.panduan.destroy');

// divisi unit layanan terpadu
Route::middleware([FilterDivisi::class . ':Unit Layanan Terpadu'])->group(function () {
    //divisi
    Route::get('/admin/manajemen-divisi', [DivisiController::class, 'index'])->name('admin.divisi.index');
    Route::post('/admin/manajemen-divisi/create', [DivisiController::class, 'store'])->name('admin.divisi.create');
    Route::get('/admin/manajemen-divisi/delete/{id}', [DivisiController::class, 'destroy'])->name('admin.divisi.destroy');
    Route::put('/admin/manajemen-divisi/{id}/update', [DivisiController::class, 'update'])->name('admin.divisi.update');

    //user
    Route::get('/admin/manajemen-user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/admin/manajemen-user/create', [UserController::class, 'store'])->name('admin.user.create');
    Route::get('/admin/manajemen-user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::put('/admin/manajemen-user/{id}/update', [UserController::class, 'update'])->name('admin.user.update');

    //prodi
    Route::get('/admin/manajemen-prodi', [ProdiController::class, 'index'])->name('admin.prodi.index');
    Route::post('/admin/manajemen-prodi/create', [ProdiController::class, 'store'])->name('admin.prodi.create');
    Route::get('/admin/manajemen-prodi/delete/{id}', [ProdiController::class, 'destroy'])->name('admin.prodi.destroy');
    Route::put('/admin/manajemen-prodi/{id}/update', [ProdiController::class, 'update'])->name('admin.prodi.update');

    //admin
    Route::get('/admin/manajemen-admin', [AdminController::class, 'index'])->name('admin.admin.index');
    Route::post('/admin/manajemen-admin/create', [AdminController::class, 'store'])->name('admin.admin.create');
    Route::put('/admin/manajemen-admin/{id}/update', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::get('/admin/manajemen-admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.admin.destroy');

    //layanan
    Route::get('/admin/manajemen-layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
    Route::post('/admin/manajemen-layanan/create', [LayananController::class, 'store'])->name('admin.layanan.create');
    Route::get('/admin/manajemen-layanan/delete/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
    Route::put('/admin/manajemen-layanan/{id}/update', [LayananController::class, 'update'])->name('admin.layanan.update');

    //berkas
    Route::get('/admin/manajemen-berkas', [BerkasController::class, 'index'])->name('admin.berkas.index');
    Route::post('/admin/manajemen-berkas/create', [BerkasController::class, 'store'])->name('admin.berkas.create');
    Route::get('/admin/manajemen-berkas/delete/{id}', [BerkasController::class, 'destroy'])->name('admin.berkas.destroy');
    Route::put('/admin/manajemen-berkas/{id}/update', [BerkasController::class, 'update'])->name('admin.berkas.update');

    //daftar permohonan
    Route::get('/admin/manajemen-permohonan/daftar-permohonan', [DaftarPermohonanController::class, 'index'])->name('admin.permohonan.index');
    Route::get('/admin/manajemen-permohonan/detail-permohonan/{id_pengajuan}', [DaftarPermohonanController::class, 'edit'])->name('admin.permohonan.edit');
    Route::put('/admin/manajemen-permohonan/detail-permohonan/{id_pengajuan}', [DaftarPermohonanController::class, 'update'])->name('admin.permohonan.update');
    Route::put('/admin/manajemen-permohonan/accept/{id_pengajuan}', [DaftarPermohonanController::class, 'accept_submission'])->name('admin.permohonan.accept');
    Route::get('/admin/manajemen-permohonan/{id_pengajuan}/decline', [DaftarPermohonanController::class, 'decline_submission'])->name('admin.permohonan.decline');

    //pertanyaan
    Route::get('/admin/manajemen-pertanyaan', [PertanyaanController::class, 'index'])->name('admin.pertanyaan.index');
    Route::post('/admin/manajemen-pertanyaan/create', [PertanyaanController::class, 'store'])->name('admin.pertanyaan.create');
    Route::get('/admin/manajemen-pertanyaan/delete/{id}', [PertanyaanController::class, 'destroy'])->name('admin.pertanyaan.destroy');
    Route::put('/admin/manajemen-pertanyaan/{id}/update', [PertanyaanController::class, 'update'])->name('admin.pertanyaan.update');

    //survei
    Route::get('/admin/manajemen-survei', [SurveiController::class, 'index'])->name('admin.survei.index');
    Route::post('/admin/manajemen-survei/create', [SurveiController::class, 'store'])->name('admin.survei.create');
    Route::get('/admin/manajemen-survei/delete/{id}', [SurveiController::class, 'destroy'])->name('admin.survei.destroy');
    Route::put('/admin/manajemen-survei/{id}/update', [SurveiController::class, 'update'])->name('admin.survei.update');

    //manajemen pertanyaan-survei survei
    Route::get('/admin/manajemen-pertanyaan-survei', [PertanyaanSurveiController::class, 'index'])->name('admin.pertanyaan.survei.index');
    Route::get('/admin/manajemen-pertanyaan-survei/create', [PertanyaanSurveiController::class, 'create'])->name('admin.pertanyaan.survei.create');
    Route::post('/admin/manajemen-pertanyaan-survei/store', [PertanyaanSurveiController::class, 'store'])->name('admin.pertanyaan.survei.store');
    Route::get('/admin/manajemen-pertanyaan-survei/{id}/edit', [PertanyaanSurveiController::class, 'edit'])->name('admin.pertanyaan.survei.edit');
    Route::put('/admin/manajemen-pertanyaan-survei/{id}/update', [PertanyaanSurveiController::class, 'update'])->name('admin.pertanyaan.survei.update');
    Route::get('/admin/manajemen-pertanyaan-survei/{id}/show', [PertanyaanSurveiController::class, 'show'])->name('admin.pertanyaan.survei.show');
    Route::get('/admin/manajemen-pertanyaan-survei/{id}/delete', [PertanyaanSurveiController::class, 'destroy'])->name('admin.pertanyaan.survei.delete');

    // antrean admin
    Route::get('/admin/antrean', [AntreanController::class, 'adminIndex'])->name('admin.antrean');
    Route::get('/admin/antrean/panggil/{id}', [AntreanController::class, 'panggil'])->name('admin.antrean.panggil');
    Route::get('/admin/antrean/selesai/{id}', [AntreanController::class, 'selesai'])->name('admin.antrean.selesai');
    Route::delete('/admin/antrean/{nomor_antrean}', [AntreanController::class, 'destroy'])->name('antrean.destroy');
});

Route::get('/admin/ubah_password', [UserController::class, 'ubah_password'])->name('admin.user.ubah_password');


// Redirect ke SSO (gunakan ini saja)
Route::get('/login', function () {
    $query = http_build_query([
        'client_id' => config('services.sso.client_id'),
        'redirect_uri' => config('services.sso.redirect'),
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect(config('services.sso.base_uri') . '/oauth/authorize?' . $query);
})->name('login.page');
Route::get('/oauth/callback', function (\Illuminate\Http\Request $request) {
    // 1. token sso ambil
    $response = Http::asForm()->withOptions([
        'verify' => false
    ])->post(config('services.sso.base_uri') . '/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => config('services.sso.client_id'),
        'client_secret' => config('services.sso.client_secret'),
        'redirect_uri' => config('services.sso.redirect'),
        'code' => $request->code,
    ]);

    if ($response->failed()) {
        abort(403, 'Unable to get access token from SSO');
    }

    $accessToken = $response->json()['access_token'];


    // 2. sso info
    $userResponse = Http::withToken($accessToken)->withOptions([
        'verify' => false
    ])->get(config('services.sso.base_uri') . '/api/user');

    if ($userResponse->failed()) {
        abort(403, 'Unable to get user info from SSO');
    }

    $ssoUser = json_decode($userResponse, true);;

    // Panjang
    if (strlen($ssoUser['username']) < 8) {
        return "NIM tidak valid. Terlalu pendek.";
    }

    // Ambil bagian kode angkatan dan jurusan
    $kodeAngkatan = substr($ssoUser['username'], 2, 2); // posisi ke-5 dan ke-6
    $kodeJurusan  = substr($ssoUser['username'], 4, 2); // posisi ke-7 dan ke-8

    // Mapping jurusan berdasarkan kode
    $jurusanList = [
        '21' => 'D4 Teknik Manufaktur Kapal',
        '36' => 'D4 Teknologi Rekayasa Manufaktur Kapal',
        '41' => 'D4 Teknologi Pengolahan Hasil Ternak / Agribisnis',
        '61' => 'D4 Bisnis Digital',
        '22' => 'D3 Teknik Sipil',
        '93' => 'D4 Manajemen Bisnis Pariwisata',
        '55' => 'D4 Teknologi Rekayasa Perangkat Lunak',
    ];

    $jurusan = $jurusanList[$kodeJurusan] ?? 'Jurusan tidak dikenali';

    // Bentuk tahun angkatan (misal '21' jadi '2021')
    $tahunAngkatan = "20" . $kodeAngkatan;

    if (str_contains($ssoUser['dn'], 'ou=mahasiswa')) {
        session([
            'nim' => $ssoUser['username'],
            'role' => 'mahasiswa',
            'nama' => $ssoUser['name'],
            'email' => $ssoUser['email'],
            'angkatan' => $tahunAngkatan,
            'jurusan' => $jurusan
        ]);
        return redirect()->route('home.page');
    } elseif (str_contains($ssoUser['dn'], 'ou=dosen')) {
        return view('dashboard.dosen');
    } else {
        return abort(403, 'Akses ditolak.');
    }

    // 3. Create or update user in local DB
    $user = User::updateOrCreate(
        ['email' => $ssoUser['email']],
        ['name' => $ssoUser['name']]
    );

    Auth::login($user);
    return redirect()->route('home.page');
});

Route::get('/login_admin', [AuthController::class, 'login_page'])->name('login.page');
Route::post('/login_admin', [AuthController::class, 'doLogin'])->name('do.login');
