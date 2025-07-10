<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_survei',
        'tahun',
        'status'
    ];

    public function pertanyaan_survei()
    {
        return $this->hasMany(PertanyaanSurvei::class, 'id_survei', 'id');
    }
}
