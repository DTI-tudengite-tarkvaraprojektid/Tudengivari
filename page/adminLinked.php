<?php
require("../functions.php");
if(!isset ($_SESSION["userId"])) {

    header("Location: admin.php");
    exit();
}
if(isset($_GET["logout"])) {

    session_destroy();

    header("Location: admin.php");
    exit();
}


$varjuPaarid=$Pair->getVarjud();
$tudengiPaarid=array_merge($Pair->getTudengid(),$Pair->getTudengid2())
?>
<?php require("../header.php");?>
<?php require("../style/style.css");?>
<html>
<head>

</head>
<body>
<p class="pageHeading"><a onclick="goBack()"><-tagasi-</a>OLED ADMINIGA SISSE LOGITUD.... <a href="?logout=1">logi valja</a></p>
<p  class="pageHeading">Kokku liidetud:</p>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h6>Varjud: </h6>
            <?php

            $html = "<table style='width: 20%;' class='table table-striped'>";
            $html .= "<tr>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Email</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Telefoni nr</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > PairId</center></th>";




            foreach($varjuPaarid as $VP){
                    $html .= "<tr>";
                    $html .= "<td><center><a >$VP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$VP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$VP->vanus</a></center></td>";
                    $html .= "<td><center><a >$VP->bm</a></center></td>";
                    $html .= "<td><center><a >$VP->eriala</a></center></td>";
                    $html .= "<td><center><a >$VP->email</a></center></td>";
                    $html .= "<td><center><a >$VP->telnr</a></center></td>";
                    $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$VP->pairId</a></center></td>";
                    $html .= "</tr>";

            }
            $html .= "</Table>";
            echo $html;
            ?> 
        </div>
        <div class="col">
            <h6>Tudengid: </h6>
            <?php

            $html = "<table style='width: 20%' class='table table-striped'>";
            $html .= "<tr>";
            $html .= "<th><center><a style='font-size: 20px' > PairId</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > PairId2</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Email</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Telefoni nr</center></th>";




            foreach($tudengiPaarid as $TP){
                    $html .= "<tr>";
                    if (isset($TP->pairId2)) {
                        $html .= "<td><center><a >-</a></center></td>";
                        $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$TP->pairId2</a></center></td>";
                    }else{
                        $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$TP->pairId</a></center></td>";
                        $html .= "<td><center><a>-</a></center></td>";
                    }
                    $html .= "<td><center><a >$TP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$TP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$TP->vanus</a></center></td>";
                    $html .= "<td><center><a >$TP->bm</a></center></td>";
                    $html .= "<td><center><a >$TP->eriala</a></center></td>";
                    $html .= "<td><center><a >$TP->email</a></center></td>";
                    $html .= "<td><center><a >$TP->telnr</a></center></td>";

                    $html .= "</tr>";

            }
            $html .= "</Table>";
            echo $html;
            ?>
        </div>
    </div>
</div>


</body>
</html>
<?php require("../footer.php");?>