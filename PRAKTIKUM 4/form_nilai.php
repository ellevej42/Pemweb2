<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 2 - 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>Form Mata Kuliah</h3>
    <hr>
    <?php
       $ar_matkul =[
         "DDP"=>"Dasar-Dasar Pemrograman",
         "WEB1"=>"Pemrograman Web 1",
         "WEB2"=>"Pemrograman Web 2",
         "SB"=>"Statistik Dan Probabilitas",
         "BD"=>"Basis Data",
         "AI"=>"Kecerdasan Buatan",
       ]
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama lengkap</label> 
        <div class="col-8">
        <div class="input-group">
            <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-address-card-o"></i>
            </div>
            </div> 
            <input id="nama" name="nama" type="text" class="form-control">
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Mata kuliah</label> 
        <div class="col-8">
        <select id="matkul" name="matkul" class="custom-select">
            <option value="">-- Pilih Mata Kuliah --</option>

        <?php
            foreach ($ar_matkul as $kode => $nama) {
                echo "<option value='$kode'>$nama</option>";
                }
        ?>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nilai UTS</label> 
        <div class="col-8">
        <input id="nilai_uts" name="nilai_uts" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Nilai UAS</label> 
        <div class="col-8">
        <input id="nilai_uas" name="nilai_uas" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Nilai Tugas Praktikum</label> 
        <div class="col-8">
        <input id="nilai_tugas" name="nilai_tugas" type="text" class="form-control">
        </div>
    </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
    <hr>
    Hasil Input Data Nilai Mahasiswa
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_nama = $_POST['nama'];
      $_matkul = $_POST['matkul'];
      $_nilai_uts = $_POST['nilai_uts'];
      $_nilai_uas = $_POST['nilai_uas'];
      $_nilai_tugas = $_POST['nilai_tugas'];
      $_rata_rata = ($_nilai_uts * 0.3)+($_nilai_uas*0.3)+($_nilai_tugas*0.4);
      $_keterangan= keterangan ($_rata_rata);
      $_grade = grade ($_rata_rata);
    ?>
Nama Mahasiswa : <?php echo $_nama; ?><br>
Mata Kuliah : <?php echo $_matkul; ?><br>
Nilai UTS : <?php echo $_nilai_uts; ?><br>
Nilai UAS : <?php echo $_nilai_uas; ?><br>
Nilai Tugas Praktikum : <?php echo $_nilai_tugas; ?><br>
Rata Rata Nilai : <?php echo $_rata_rata; ?> <br>
Apakah Anda Lulus? : <?=$_keterangan; ?><br>
Bagaimana nilai anda : <?=$_grade; 

    }


function keterangan ($_rata_rata){
    if ($_rata_rata >= 80) {
        return "Lulus";
    }
    else {
        return "Tidak Lulus";
        }
}
function grade ($_rata_rata){
    if ($_rata_rata >= 85 && $_rata_rata <= 100) {
        return "A (Sangat Baik)" ;
    }
    elseif ($_rata_rata >= 60 && $_rata_rata < 85) {
        return "B (Baik)" ;
    }
    elseif ($_rata_rata >= 40 && $_rata_rata < 60){
        return "C (Cukup)" ;
    }
    elseif ($_rata_rata >= 0 && $_rata_rata < 40){
        return "D (Kurang)" ;
    }
    else{
        return "(Tidak Lulus)" ;
    }
}
?>
<?php
include_once "daftar_nilai.php";
?>
</body>
</html>