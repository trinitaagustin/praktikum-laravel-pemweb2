<?php
require_once 'lingkaran.php';

$lingkaran1 = new Lingkaran(8.4); 
$lingkaran2 = new Lingkaran(10);

echo "Jari-jari Lingkaran 1 = " . $lingkaran1->jari; 
echo "<br>Nilai PHI = " . Lingkaran::PHI; 
echo "<br>Luas Lingkaran 1 = " . $lingkaran1->getLuas(); 
echo "<br>Keliling Lingkaran 1 = " . $lingkaran1->getKeliling(); 
echo "<hr>";

$lingkaran1->cetak(); 
echo "<hr>";
$lingkaran2->cetak();
?>
