<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSurvei extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_survei',
        'id_pertanyaan'
    ];

    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_survei', 'id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id');
    }

    public function skor()
    {
        return $this->hasMany(Skor::class);
    }
}
