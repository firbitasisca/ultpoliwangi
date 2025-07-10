<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_prodi',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
