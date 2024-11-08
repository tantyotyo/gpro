<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    use HasFactory;
    protected $table = 'kapal';
    protected $fillable = ['fk_idpelayaran','namakapal','tahunpembuatan'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
    public function pelayaran(){
        return $this->belongsTo(Pelayaran::class,'fk_idpelayaran','id');
    }
}
