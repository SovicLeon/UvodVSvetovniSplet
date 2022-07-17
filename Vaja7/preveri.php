<?php
    header('Content-type: application/json');
    session_start();

    if($_GET) {
        $_SESSION["stPo"]++;

        $_GET["x"];
        $_GET["y"];
        

        foreach($_SESSION["ladjica"] as $k=>$val) {
            if ($_SESSION["ladjica"][$k][0]==$_GET["x"]&&$_SESSION["ladjica"][$k][1]==$_GET["y"]) {
                unset($_SESSION['ladjica'][$k]);
                $zadetek=1;
            }
        }

        if (!isset($zadetek)) {
            $zadetek=0;
        }

        if (count($_SESSION["ladjica"])==0) {
            $konec=1;
        } else {
            $konec=0;
        }

        $return_arr = array("zadetek" => $zadetek,
                        "konec" => $konec,
                        "poskusi" => $_SESSION["stPo"]);

        echo json_encode($return_arr);
    }
    
?>