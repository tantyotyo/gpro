<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $table = 'container';
    protected $fillable = ['fk_idjenis','fk_idjadwal','qty','nosegelpelayaran','nosegelglobal'];

    public function jenis(){
        return $this->belongsTo(Jenis::class,'fk_idjenis','idjenis');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class,'fk_idjadwal','idjadwal');
    }
}
