<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesan',
        'file_dokumen',
        'tanggal',
        'status',
        'id_pengajuan'

    ];

    // Relasi dari progress pengajuan ke pengajuan (many to one)
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }
}
