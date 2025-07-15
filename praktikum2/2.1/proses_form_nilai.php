<?php
    // Pastikan form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
        $matkul = isset($_POST['matkul']) ? $_POST['matkul'] : '';
        $uts = isset($_POST['uts']) ? $_POST['uts'] : '';
        $uas = isset($_POST['uas']) ? $_POST['uas'] : '';
        $tugas = isset($_POST['tugas']) ? $_POST['tugas'] : '';
        $rata_rata = ($uts * 0.3) + ($uas * 0.3) + ($tugas * 0.4);
        $keterangan = keterangan($rata_rata);
        $grade = grade($rata_rata);
    }

    function keterangan($rata_rata)
    {
        if ($rata_rata >= 70) {
            return "Lulus";
        } else {
            return "Tidak Lulus";
        }
    }

    function grade($rata_rata)
    {
        if ($rata_rata >= 85 && $rata_rata <= 100) {
            return "A (Sangat Baik)";
        } elseif ($rata_rata >= 70 && $rata_rata <= 84) {
            return "B (Baik)";
        } elseif ($rata_rata >= 40 && $rata_rata <= 69) {
            return "C (Cukup)";
        } elseif ($rata_rata >= 20 && $rata_rata <= 39) {
            return "D (Kurang)";
        } elseif ($rata_rata >= 10 && $rata_rata <= 19) {
            return "E (Sangat Kurang)";
        } else {
            return "Tidak Lulus";
        }
}
?>
