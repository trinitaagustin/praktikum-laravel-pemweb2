<?php
require_once '../db/dbkoneksi.php';

$idEdit = isset($_GET['idedit']) ? $_GET['idedit'] : null;
$namaBtn = 'Simpan';

if ($idEdit) {
    $sql = "SELECT * FROM pasien WHERE id=?";
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
    <title>Form Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center"><?= $namaBtn ?> Data Pasien</h2>
    <form action="proses_pasien.php" method="post">
        <?php if ($idEdit): ?>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <?php endif; ?>
        
        <!-- Input untuk Kode Pasien -->
        <div class="form-group">
            <label>Kode Pasien</label>
            <input type="text" name="kode" value="<?= $result['kode'] ?? '' ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $result['nama'] ?? '' ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tmp_lahir" value="<?= $result['tmp_lahir'] ?? '' ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?= $result['tgl_lahir'] ?? '' ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="gender" class="form-control" required>
                <option value="L" <?= (isset($result['gender']) && $result['gender'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= (isset($result['gender']) && $result['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $result['email'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $result['alamat'] ?? '' ?></textarea>
        </div>
        
        <!-- Dropdown Kelurahan -->
        <div class="form-group">
            <label>Kelurahan</label>
            <select name="kelurahan_id" class="form-control" required>
                <option value="">Pilih Kelurahan</option>
                <?php
                // Menampilkan daftar kelurahan dari database
                $sql = "SELECT id, nama FROM kelurahan";
                $kelurahanResult = $conn->query($sql);
                while ($kelurahan = $kelurahanResult->fetch_assoc()) {
                    $selected = (isset($result['kelurahan_id']) && $result['kelurahan_id'] == $kelurahan['id']) ? 'selected' : '';
                    echo "<option value='{$kelurahan['id']}' {$selected}>{$kelurahan['nama']}</option>";
                }
                ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success"><?= $namaBtn ?></button>
        <a href="list_pasien.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
