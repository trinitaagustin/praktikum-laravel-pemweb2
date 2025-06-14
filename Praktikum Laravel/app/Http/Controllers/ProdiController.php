<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function show()
    {
        $prodi1 = new Prodi('SI', 'Sistem Informasi');
        $prodi2 = new Prodi('TI', 'Teknologi Informasi');
        $prodi3 = new Prodi('BD', 'Bisnis Digital');

        $ar_prodi = [$prodi1, $prodi2, $prodi3];

        return view('prodi.index', ['ar_prodi' => $ar_prodi]);
    }
}
