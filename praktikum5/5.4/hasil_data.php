<?php
require_once 'class_mahasiswa.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $matkul = $_POST['matkul'];
    $nilai = $_POST['nilai'];

    // Buat objek mahasiswa
    $mhs = new Mahasiswa($nama, $nim, $matkul, $nilai);

    // Hitung kelulusan dan grade
    $kelulusan = $mhs->kelulusan();
    $grade = $mhs->grade();
} else {
    // Redirect jika tidak ada POST
    header("Location: form_mahasiswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="mx-auto mt-5 border border-2 border-dark p-3 bg-success text-white rounded" style="width: 45%;">
        <h3 class="text-center">Hasil Data Mahasiswa</h3>
        <table class="table border border-2 border-success mt-3 text-white w-75 mx-auto">
            <tbody>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($mhs->nim) ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($mhs->nama) ?></td>
                </tr>
                <tr>
                    <td>Mata Kuliah</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($mhs->matkul) ?></td>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td>:</td>
                    <td><?= htmlspecialchars($mhs->nilai) ?></td>
                </tr>
                <tr>
                    <td>Hasil Ujian</td>
                    <td>:</td>
                    <td><?= $kelulusan ?></td>
                </tr>
                <tr>
                    <td>Grade</td>
                    <td>:</td>
                    <td><?= $grade ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center my-3">
            <a href="form_mahasiswa.php" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</body>

</html>