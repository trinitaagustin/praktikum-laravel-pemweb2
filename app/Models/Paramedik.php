<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramedik extends Model
{
    use HasFactory;

    protected $table = 'paramedik';

    protected $fillable = [
        'id',
        'nama',
        'gender',
        'tmp_lahir',
        'tgl_lahir',
        'spesialis',
        'telpon',
        'alamat',
        'unit_kerja_id'
    ];

    public $timestamps = false;

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}