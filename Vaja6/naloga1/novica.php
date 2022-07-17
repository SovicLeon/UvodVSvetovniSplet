<?php
    include 'baza.php';

    $obstaja = false;

    if(isset($_GET["id"])) {
        foreach ($novice as $n) {
            if($n->id==$_GET["id"]) {
                $obstaja = true;
            }
        }
    } else {
        echo "Novica ne obstaja!";
    }

    if($obstaja) {
        foreach ($novice as $n) {
            if($n->id==$_GET["id"]) {
                echo 
                "<div style=\"border: solid 2px black; margin: 10px;\">
                <h2>$n->naslov</h2>
                <p>$n->povzetek</p>
                <p>$n->vsebina</p>
                <br> <span><i>Objavil $n->avtor, $n->datum</i></span>
                </div>";
            }
        }
    } else {
        echo "Novica ne obstaja!";
    }

?>