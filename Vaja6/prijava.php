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

    include 'baza.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $obstaja = false;
        if(!empty($_POST['username'])) {

            foreach ($uporabniki as $u) {
                if($u->username===$_POST["username"]) {
                    if($u->geslo===$_POST["password"]) {
                        $_SESSION['user_start'] = time();
                        $username = $_POST['username'];
                        $_SESSION['username'] = $username;
                        $obstaja = true;
                    }
                }
            }
        }
        if($obstaja) {
            header('Location: index.php');
            exit();
        }
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
    <main class="col-xs-1 p-4" align="center">
    <form action="prijava.php" method="POST">
        <label for="ime">Uporabniško ime</label><br>
        <input type="text" name="username" id="ime"><br>
        <label for="geslo">Geslo</label><br>
        <input type="password" name="password" id="geslo"><br>
        <input class="m-3" type="submit" value="Prijava">
    </form>
    <?php
        if(isset($obstaja)&&!$obstaja) {
            echo "<p>Vpisni podatki niso pravilni!</p>";
        }
    ?>
    </main>
</body>
</html>