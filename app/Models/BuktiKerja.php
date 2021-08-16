<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiKerja extends Model
{
    use HasFactory;
    protected $table="bukti_kerja";
    protected $fillable=[
        'title',
        'id_deskripsi',

    ];

    public function deskripsi(){
        return $this->belongsTo(Deskripsi::class,'id_deskripsi');
    }

    public function history(){
        return $this->hasMany(History::class);
    }

}
