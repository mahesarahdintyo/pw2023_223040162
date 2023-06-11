<?php

// LUAS LINGKARAN
echo "<h4> Menghitung Luas Lingkaran </h4>";
function hitungLuasLingkaran($r)
{
    // AWAL FUNCTION LUAS LINGKARAN
    echo "jari-jari : $r cm";
    echo "<br>";
    // RUMUS LUAS
    $hasil = 3.14 * $r * $r;
    echo "Luas Lingkaran : $hasil";
    // AKHIR FUNCTION LUAS LINGKARAN
}
echo hitungKelilingLingkaran(20);
echo "<hr>";
// KELILING LINGKARAN
echo "<h4>Menghitung Keliling Lingkaran</h4> ";
function hitungKelilingLingkaran($r)
{
    // AWAL FUNCTION KELILING LINGKARAN
    echo "jari-jari : $r cm";
    echo "<br>";
    // RUMUS KELILING 
    $hasil = 2 * 3.14 * $r;
    echo "Keliling Lingkaran : $hasil";
    // AKHIR FUNCTION KELILING LINGKARAN
}

echo hitungLuasLingkaran(10);
echo "<hr>";
