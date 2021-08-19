<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class History extends Model
{
    use HasFactory;

    protected $table="history";
    protected $fillable =[
        'users_id',
        'id_bukti_kerja',
        'id_bulan',
        'kendala',
        'catatan',
        'P1',
        'P2',
        'P3',
        'P4'
    ];

    public function buktikerja(){
        return $this->belongsTo(BuktiKerja::class,'id_bukti_kerja');
    }
  
    public function scopeUser($query){
        
        return $query->where('users_id',Auth::user()->id);
    }

 

}
