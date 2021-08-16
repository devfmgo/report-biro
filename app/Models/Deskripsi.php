<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    use HasFactory;
    protected $table="deskripsi_pekerjaan";
    protected $fillable=[
        'title'
    ];


        public function buktikerja()
        {
            return $this->hasMany(BuktiKerja::class);
        }

}
