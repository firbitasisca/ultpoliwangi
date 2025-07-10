<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    protected $table = 'antrean';

    protected $primaryKey = 'id_antrean';

    protected $fillable = [
        'nama',
        'nomor_antrean',
        'tanggal',
    ];
}
