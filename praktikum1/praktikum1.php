
<?php
  $ns1 = ['id' => 1,'nama' => 'Dappa','nim' => '01101','uts' => 80,'uas' => 84, 'tugas'=> 78];
  $ns2 = ['id' => 2,'nama' => 'Najwan','nim' => '01121','uts' => 70,'uas' => 50, 'tugas'=> 68];
  $ns3 = ['id' => 3,'nama' => 'Samil','nim' => '01130','uts' => 60,'uas' => 86, 'tugas'=> 70];
  $ns4 = ['id' => 4,'nama' => 'Ariel','nim' => '01134','uts' => 90,'uas' => 91, 'tugas'=> 82];
  $ns5 = ['id' => 5,'nama' => 'Febri','nim' => '01134','uts' => 80,'uas' => 71, 'tugas'=> 85];

  $ar_nilai = [$ns1, $ns2 , $ns3, $ns4, $ns5];

  echo $ar_nilai[0]["nim"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
</head>
<body>
    <h3>Daftar Nilai Mahasiswa</h3>
    <table border = "1" width = "100%" >
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Uts</th>
        <th>Uas</th>
        <th>Tugas</th>
        <th>Nilai Akhir</th>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach($ar_nilai as $ns){
            echo '<tr><td>' .$nomor .'</td>';
            echo '<td>' .$ns ['nama']. '</td>';
            echo '<td>' .$ns ['nim']. '</td>';
            echo '<td>' .$ns ['uts']. '</td>';
            echo '<td>' .$ns ['uas']. '</td>';
            echo '<td>' .$ns ['tugas']. '</td>';
            $nilai_akhir = ($ns['uts'] + $ns['uas']+$ns['tugas'])/3;
            echo '<td>'.number_format($nilai_akhir,2,',','.').'</td>';
            echo '<tr/>';
            $nomor++;
        }
        ?>
    </tbody>
</body>
</html>