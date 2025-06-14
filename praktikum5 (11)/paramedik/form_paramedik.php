<?php
require_once '../db/dbkoneksi.php';

$idEdit = isset($_GET['idedit']) ? $_GET['idedit'] : null;
$namaBtn = 'Simpan';

// Ambil data unit kerja untuk dropdown
$sql_unit = "SELECT * FROM unit_kerja";
$unit_kerja = $conn->query($sql_unit);

// Jika ada ID untuk edit, ambil data paramedik berdasarkan ID tersebut
if ($idEdit) {
    $sql = "SELECT * FROM paramedik WHERE id=?";
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
    <title>Form Paramedik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center"><?= $namaBtn ?> Paramedik</h2>
    <form action="proses_paramedik.php" method="post">
        <?php if ($idEdit): ?>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <?php endif; ?>
        
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $result['nama'] ?? '' ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="gender" class="form-control" required>
                <option value="L" <?= (isset($result['gender']) && $result['gender'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= (isset($result['gender']) && $result['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tmp_lahir" value="<?= $result['tmp_lahir'] ?? '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?= $result['tgl_lahir'] ?? '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="dokter" <?= (isset($result['kategori']) && $result['kategori'] == 'dokter') ? 'selected' : '' ?>>Dokter</option>
                <option value="perawat" <?= (isset($result['kategori']) && $result['kategori'] == 'perawat') ? 'selected' : '' ?>>Perawat</option>
                <option value="bidan" <?= (isset($result['kategori']) && $result['kategori'] == 'bidan') ? 'selected' : '' ?>>Bidan</option>
                <option value="lainnya" <?= (isset($result['kategori']) && $result['kategori'] == 'lainnya') ? 'selected' : '' ?>>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>Telpon</label>
            <input type="text" name="telpon" value="<?= $result['telpon'] ?? '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $result['alamat'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
    <label>Unit Kerja</label>
    <select name="unit_kerja_id" class="form-control">
        <option value="">-- Pilih Unit Kerja --</option>
        <?php while ($row = $unit_kerja->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>" <?= (isset($result['unit_kerja_id']) && $result['unit_kerja_id'] == $row['id']) ? 'selected' : '' ?>>
                <?= $row['nama'] ?>
            </option>
        <?php endwhile; ?>
    </select>
</div>


        <button type="submit" class="btn btn-success"><?= $namaBtn ?></button>
        <a href="list_paramedik.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
