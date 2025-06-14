<?php
require_once '../db/dbkoneksi.php';

$tanggal = $_POST['tanggal'];
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$tensi = $_POST['tensi'];
$keterangan = $_POST['keterangan'];
$pasien_id = $_POST['pasien_id'];
$dokter_id = $_POST['dokter_id'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Update
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssii", $tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id, $id);
} else {
    // Insert
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id);
}

$stmt->execute();
header("Location: list_periksa.php");
exit();
?>
