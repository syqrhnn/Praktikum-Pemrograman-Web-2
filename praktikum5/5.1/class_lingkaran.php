<?php
class Lingkaran
{
    private $jari;
    const PHI = 3.14;

    function __construct($r)
    {
        if ($r <= 0) {
            throw new Exception("Jari-jari harus lebih dari 0");
        }
        $this->jari = $r;
    }

    function getLuas()
    {
        return self::PHI * $this->jari * $this->jari;
    }

    function getKeliling()
    {
        return 2 * self::PHI * $this->jari;
    }

    function getJari()
    {
        return $this->jari;
    }
}
?>  