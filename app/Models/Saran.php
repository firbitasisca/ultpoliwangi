<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'email',
        'saran',
        'id_pengajuan',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan', 'id');
    }

    public function skor()
    {
        return $this->hasMany(Skor::class);
    }
}
