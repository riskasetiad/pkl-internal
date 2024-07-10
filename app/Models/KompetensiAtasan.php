<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiAtasan extends Model
{
    use HasFactory;

    public $fillable = ['kompetensi'];
    public $visible = ['kompetensi'];
    public $timestamps = true;

    public function pertanyaan(){
        return $this->hasMany(PertanyaanAtasan::class, 'id_kompetensi');
    }
}
