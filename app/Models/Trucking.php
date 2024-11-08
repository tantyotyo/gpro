<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trucking extends Model
{
    use HasFactory;
    protected $table = 'trucking';
    protected $fillable = ['fk_iduser','fk_idakses','fk_idkota','namatrucking','alamattrucking','telptrucking','toptrucking','jmlarmada20','jmlarmada40','tahunaktif'];

    public function user(){
        return $this->belongsTo(User::class,'fk_iduser','id');
    }
    public function kota(){
        return $this->belongsTo(Kota::class,'fk_idkota','id');
    }
    public function akses(){
        return $this->belongsTo(Akses::class,'fk_idakses','id');
    }
}
