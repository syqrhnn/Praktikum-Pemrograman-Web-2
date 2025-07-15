<?php
require_once "class_persegi_panjang.php";

$hasil = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $panjang = (float) $_POST["panjang"];
        $lebar = (float) $_POST["lebar"];

        $persegi = new PersegiPanjang($panjang, $lebar);

        $hasil = [
            "panjang" => $persegi->getPanjang(),
            "lebar" => $persegi->getLebar(),
            "luas" => $persegi->getLuas(),
            "keliling" => $persegi->getKeliling()
        ];
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perhitungan Persegi Panjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title mb-4 text-center">Perhitungan Persegi Panjang</h2>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Panjang</label>
                        <input type="number" step="0.01" name="panjang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lebar</label>
                        <input type="number" step="0.01" name="lebar" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?= $error ?></div>
                <?php endif; ?>

                <?php if ($hasil): ?>
                    <div class="mt-4">
                        <h5>Hasil Perhitungan:</h5>
                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Luas</th>
                                    <th>Keliling</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $hasil["panjang"] ?></td>
                                    <td><?= $hasil["lebar"] ?></td>
                                    <td><?= number_format($hasil["luas"], 2) ?></td>
                                    <td><?= number_format($hasil["keliling"], 2) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>