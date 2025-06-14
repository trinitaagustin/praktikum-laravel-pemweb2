<?php

namespace App\Models;

class Produk
{
    public $kode;
    public $nama;
    public $harga;

    public function __construct($kode, $nama, $harga)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
    }
}
