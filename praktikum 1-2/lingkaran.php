<?php
class Lingkaran {
    const PHI = 3.14;  
    public $jari;

    public function __construct($jari) {
        $this->jari = $jari;
    }

    public function getLuas() {
        return self::PHI * $this->jari * $this->jari;
    }

    public function getKeliling() {
        return 2 * self::PHI * $this->jari;
    }

    public function cetak() {
        echo "Jari-jari = " . $this->jari;
        echo "<br>Luas = " . $this->getLuas();
        echo "<br>Keliling = " . $this->getKeliling();
    }
}
?>
