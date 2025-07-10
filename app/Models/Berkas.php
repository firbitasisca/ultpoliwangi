<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_berkas',
        'jenis_berkas',
    ];

    // relasi dari berkas ke berkas layanan (one to many)
    public function berkas_layanan()
    {
        return $this->hasMany(BerkasLayanan::class);
    }
}
