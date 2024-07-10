<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    public $fillable = ['nama_pelajaran'];
    public $visible = ['nama_pelajaran'];
    public $timestamps = true;

    public function guru(){
        return $this->hasMany(Guru::class, 'id_mapel');
    }
}
