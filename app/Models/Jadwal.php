<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['fk_idkapal','fk_idrute','voyage','etd'];

    public function kapal(){
        return $this->belongsTo(Kapal::class,'fk_idkapal','id');
    }
    public function rute(){
        return $this->belongsTo(Rute::class,'fk_idrute','id');
    }
}
