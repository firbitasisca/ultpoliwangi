<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_file',
        'dokumen_file',
        'size_file',
    ];
}
