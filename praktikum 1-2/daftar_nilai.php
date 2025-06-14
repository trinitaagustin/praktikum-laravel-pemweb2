<?php
require_once 'form_nilai.php';
require_once 'class_nilaimahasiswa.php';

$mhs1 = new NilaiMahasiswa();
$mhs1->nama = "Budi Santoso";
$mhs1->matakuliah = "Pemrograman Web";
$mhs1->nilai_uts = 80;
$mhs1->nilai_uas = 85;
$mhs1->nilai_tugas = 78;

$mhs2 = new NilaiMahasiswa();
$mhs2->nama = "Indah Purnama";
$mhs2->matakuliah = "Dasar - Dasar Pemrograman";
$mhs2->nilai_uts = 100;
$mhs2->nilai_uas = 75;
$mhs2->nilai_tugas = 78;

$mhs3 = new NilaiMahasiswa();
$mhs3->nama = "Bedu Bahlil";
$mhs3->matakuliah = "Tugas Akhir";
$mhs3->nilai_uts = 60;
$mhs3->nilai_uas = 50;
$mhs3->nilai_tugas = 55;

$ar_mahasiswa = [$mhs1, $mhs2, $mhs3];
?>
<h2 style="text-align:center">Daftar Nilai Mahasiswa</h2>
<table border="1" cellpadding="2" cellspacing="2" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Akhir</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; 
        foreach ($ar_mahasiswa as $obj) {
        ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$obj->nama?></td>
            <td><?=$obj->matakuliah?></td>
            <td><?=$obj->nilai_uts?></td>
            <td><?=$obj->nilai_uas?></td>
            <td><?=$obj->nilai_tugas?></td>
            <td><?=$obj->getNilaiAkhir()?></td>
            <td><?=$obj->kelulusan()?></td>
        </tr>
        <?php 
        $no++;
        } 
        ?>
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
    </tbody>
</table>
