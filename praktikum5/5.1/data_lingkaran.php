<?php
require_once "class_lingkaran.php";

$hasil = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $jari1 = (float) $_POST["jari1"];
        $jari2 = (float) $_POST["jari2"];

        $lingkar1 = new Lingkaran($jari1);
        $lingkar2 = new Lingkaran($jari2);

        $hasil[] = [
            "label" => "Lingkaran I",
            "jari" => $lingkar1->getJari(),
            "luas" => $lingkar1->getLuas(),
            "keliling" => $lingkar1->getKeliling()
        ];
        $hasil[] = [
            "label" => "Lingkaran II",
            "jari" => $lingkar2->getJari(),
            "luas" => $lingkar2->getLuas(),
            "keliling" => $lingkar2->getKeliling()
        ];
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perhitungan Lingkaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title mb-4 text-center">Perhitungan Lingkaran</h2>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Jari-jari Lingkaran I</label>
                        <input type="number" step="0.01" name="jari1" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jari-jari Lingkaran II</label>
                        <input type="number" step="0.01" name="jari2" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?= $error ?></div>
                <?php endif; ?>

                <?php if ($hasil): ?>
                    <div class="mt-4">
                        <h5>Nilai PHI: <?= Lingkaran::PHI ?></h5>
                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Lingkaran</th>
                                    <th>Jari-jari</th>
                                    <th>Luas</th>
                                    <th>Keliling</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $row): ?>
                                    <tr>
                                        <td><?= $row["label"] ?></td>
                                        <td><?= $row["jari"] ?></td>
                                        <td><?= number_format($row["luas"], 2) ?></td>
                                        <td><?= number_format($row["keliling"], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
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