<?php
function urutanAngka($angka)
{

    $p = 1;
    for ($z = 1; $z <= $angka; $z++) {

        for ($o = 1; $o <= $z; $o++) {
            echo $p . "";
            $p++;
        }
        echo '<br>';
    }
}
echo urutanAngka(5);
