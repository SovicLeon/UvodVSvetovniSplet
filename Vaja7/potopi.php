<?php
    session_start();

    $polje = array (
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array()
    );

    $smer=rand(0,1);
    $coord1=rand(0,5);
    $coord2=rand(0,5);
    $stevec=0;

    $_SESSION["ladjica"] = array(
                                array(),
                                array(),
                                array(),
                                array(),
                                array()
    );

    $_SESSION["stPo"]=0;

    for ($i=0; $i < 10; $i++) { 
        for ($j=0; $j < 10; $j++) { 
            if ($smer==0&&$i==$coord1&&$j-$stevec==$coord2&&$stevec<5) {
                $_SESSION["ladjica"][$stevec][0]=$i;
                $_SESSION["ladjica"][$stevec][1]=$j;
                $stevec++;
            } else if ($smer==1&&$i-$stevec==$coord1&&$j==$coord2&&$stevec<5) {
                $_SESSION["ladjica"][$stevec][0]=$i;
                $_SESSION["ladjica"][$stevec][1]=$j;
                $stevec++;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potopi</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .grid-container {
            display: grid;
            grid-column-gap: 5px;
            grid-row-gap: 5px;
            grid-template-columns: auto auto auto auto auto auto auto auto auto auto;
            background-color: #2196F3;
            padding: 10px;
            width: 500px;
            height: 500px;
        }

        .grid-item-grey {
            background-color: grey;
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            text-align: center;
        }

        .grid-item-blue {
            background-color: blue;
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            text-align: center;
        }

        .grid-item-red {
            background-color: red;
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="grid-container">
        <?php
            
            for ($i=0; $i < 10; $i++) { 
                for ($j=0; $j < 10; $j++) { 
                
                    echo "<div id=\"$i$j\" class=\"grid-item-grey\"></div>";
                    
                }
            }
        ?>
    </div>

    <script>
    var konec;
    var pozicija;
    $(document).ready(function(){
            $("div").on("click", function(){
                if($(this).hasClass("grid-item-grey")&&konec!=1) {         
                    pozicija = $(this).attr('id');
                    ladja(pozicija[0],pozicija[1]);
                }
            });
    });

    function ladja(x,y) {
        const xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var json = JSON.parse(this.responseText);
                if (json.zadetek==1) {
                    $("#"+pozicija[0]+pozicija[1]).removeClass("grid-item-grey");
                    $("#"+pozicija[0]+pozicija[1]).addClass("grid-item-red");
                    if (json.konec==1) {
                        konec=1;
                        setTimeout("alert(\"Čestitam, igro ste končali v " + json.poskusi + " poskusih.\");", 1);
                    }
                } else {
                    $("#"+pozicija[0]+pozicija[1]).removeClass("grid-item-grey");
                    $("#"+pozicija[0]+pozicija[1]).addClass("grid-item-blue");
                }
            }
        };
        xhttp.open("GET", "preveri.php?x="+x+"&y="+y);
        xhttp.send();  
    }
    </script>
    
</body>
</html>