<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTrucking extends Model
{
    use HasFactory;
    protected $table = 'detailtrucking';
    protected $fillable = ['fk_idtrucking','fk_idsektor','fk_idjenis','harga'];
    protected $casts = ['detail' => 'array',];

    public function trucking(){
        return $this->belongsTo(Trucking::class,'fk_idtrucking','id');
    }
    public function sektor(){
        return $this->belongsTo(Sektor::class,'fk_idsektor','id');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'fk_idjenis','id');
    }
}
