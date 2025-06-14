<?php
class NilaiMahasiswa{
    public $nama;
    public $matakuliah;
    public $nilai_uts;
    public $nilai_uas;
    public $nilai_tugas;
    public const PRESENTASE_UTS = 0.25;
    public const PRESENTASE_UAS = 0.30;
    public const PRESENTASE_TUGAS = 0.45;
    public const KKM = 60;

    public function getNilaiAkhir(){
        $nilai = self::PRESENTASE_UTS * $this->nilai_uts 
                 + self::PRESENTASE_UAS * $this->nilai_uas
                 + self::PRESENTASE_TUGAS * $this->nilai_tugas;
        return $nilai;
    }

    public function kelulusan(){
        if ($this->getNilaiAkhir() >= self::KKM) {
            return "Lulus";
            } else {
            return "Tidak Lulus";
            }
    }


}
?>