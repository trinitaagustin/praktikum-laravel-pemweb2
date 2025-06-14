<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $matkul;
    public $nilai;

    public function __construct($nama, $nim, $matkul, $nilai) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }

    public function kelulusan() {
        if ($this->nilai >= 60) {
            return "Lulus";
        }
        else {
            return "Tidak Lulus";
        }
    }
}
    public function grade() {
        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 70) {
                return "B";
        } elseif ($this->nilai >= 55) {
                return "C";
        } elseif ($this->nilai >= 40) {
                return "D";
        } else {
                return "E";
        }
    }


?>