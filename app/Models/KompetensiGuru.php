<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiGuru extends Model
{
    use HasFactory;
    public $fillable = ['kompetensi'];
    public $visible = ['kompetensi'];
    public $timestamps = true;

    public function pertanyaan()
    {
        return $this->hasMany(PertanyaanGuru::class, 'id_kompetensi');
    }
}
