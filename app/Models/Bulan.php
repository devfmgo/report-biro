<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Bulan extends Model
{
    use HasFactory;

    protected $table="bulan";
    protected $fillable=[
        'tanggal',
        'users_id',
        'archive'
    ];
    
    public function user(){
      return  $this->belongsTo(User::class,'users_id');
    }

    public function scopeUser($query){
        return $query->where('users_id',Auth::user()->id);
    }
}