<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPelayaran extends Model
{
    use HasFactory;
    protected $table = 'detailpelayaran';
    protected $fillable = ['fk_idpelayaran','fk_idrute','fk_idjenis','harga'];
    protected $casts = ['detail' => 'array',];

    public function pelayaran(){
        return $this->belongsTo(Pelayaran::class,'fk_idpelayaran','id');
    }
    public function rute(){
        return $this->belongsTo(Rute::class,'fk_idrute','id');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'fk_idjenis','id');
    }
}
