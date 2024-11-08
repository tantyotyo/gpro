<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayaran extends Model
{
    use HasFactory;
    protected $table = 'pelayaran';
    protected $fillable = ['fk_idkota','namapelayaran','alamatpelayaran','telppelayaran'];

    public function kota(){
        return $this->belongsTo(Kota::class, 'fk_idkota','id');
    }
}
