<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ska extends Model
{
    use HasFactory;
    protected $table = 'ska';
    protected $primaryKey = 'id';

    protected $fillable = [
        'keperluan_surat', 'nama_wali', 'pekerjaan', 'nik', 'jabatan', 'instansi', 'dusun', 'desa', 'kecamatan', 'kabupaten', 'pesan', 'file_dokumen', 'status', 'nomor_surat', 'nomor_cetak', 'id_pengajuans',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }
}
