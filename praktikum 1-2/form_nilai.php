<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="form_nilai.php" method="post">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nama" name="nama" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select">
        <option value="Pemrograman Web">Pemrograman Web</option>
        <option value="UI/UX">UI/UX</option>
        <option value="Basis Data">Basis Data</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="uts" name="uts" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="uas" name="uas" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tugas" class="col-4 col-form-label">Nilai Tugas</label> 
    <div class="col-8">
      <input id="tugas" name="tugas" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

    <?php
    //ngambil data form
    if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];
    $rata_rata = ($uts * 0.3)+($uas * 0.3)+($tugas * 0.4);
    $keterangan = keterangan ($rata_rata);
    $grade = grade ($rata_rata);

    //menampilkan hasil di web
    echo "Nama : $nama <br>";
    echo "Mata Kuliah : $matkul <br>";
    echo "Nilai UTS : $uts <br>";
    echo "Nilai UAS : $uas <br>";
    echo "Nilai Tugas : $tugas <br>";
    echo "Rata-Rata Nilai : $rata_rata <br>";
    echo "Keterangan : $keterangan <br>";
    echo "Grade : $grade <br>";

    }

    //menentukan keterangan lulus dan tidak lulus
    function keterangan ($rata_rata){
        if ($rata_rata >= 80) {
            return "Lulus";
            } 
            else {
                return "Tidak Lulus";
                }
    }

    //menentukan keterangan grade
    function grade ($rata_rata){
        if ($rata_rata >= 85 && $rata_rata <= 100){
            return "A (sangat baik)";
    }
    elseif ($rata_rata >= 60 && $rata_rata < 84){
        return "B (baik)";
    }
    elseif ($rata_rata >= 40 && $rata_rata < 59){
        return "C (cukup)";
    }
    elseif ($rata_rata >= 20 && $rata_rata < 39){
        return "D (kurang)";
    }
    elseif ($rata_rata < 0 && $rata_rata >= 19){
        return "E (sangat kurang)";
    }
    else{
        return "Tidak Lulus";
    }
}
    ?>
</body>
</html