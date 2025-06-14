<?php
require_once '../db/dbkoneksi.php';

$idPasien = $_GET['id'] ?? null;

if ($idPasien) {
    // Hapus data terkait di tabel periksa
    $sqlPeriksa = "DELETE FROM periksa WHERE pasien_id = ?";
    $stmtPeriksa = $conn->prepare($sqlPeriksa);
    $stmtPeriksa->bind_param("i", $idPasien);
    $stmtPeriksa->execute();

    // Hapus data pasien
    $sqlPasien = "DELETE FROM pasien WHERE id = ?";
    $stmtPasien = $conn->prepare($sqlPasien);
    $stmtPasien->bind_param("i", $idPasien);
    if ($stmtPasien->execute()) {
        // Redirect atau tampilkan pesan sukses
        header('Location: list_pasien.php');
        exit();
    } else {
        echo "Error: " . $stmtPasien->error;
    }
}
?>
