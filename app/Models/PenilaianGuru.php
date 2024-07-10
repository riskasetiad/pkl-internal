<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianGuru extends Model
{
    use HasFactory;
    public $fillable = ['id_user', 'id_guru', 'id_pertanyaan', 'jawaban', 'kinerja'];
    public $villable = ['id_user', 'id_guru', 'id_pertanyaan', 'jawaban', 'kinerja'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function pertanyaanatasan()
    {
        return $this->belongsTo(PertanyaanAtasan::class, 'id_pertanyaan');
    }

    public function pertanyaanguru()
    {
        return $this->belongsTo(PertanyaanGuru::class, 'id_pertanyaan');
    }

    public function pertanyaansiswa()
    {
        return $this->belongsTo(PertanyaanSiswa::class, 'id_pertanyaan');
    }
}
