<?php
require_once '../db/dbkoneksi.php';

$idEdit = isset($_GET['idedit']) ? $_GET['idedit'] : null;
$namaBtn = 'Simpan';

if ($idEdit) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idEdit);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $namaBtn = 'Update';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pemeriksaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center"><?= $namaBtn ?> Pemeriksaan</h2>
    <form action="proses_periksa.php" method="post">
        <?php if ($idEdit): ?>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <?php endif; ?>
        
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $result['tanggal'] ?? '' ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Berat (kg)</label>
            <input type="number" step="0.1" name="berat" value="<?= $result['berat'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Tinggi (cm)</label>
            <input type="number" step="0.1" name="tinggi" value="<?= $result['tinggi'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Tensi</label>
            <input type="text" name="tensi" value="<?= $result['tensi'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $result['keterangan'] ?? '' ?></textarea>
        </div>
        
        <!-- Dropdown Pasien -->
        <div class="form-group">
            <label>Pasien</label>
            <select name="pasien_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                <?php
                // Menampilkan daftar pasien
                $sql = "SELECT id, nama FROM pasien";
                $pasienResult = $conn->query($sql);
                while ($pasien = $pasienResult->fetch_assoc()) {
                    $selected = (isset($result['pasien_id']) && $result['pasien_id'] == $pasien['id']) ? 'selected' : '';
                    echo "<option value='{$pasien['id']}' {$selected}>{$pasien['nama']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Dropdown Dokter -->
        <div class="form-group">
            <label>Dokter</label>
            <select name="dokter_id" class="form-control" required>
                <option value="">Pilih Dokter</option>
                <?php
                // Menampilkan daftar paramedik (dokter)
                $sql = "SELECT id, nama FROM paramedik WHERE kategori='dokter'";
                $dokterResult = $conn->query($sql);
                while ($dokter = $dokterResult->fetch_assoc()) {
                    $selected = (isset($result['dokter_id']) && $result['dokter_id'] == $dokter['id']) ? 'selected' : '';
                    echo "<option value='{$dokter['id']}' {$selected}>{$dokter['nama']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= $namaBtn ?></button>
        <a href="list_periksa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
