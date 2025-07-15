<?php

require_once "data_form_registrasi.php";

$_skill_pilihan = $_POST["skills"];

?>

<?php

$_nama = $_POST['nama'];
$_nim = $_POST['nim'];
$_gender = $_POST['gender'];
$_prodi = $_POST['prodi'];
$_domisili = $_POST['domisili'];
$_email = $_POST['email'];
$_skor_skill = skor_skill($_skill_pilihan);
$_kategori_skill = kategori_skill($_skor_skill);

function skor_skill($_skill_pilihan)
{
    $ar_skill = [
        "HTML" => 10,
        "CSS" => 10,
        "JavaScript" => 20,
        "RWD Bootstrap" => 20,
        "PHP" => 30,
        "Python" => 30,
        "Java" => 50
    ];

    $total_skor = 0;

    foreach ($_skill_pilihan as $skill) {
        if (isset($ar_skill[$skill])) {
            $total_skor += $ar_skill[$skill];
        }
    }

    return $total_skor;
}

function kategori_skill($_skor_skill)
{
    if ($_skor_skill >= 100 && $_skor_skill <= 170) {
        return "Sangat Baik";
    } elseif ($_skor_skill >= 60 && $_skor_skill < 100) {
        return "Baik";
    } elseif ($_skor_skill >= 40 && $_skor_skill < 60) {
        return "Cukup";
    } elseif ($_skor_skill > 0 && $_skor_skill < 40) {
        return "Kurang";
    } else {
        return "Tidak Memadai";
    }
}

?>