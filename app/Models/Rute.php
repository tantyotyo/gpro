<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rute';
    protected $fillable = ['namarute','portofloading','portofdischarge','keterangan'];
}
