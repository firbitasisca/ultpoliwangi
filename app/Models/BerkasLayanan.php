<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_berkas',
        'id_layanan',
    ];

    // relasi dari berkas layanan ke berkas (many to one)
    public function berkas()
    {
        return $this->belongsTo(Berkas::class, 'id_berkas', 'id');
    }

    // relasi dari berkas layanan ke layanan (many to one)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }
}
