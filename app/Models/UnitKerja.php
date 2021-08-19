<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class UnitKerja extends Model
{
    use HasFactory;
    protected $table="unit_kerja";
    protected $fillable=[
        'users_id',
        'biro_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function biro(){
        return $this->belongsTo(Biro::class, 'biro_id');
    }

    public function scopeUser($query){
        
        return $query->where('users_id',Auth::user()->id);
    }
}
