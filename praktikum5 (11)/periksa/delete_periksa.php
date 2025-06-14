<?php
require_once '../db/dbkoneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM periksa WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: list_periksa.php");
exit();
?>
