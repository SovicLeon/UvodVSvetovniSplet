<?php
    include 'baza.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a
        {
            float: right;
        }
        header
        {
            display: inline-block;
            height: 150px;
            width: 100%;
            border: solid
        }
    </style>
</head>
<body>
    <header>
        <h1>
            Novice
        </h1>
        <a href="">
            Prijava
        </a>
    </header>
    <main>
        <?php
            //sess destroy po  casu:
            //https://www.codegrepper.com/code-examples/php/session+destroy+after+some+time+in+php
            foreach ($novice as $n) {
                echo 
                "<div style=\"border: solid 2px black; margin: 10px;\">
                <h2>$n->naslov</h2>
                <p>$n->povzetek</p>
                <br> <span><i>Objavil $n->avtor, $n->datum</i></span>
                <a href=\"novica.php?id=$n->id\">Preberi</a>
                </div>";
            }

            
        ?>
        <a href=""></a>
    </main>
</body>
</html>