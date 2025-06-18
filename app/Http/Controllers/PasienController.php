<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index', compact('pasiens'));
    }

    // Menampilkan form untuk menambah pasien
    public function create()
    {
        $kelurahans = Kelurahan::all(); // Ambil data kelurahan untuk dropdown
        return view('pasien.create', compact('kelurahans'));
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tmp_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|string|max:10',
            'email' => 'nullable|email|max:255',
            'alamat' => 'required|string|max:255',
            'kelurahan_id' => 'required|exists:kelurahan,id',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Menampilkan detail pasien
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    // Menampilkan form untuk mengedit pasien
    public function edit(Pasien $pasien)
    {
        $kelurahans = Kelurahan::all(); // Ambil data kelurahan untuk dropdown
        return view('pasien.edit', compact('pasien', 'kelurahans'));
    }

    // Memperbarui data pasien
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    // Menghapus pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
