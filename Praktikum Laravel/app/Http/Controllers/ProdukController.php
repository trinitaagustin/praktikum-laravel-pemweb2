<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function show()
    {
        $produk1 = new Produk('P001', 'Laptop', 15000000);
        $produk2 = new Produk('P002', 'Smartphone', 5000000);
        $produk3 = new Produk('P003', 'Tablet', 3000000);

        $ar_produk = [$produk1, $produk2, $produk3];

        return view('produk.index', ['ar_produk' => $ar_produk]);
    }
}
