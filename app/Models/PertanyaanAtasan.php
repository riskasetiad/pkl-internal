<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanAtasan extends Model
{
    use HasFactory;
    public $fillable = ['pertanyaan', 'id_kompetensi'];
    public $villable = ['pertanyaan', 'id_kompetensi'];
    public $timestamps = true;

    public function kompetensi(){
        return $this->belongsTo(KompetensiAtasan::class, 'id_kompetensi');
    }
     public function penilaian(){
        return $this->hasMany(PenilaianGuru::class, 'id_pertanyaan');
    }
}