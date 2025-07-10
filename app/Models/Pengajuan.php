<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengajuan extends Model
{
    use HasFactory;

    // mengaktifkan fitur uuid
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        // action
        static::creating(function ($model) {
            // meelakukan pengecekan
            if ($model->getKey() == null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    protected $fillable = [
        'id',
        'kode_tiket',
        'nama_pemohon',
        'nomor_identitas',
        'email',
        'jenis_permohonan',
        'tanggal_permohonan',
        'nomor_telepon',
        'submission_confirmed',
        'id_prodi',
        'id_layanan',
        'tahun_angkatan',
        'tahun_akademik',
        'status',
        'keperluan_surat',
        'nama_wali',
        'pekerjaan',
        'nik',
        'jabatan',
        'instansi',
        'dusun',
        'semester',
        'desa',
        'jurusan',
        'kecamatan',
        'kabupaten',
        'file_dokumen',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function progress_pengajuans()
    {
        return $this->hasMany(ProgressPengajuan::class, 'id_pengajuan');
    }

    public function saran()
    {
        return $this->hasOne(Saran::class);
    }

    public function skor()
    {
        return $this->hasMany(Skor::class);
    }
}
