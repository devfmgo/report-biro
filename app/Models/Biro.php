<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biro extends Model
{
    use HasFactory;
    protected $table="biro";
    protected $fillable=[
        'nama_biro',
        'jum_staff'
];

    public function unitkerja(){
        return $this->hasMany(UnitKerja::class);
    }
}
