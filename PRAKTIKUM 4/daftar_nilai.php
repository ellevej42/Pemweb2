<?php
    require_once 'class_nilaimahasiswa.php';

    $mhs1 = new NilaiMahasiswa();
    $mhs1->nama = "Budi Santoso";
    $mhs1->matakuliah = "Dasar Dasar Pemrograman";
    $mhs1->nilai_uts = 85;
    $mhs1->nilai_uas = 90;
    $mhs1->nilai_tugas = 55; 

    $mhs2 = new NilaiMahasiswa();
    $mhs2->nama = "Indah";
    $mhs2->matakuliah = "Pemweb 2";
    $mhs2->nilai_uts = 80;
    $mhs2->nilai_uas = 96;
    $mhs2->nilai_tugas = 70; 

    $mhs3 = new NilaiMahasiswa();
    $mhs3->nama = "Riyan";
    $mhs3->matakuliah = "Basis Data";
    $mhs3->nilai_uts = 30;
    $mhs3->nilai_uas = 40;
    $mhs3->nilai_tugas = 50; 

    $ar_mahasiswa = [$mhs1, $mhs2, $mhs3];
?>
<h2 style="text-align:center">Daftar Nilai Mahasiswa</h2>
<table border="1" cellpadding="2" cellspacing="2" width="100%">
    <thead>
        <tr><th>No</th><th>Nama Mahasiswa</th><th>Mata Kuliah</th><th>Nilai UTS</th><th>Nilai UAS</th>
        <th>Nilai Tugas</th><th>Nilai Akhir</th><th>Keterangan</th></tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($ar_mahasiswa as $obj){
        ?> 
        <tr>
            <td><?= $no?></td>
            <td><?= $obj->nama?></td>
            <td><?= $obj->matakuliah?></td>
            <td><?= $obj->nilai_uts?></td>
            <td><?= $obj->nilai_uas?></td>
            <td><?= $obj->nilai_tugas?></td>
            <td><?= $obj->getNilaiAkhir()?></td>
            <td><?= $obj->Kelulusan()?></td>
        </tr>
        
        <?php
        $no++;
        }
        ?>
    </tbody>
    

