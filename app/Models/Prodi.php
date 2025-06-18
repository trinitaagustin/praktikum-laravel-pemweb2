<?php

namespace App\Models;

class Prodi
{
    public $kode;
    public $nama;

    public function __construct($kode, $nama)
    {
        $this->kode = $kode;
        $this->nama = $nama;
    }
}
