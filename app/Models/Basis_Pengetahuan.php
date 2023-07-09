<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basis_Pengetahuan extends Model
{
    use HasFactory;

    protected $table = "tb_basis_pengetahuan";
    protected $guarded = ['id'];

    // Relasi dengan model Hama
    public function hama()
    {
        return $this->belongsTo(Hama::class, 'id_hama');
    }

    // Relasi dengan model gejala
    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala');
    }
}
