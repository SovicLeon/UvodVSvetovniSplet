<?php
    session_start();

    if(isset($_SESSION['user_start'])) {
        if (time() - $_SESSION['user_start'] < 1800) { // 300 seconds = 5 minutes
            $_SESSION['user_start'] = time();
        } else {
            header('Location: odjava.php');
            exit();
        }
    } else {
        $_SESSION['user_start'] = time();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>

<header style="height: 100px" class="bg-primary">
        <h1 class="text-light p-2">
            Novice
        </h1>

        <?php

            if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
                echo "<span class=\"text-light float-right\">Pozdravljeni, " . $_SESSION['username'] . "!  <a href=\"odjava.php\" class=\"text-light\">Odjavi</a></span>";
            } else {
                echo '<a href="prijava.php" class="text-light float-right">Prijava</a>';
            }
            
        ?>

    </header>

    <div style="border: solid 2px black; margin: 10px;">

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
                "<h2>$n->naslov</h2>
                <p>$n->povzetek</p>";

                if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
                    echo "<p>$n->vsebina</p>";
                } else {
                    echo '<p>Za dostop do vsebine se prijavite!</p>';
                }

                echo "<br> <span><i>Objavil $n->avtor, $n->datum</i></span>
                </div>";
            }
        }
    } else {
        echo "Novica ne obstaja!";
    }

?>

    </div>
    <a href="index.php">Nazaj</a>
</body>
</html>