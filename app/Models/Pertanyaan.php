<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pertanyaan'
    ];

    public function pertanyaan_survei()
    {
        return $this->hasMany(PertanyaanSurvei::class);
    }
}
