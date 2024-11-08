<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['fk_idakses','fk_iduser','alamatpegawai','telppegawai','jkpegawai','statpegawai'];

    public function akses()
    {
        return $this->belongsTo(Akses::class, 'fk_idakses', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_iduser', 'id');
    }
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
