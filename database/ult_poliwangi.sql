-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2025 pada 11.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ult_poliwangi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_divisi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `id_divisi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 2, 2, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 3, 3, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 4, 4, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(5, 5, 5, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(6, 6, 6, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(7, 7, 7, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(8, 8, 8, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(9, 9, 9, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(10, 10, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrean`
--

CREATE TABLE `antrean` (
  `id_antrean` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor_antrean` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `jenis_berkas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `nama_berkas`, `jenis_berkas`, `created_at`, `updated_at`) VALUES
(1, 'Proposal Rancang Mutu Perkuliahan', 'Wajib', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 'Daftar Materi Perkuliahan', 'Wajib', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 'Bahan Ajar dan Materi Pendukung', 'Wajib', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 'Rencana Evaluasi dan Penilaian', 'Wajib', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(5, 'Jadwal Pelaksanaan Perkuliahan', 'Wajib', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(7, 'Sudah Herregistrasi', 'Wajib', '2025-05-25 05:14:45', '2025-05-25 05:14:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_layanans`
--

CREATE TABLE `berkas_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berkas` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas_layanans`
--

INSERT INTO `berkas_layanans` (`id`, `id_berkas`, `id_layanan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 2, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 3, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 4, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(5, 5, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(6, 4, 2, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(7, 5, 2, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(9, 7, 3, '2025-05-25 05:15:11', '2025-05-25 05:15:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisis`
--

INSERT INTO `divisis` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'Unit Layanan Terpadu', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(2, 'Sekretaris', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(3, 'Keuangan', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(4, 'Akademik dan Kemahasiswaan', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(5, 'Umum dan Kepegawaian', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(6, 'Pengadaan', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(7, 'Barang Milik Negara', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(8, 'Konsultasi', '2025-05-06 01:36:40', '2025-05-06 01:36:40'),
(9, 'Other', '2025-05-06 01:36:40', '2025-05-06 01:36:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `estimasi_layanan` tinyint(4) NOT NULL DEFAULT 1,
  `id_divisi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id`, `nama_layanan`, `estimasi_layanan`, `id_divisi`, `created_at`, `updated_at`) VALUES
(1, 'Rancang Mutu Perkuliahan', 3, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 'Permohonan Rekomendasi MBKM (MSIB)', 4, 4, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 'Surat Keterangan Aktif Kuliah', 1, 1, '2025-05-25 05:14:08', '2025-05-25 05:15:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_04_071155_create_divisis_table', 1),
(6, '2023_08_04_071223_create_layanans_table', 1),
(7, '2023_08_04_071225_create_berkas_table', 1),
(8, '2023_08_04_072923_create_admins_table', 1),
(9, '2023_08_04_073033_create_berkas_layanans_table', 1),
(10, '2023_08_04_073033_create_prodis_table', 1),
(11, '2023_08_04_074705_create_pengajuans_table', 1),
(12, '2023_08_09_030213_create_progress_pengajuans_table', 1),
(13, '2023_08_25_021210_create_pertanyaans_table', 1),
(14, '2023_08_25_021742_create_surveis_table', 1),
(15, '2023_08_25_022839_create_pertanyaan_surveis_table', 1),
(16, '2023_08_25_023823_create_sarans_table', 1),
(17, '2023_08_25_024619_create_skors_table', 1),
(18, '2023_09_01_024501_create_panduans_table', 1),
(19, '2025_04_14_014721_create_ska_table', 1),
(20, '2025_04_14_015407_create_antean_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduans`
--

CREATE TABLE `panduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `dokumen_file` varchar(255) NOT NULL,
  `size_file` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` varchar(255) NOT NULL,
  `kode_tiket` varchar(7) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `nomor_identitas` varchar(16) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_permohonan` varchar(100) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `status_herregistrasi` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL,
  `tahun_akademik` year(4) DEFAULT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `nomor_cetak` varchar(255) DEFAULT NULL,
  `keperluan_surat` varchar(255) DEFAULT NULL,
  `submission_confirmed` varchar(20) NOT NULL DEFAULT 'No',
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `kode_tiket`, `nama_pemohon`, `nomor_identitas`, `jurusan`, `semester`, `email`, `jenis_permohonan`, `tanggal_permohonan`, `nomor_telepon`, `status_herregistrasi`, `nama_wali`, `pekerjaan`, `nik`, `jabatan`, `instansi`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `file_dokumen`, `status`, `tahun_angkatan`, `tahun_akademik`, `nomor_surat`, `nomor_cetak`, `keperluan_surat`, `submission_confirmed`, `id_prodi`, `id_layanan`, `created_at`, `updated_at`) VALUES
('0357ac88-fdf9-4e94-884e-4c2cfc3a03a2', 'U1tfvyk', 'ac', '362155401036', NULL, NULL, 'ypribit@gmail.com', 'Dosen', '2025-07-10', '876665455678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 3, 1, '2025-07-10 01:05:56', '2025-07-10 01:05:56'),
('20d98fa4-c78c-46c1-b8e7-a19baf955676', 'w0CrMFh', 'sisca', '362155401038', NULL, NULL, 'sisca@gmail.com', 'Dosen', '2025-07-07', '998776544342', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 11, 1, '2025-07-07 00:44:47', '2025-07-07 00:44:47'),
('2ab5647b-8505-4df7-a285-38f11c4073e8', 'VepXIh3', 'accccc', '362155401036', NULL, NULL, 'sisca@gmail.com', 'Umum', '2025-07-07', '098887655456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 1, '2025-07-07 00:54:06', '2025-07-07 00:54:06'),
('2d612fec-f8bc-4b3a-a6ef-4eb255dbfb7f', '8NoXXE2', 'namasa', '362155401036', NULL, NULL, 'refimasrika@yahoo.com', 'Dosen', '2025-07-10', '098887655456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 11, 1, '2025-07-10 00:47:47', '2025-07-10 00:47:47'),
('3a6f86af-c015-4545-b51f-d05d8f65b009', 'gX8hdVH', 'Firbita Sisca Maulana', '362155401037', 'D4 Teknologi Rekayasa Perangkat Lunak', '2', 'firbitasisca@gmail.com', 'Mahasiswa', '2025-06-26', '876554566789', 'Aktif', 'wali', 'petani', '23456789917562', '-', 'poliwangi', '-', 'girri', 'songgon', 'kab', NULL, 'Dokumen Selesai', '2021', NULL, '0987-3678-8888', NULL, 'Mendaftar beasiswa', 'Accept', 1, 3, '2025-06-25 19:41:06', '2025-06-25 19:42:11'),
('76440bfa-7575-48d9-b908-2215ea729dd4', '7eDI7W0', 'cobaindulu', '362155401036', NULL, NULL, 'sisca@gmail.com', 'Mahasiswa', '2025-04-25', '765554566678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, 1, '2025-07-10 01:06:41', '2025-07-10 01:06:41'),
('8d1b2dfa-b584-4d2b-aaac-2ea1c97c79bd', 'boM2GQK', 'cobain', '362155401035', NULL, NULL, 'refimasrika@yahoo.com', 'Umum', '2025-07-10', '876665677789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 2, '2025-07-10 01:07:37', '2025-07-10 01:07:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaans`
--

INSERT INTO `pertanyaans` (`id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 'Seberapa puaskah Anda dengan proses pengajuan melalui Unit Layanan Terpadu?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 'Sejauh mana tingkat keterbukaan dan informasi yang diberikan oleh petugas layanan kepada Anda?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 'Bagaimana pengalaman Anda dalam berinteraksi dengan sistem pengajuan online yang disediakan?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 'Apakah Anda merasa waktu respons dari Unit Layanan Terpadu sudah cukup memadai?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(5, 'Bagaimana pendapat Anda tentang kualitas komunikasi antara Anda dan petugas layanan selama proses ini?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(6, 'Apakah Anda merasa kebutuhan dan pertanyaan Anda terpenuhi dengan baik selama proses pengajuan?', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(7, 'Seberapa efisien menurut Anda sistem pengajuan ini dalam memproses permohonan Anda?', '2025-05-06 01:36:42', '2025-05-06 01:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_surveis`
--

CREATE TABLE `pertanyaan_surveis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_survei` bigint(20) UNSIGNED NOT NULL,
  `id_pertanyaan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan_surveis`
--

INSERT INTO `pertanyaan_surveis` (`id`, `id_survei`, `id_pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 1, 7, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 3, 2, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 3, 5, '2025-05-06 01:36:42', '2025-05-06 01:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'S1 Terapan Teknologi Rekayasa Perangkat Lunak', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 'S1 Terapan dan Bisnis Digital', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 'S1 Terapan Teknologi Rekayasa Komputer', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 'D3 Teknik Sipil', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(5, 'S1 Terapan Teknologi Rekayasa Konstruksi Jalan & Jembatan', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(6, 'S1 Terapan Teknologi Rekayasa Manufaktur', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(7, 'S1 Terapan Teknik Manufaktur Kapal', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(8, 'S1 Terapan Agribisnis', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(9, 'S1 Terapan Teknologi Pengolahan Hasil Ternak', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(10, 'S1 Terapan Manajemen Bisnis Pariwisata', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(11, 'S1 Terapan Destinasi Pariwisata', '2025-05-06 01:36:42', '2025-05-06 01:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_pengajuans`
--

CREATE TABLE `progress_pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan` text NOT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_pengajuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progress_pengajuans`
--

INSERT INTO `progress_pengajuans` (`id`, `pesan`, `file_dokumen`, `tanggal`, `status`, `id_pengajuan`, `created_at`, `updated_at`) VALUES
(41, 'masih dalam proses', NULL, '2025-06-26', 'Dokumen Diproses', '3a6f86af-c015-4545-b51f-d05d8f65b009', '2025-06-25 19:41:47', '2025-06-25 19:41:47'),
(42, 'done', NULL, '2025-06-26', 'Dokumen Selesai', '3a6f86af-c015-4545-b51f-d05d8f65b009', '2025-06-25 19:41:57', '2025-06-25 19:41:57'),
(43, 'Dokumen Selesai', 'storage/file-ska/Fx8lZBLkJC_1750905732.pdf', '2025-06-26', 'Dokumen Selesai', '3a6f86af-c015-4545-b51f-d05d8f65b009', '2025-06-25 19:42:11', '2025-06-25 19:42:13'),
(44, 'Dokumen Berhasil Diunggah', NULL, '2025-07-07', 'Formulir Pengajuan Berhasil Terkirim', '20d98fa4-c78c-46c1-b8e7-a19baf955676', '2025-07-07 00:44:47', '2025-07-07 00:44:47'),
(45, 'Dokumen Berhasil Diunggah', NULL, '2025-07-07', 'Formulir Pengajuan Berhasil Terkirim', '2ab5647b-8505-4df7-a285-38f11c4073e8', '2025-07-07 00:54:06', '2025-07-07 00:54:06'),
(46, 'Dokumen Berhasil Diunggah', NULL, '2025-07-10', 'Formulir Pengajuan Berhasil Terkirim', '2d612fec-f8bc-4b3a-a6ef-4eb255dbfb7f', '2025-07-10 00:47:47', '2025-07-10 00:47:47'),
(47, 'Dokumen Berhasil Diunggah', NULL, '2025-07-10', 'Formulir Pengajuan Berhasil Terkirim', '0357ac88-fdf9-4e94-884e-4c2cfc3a03a2', '2025-07-10 01:05:56', '2025-07-10 01:05:56'),
(48, 'Dokumen Berhasil Diunggah', NULL, '2025-07-10', 'Formulir Pengajuan Berhasil Terkirim', '76440bfa-7575-48d9-b908-2215ea729dd4', '2025-07-10 01:06:41', '2025-07-10 01:06:41'),
(49, 'Dokumen Berhasil Diunggah', NULL, '2025-07-10', 'Formulir Pengajuan Berhasil Terkirim', '8d1b2dfa-b584-4d2b-aaac-2ea1c97c79bd', '2025-07-10 01:07:37', '2025-07-10 01:07:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarans`
--

CREATE TABLE `sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `saran` text DEFAULT NULL,
  `id_pengajuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ska`
--

CREATE TABLE `ska` (
  `id` int(11) NOT NULL,
  `status_herregistrasi` varchar(255) DEFAULT NULL,
  `kode_tiket` varchar(255) DEFAULT NULL,
  `keperluan_surat` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'menunggu',
  `nomor_surat` varchar(255) DEFAULT NULL,
  `nomor_cetak` varchar(255) DEFAULT NULL,
  `id_pengajuans` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skors`
--

CREATE TABLE `skors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skor` tinyint(4) NOT NULL DEFAULT 1,
  `id_pengajuan` varchar(255) NOT NULL,
  `id_pertanyaan_survei` bigint(20) UNSIGNED NOT NULL,
  `id_saran` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surveis`
--

CREATE TABLE `surveis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_survei` varchar(255) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surveis`
--

INSERT INTO `surveis` (`id`, `nama_survei`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kepuasan Umum', 2023, 'Aktif', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(2, 'Proses Pengajuan', 2023, 'Tidak Aktif', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(3, 'Kualitas Informasi', 2023, 'Aktif', '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(4, 'Saran dan Umpan Balik', 2023, 'Tidak Aktif', '2025-05-06 01:36:42', '2025-05-06 01:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ultpoliwangi', 'ultpoliwangi@gmail.com', NULL, '$2y$10$V4TOYmBHAS3J1FYr90GJN.C8FcL/11QMNzlLGuWydWUfbLX52AVOG', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(2, 'sekretaris', 'sekretaris@gmail.com', NULL, '$2y$10$jpplAyeuOxmiBnjRfreG6OS6g4stOm46DVJHgAMSHflY0Vs17Hfi6', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(3, 'keuangan', 'keuangan@gmail.com', NULL, '$2y$10$XF4gGqlU9e.IfEeL6XDZruBFG4fTTygLPxpb6AlC.lZpmYDIfBRMa', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(4, 'akademikdankemahasiswaan', 'akademikdankemahasiswaan@gmail.com', NULL, '$2y$10$FqbK5dJJY54W9YzdVPK7H.tnb6YLfMs5ygIkox4Uxx7sRoPUPT.eW', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(5, 'umumdankepegawaian', 'umumdankepegawaian@gmail.com', NULL, '$2y$10$8Z4oXAqxZIwdYGxyDshf7.Dok5IoeddbkIqJfePPnRPNTecU1cmau', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(6, 'pengadaan', 'pengadaan@gmail.com', NULL, '$2y$10$wW0YFaM5oxqnVFOIxMTh2.d4WJazaacuM4fzZUX5kGR2We8mRZqAS', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(7, 'barangmiliknegara', 'barangmiliknegara@gmail.com', NULL, '$2y$10$ZcKemoNppw6zz7njkgMfXubmVAY0Vx26YYjzTm/GT/1kluHldZ2c2', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(8, 'konsultasi', 'konsultasi@gmail.com', NULL, '$2y$10$9/BMBV4TXQNs3sUH0Awf4uBD1g7.ZoYvQFzJ53AdTcfmmsvqPUrNO', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(9, 'other', 'other@gmail.com', NULL, '$2y$10$2wOgSqyZezJygsAk11wFFO3jf5apvVsq8yGnSiArnVd6BQLi2YxOm', NULL, '2025-05-06 01:36:41', '2025-05-06 01:36:41'),
(10, 'tefa', 'magangti2023@gmail.com', NULL, '$2y$10$6HFEC1nZZHYBw3sBwyqD5.4QX65E9OyjBJRd5FY16bBCGaZ4uwEna', NULL, '2025-05-06 01:36:42', '2025-05-06 01:36:42'),
(11, 'Firbita Sisca Maulana', 'firbitasisca@gmail.com', NULL, '$2y$10$COhM4hXy14qT0XNKGsGYSul6EFL3hc3WqNKH5cvFdBIf1S96lUfbK', NULL, '2025-05-30 01:18:36', '2025-05-30 01:18:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_id_user_foreign` (`id_user`),
  ADD KEY `admins_id_divisi_foreign` (`id_divisi`);

--
-- Indeks untuk tabel `antrean`
--
ALTER TABLE `antrean`
  ADD PRIMARY KEY (`id_antrean`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_layanans`
--
ALTER TABLE `berkas_layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berkas_layanans_id_berkas_foreign` (`id_berkas`),
  ADD KEY `berkas_layanans_id_layanan_foreign` (`id_layanan`);

--
-- Indeks untuk tabel `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanans_id_divisi_foreign` (`id_divisi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panduans`
--
ALTER TABLE `panduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengajuans_kode_tiket_unique` (`kode_tiket`),
  ADD KEY `pengajuans_id_prodi_foreign` (`id_prodi`),
  ADD KEY `pengajuans_id_layanan_foreign` (`id_layanan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_surveis`
--
ALTER TABLE `pertanyaan_surveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_surveis_id_survei_foreign` (`id_survei`),
  ADD KEY `pertanyaan_surveis_id_pertanyaan_foreign` (`id_pertanyaan`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progress_pengajuans`
--
ALTER TABLE `progress_pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_pengajuans_id_pengajuan_foreign` (`id_pengajuan`);

--
-- Indeks untuk tabel `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sarans_id_pengajuan_foreign` (`id_pengajuan`);

--
-- Indeks untuk tabel `ska`
--
ALTER TABLE `ska`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ska_id_pengajuans_foreign` (`id_pengajuans`);

--
-- Indeks untuk tabel `skors`
--
ALTER TABLE `skors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skors_id_pengajuan_foreign` (`id_pengajuan`),
  ADD KEY `skors_id_pertanyaan_survei_foreign` (`id_pertanyaan_survei`),
  ADD KEY `skors_id_saran_foreign` (`id_saran`);

--
-- Indeks untuk tabel `surveis`
--
ALTER TABLE `surveis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `antrean`
--
ALTER TABLE `antrean`
  MODIFY `id_antrean` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berkas_layanans`
--
ALTER TABLE `berkas_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `panduans`
--
ALTER TABLE `panduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_surveis`
--
ALTER TABLE `pertanyaan_surveis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `progress_pengajuans`
--
ALTER TABLE `progress_pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ska`
--
ALTER TABLE `ska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skors`
--
ALTER TABLE `skors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surveis`
--
ALTER TABLE `surveis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berkas_layanans`
--
ALTER TABLE `berkas_layanans`
  ADD CONSTRAINT `berkas_layanans_id_berkas_foreign` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berkas_layanans_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD CONSTRAINT `layanans_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuans_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan_surveis`
--
ALTER TABLE `pertanyaan_surveis`
  ADD CONSTRAINT `pertanyaan_surveis_id_pertanyaan_foreign` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pertanyaan_surveis_id_survei_foreign` FOREIGN KEY (`id_survei`) REFERENCES `surveis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress_pengajuans`
--
ALTER TABLE `progress_pengajuans`
  ADD CONSTRAINT `progress_pengajuans_id_pengajuan_foreign` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sarans`
--
ALTER TABLE `sarans`
  ADD CONSTRAINT `sarans_id_pengajuan_foreign` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ska`
--
ALTER TABLE `ska`
  ADD CONSTRAINT `ska_id_pengajuans_foreign` FOREIGN KEY (`id_pengajuans`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skors`
--
ALTER TABLE `skors`
  ADD CONSTRAINT `skors_id_pengajuan_foreign` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skors_id_pertanyaan_survei_foreign` FOREIGN KEY (`id_pertanyaan_survei`) REFERENCES `pertanyaan_surveis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skors_id_saran_foreign` FOREIGN KEY (`id_saran`) REFERENCES `sarans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
