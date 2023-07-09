<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hama extends Model
{
    use HasFactory;

    protected $table = "tb_hama";
    protected $guarded = ['id'];

    // Relasi dengan model basis_pengetahuan
    public function basis_pengetahuan()
    {
        return $this->hasMany(Basis_Pengetahuan::class, 'id_hama');
    }
}
