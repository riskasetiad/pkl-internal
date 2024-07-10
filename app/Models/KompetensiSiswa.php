<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiSiswa extends Model
{
    use HasFactory;
    public $fillable = ['kompetensi'];
    public $visible = ['kompetensi'];
    public $timestamps = true;

    public function pertanyaan()
    {
        return $this->hasMany(PertanyaanSiswa::class, 'id_kompetensi');
    }
}
