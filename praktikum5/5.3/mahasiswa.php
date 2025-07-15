<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademik";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nim = "";
$nama = "";
$prodi = "";
$angkatan = "";
$ipk = "";
$predikat = predikat($ipk);
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from mahasiswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from mahasiswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim = $r1['nim'];
    $nama = $r1['nama'];
    $prodi = $r1['prodi'];
    $angkatan = $r1['angkatan'];
    $ipk = $r1['ipk'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $ipk = $_POST['ipk'];
    $predikat = predikat($ipk);

    if ($nim && $nama && $prodi && $angkatan && $ipk) {
        if ($op == 'edit') { //untuk update
            $sql1 = "update mahasiswa set nim = '$nim',nama='$nama',prodi='$prodi',angkatan='$angkatan',ipk='$ipk',predikat='$predikat' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "insert into mahasiswa(nim,nama,prodi,angkatan,ipk,predikat) values ('$nim','$nama','$prodi','$angkatan','$ipk', '$predikat')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 870px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header text-white bg-primary">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                    header("refresh:5;url=mahasiswa.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                    header("refresh:5;url=mahasiswa.php");//5 : detik
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="prodi" id="prodi">
                                <option value="">- Pilih Prodi -</option>
                                <option value="Sistem Informasi" <?php if ($prodi == "Sistem Informasi")
                                    echo "selected" ?>>Sistem Informasi</option>
                                    <option value="Teknik Informatika" <?php if ($prodi == "Teknik Informatika")
                                    echo "selected" ?>>Teknik Informatika</option>
                                    <option value="Bisnis Digital" <?php if ($prodi == "Bisnis Digital")
                                    echo "selected" ?>>
                                        Bisnis Digital</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="angkatan" class="col-sm-2 col-form-label">Thn Angkatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="angkatan" id="angkatan">
                                    <option value="">- Pilih Angkatan -</option>
                                    <option value="2021" <?php if ($angkatan == "2021")
                                    echo "selected" ?>>2021</option>
                                    <option value="2022" <?php if ($angkatan == "2022")
                                    echo "selected" ?>>2022</option>
                                    <option value="2023" <?php if ($angkatan == "2023")
                                    echo "selected" ?>>2023</option>
                                    <option value="2024" <?php if ($angkatan == "2024")
                                    echo "selected" ?>>2024</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Predikat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "select * from mahasiswa order by id desc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $nim = $r2['nim'];
                            $nama = $r2['nama'];
                            $prodi = $r2['prodi'];
                            $angkatan = $r2['angkatan'];
                            $ipk = $r2['ipk'];
                            $predikat = predikat($ipk);

                            ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nim ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $prodi ?></td>
                                <td scope="row"><?php echo $angkatan ?></td>
                                <td scope="row"><?php echo $ipk ?></td>
                                <td scope="row"><?php echo $predikat ?></td>

                                <td scope="row">
                                    <a href="mahasiswa.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                            class="btn btn-warning">Edit</button></a>
                                    <a href="mahasiswa.php?op=delete&id=<?php echo $id ?>"
                                        onclick="return confirm('Yakin mau delete data?')"><button type="button"
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <?php

    function predikat($ipk)
    {
        if ($ipk >= 0 && $ipk <= 2.0) {
            return "Cukup";
        } elseif ($ipk >= 2.1 && $ipk <= 3.0) {
            return "Baik";
        } elseif ($ipk >= 3.1 && $ipk <= 3.75) {
            return "Memuaskan";
        } elseif ($ipk >= 3.76 && $ipk <= 4.0) {
            return "Cum Laude";
        } else {
            return "Tidak Lulus";
        }
    }
    ?>

</body>

</html>