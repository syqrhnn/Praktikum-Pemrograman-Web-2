<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
    require_once 'data_form_nilai.php';
?>

<body style="font-size: 18px;">

    <form method="POST" action="hasil_form_nilai.php" class="container mt-5">
        <fieldset class="border border-dark p-3 rounded" style="background-color: lightyellow;">
            <legend class="float-none w-auto px-3 fw-bold h3">Form Nilai</legend>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-4 col-form-label">Nama Lengkap</label>
                <div class="col-8">
                    <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label>
                <div class="col-8">
                    <select id="matkul" name="matkul" class="custom-select" required="required">
                        <option value="Dasar-Dasar Pemrograman">-- Pilih Mata Kuliah --</option>

                        <?php
                        foreach ($ar_matkul as $nama => $kode) {
                            echo "<option value='$nama'>$kode</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="uts" class="col-4 col-form-label">Nilai UTS</label>
                <div class="col-8">
                    <input id="uts" name="uts" type="number" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="uas" class="col-4 col-form-label">Nilai UAS</label>
                <div class="col-8">
                    <input id="uas" name="uas" type="number" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label>
                <div class="col-8">
                    <input id="tugas" name="tugas" type="number" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
    
</body>

</html>