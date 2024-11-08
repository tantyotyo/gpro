<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['fk_iduser','fk_idpegawai','fk_idakses','fk_idkota','namacustomer','alamatcustomer', 'telpcustomer','telp2customer','faxcustomer','telppiccustomer','topcustomer'];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_iduser', 'id');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'fk_idpegawai', 'id');
    }
    public function akses()
    {
        return $this->belongsTo(Akses::class, 'fk_idakses', 'id');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'fk_idkota', 'id');
    }
}
