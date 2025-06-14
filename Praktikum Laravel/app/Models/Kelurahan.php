<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{

    use HasFactory;
    protected $table = 'kelurahan';
    protected $filalable = ['id', 'kelurahan'];

    public $timestamps = false;

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }


}