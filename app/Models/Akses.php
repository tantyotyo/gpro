<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    use HasFactory;
    protected $table = 'akses';
    protected $fillable = ['namaakses',];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
    public function customer(){
        return $this->hasMany(Customer::class);
    }
    public function agendoor(){
        return $this->hasMany(Agendoor::class);
    }
}
