<?php
class PersegiPanjang
{
    private $panjang;
    private $lebar;

    function __construct($p, $l)
    {
        if ($p <= 0 || $l <= 0) {
            throw new Exception("Panjang dan lebar harus lebih dari 0");
        }

        $this->panjang = $p;
        $this->lebar = $l;
    }

    function getLuas()
    {
        return $this->panjang * $this->lebar;
    }

    function getKeliling()
    {
        return 2 * ($this->panjang + $this->lebar);
    }

    function getPanjang()
    {
        return $this->panjang;
    }

    function getLebar()
    {
        return $this->lebar;
    }
}
?>
