<?php

//10/02/2015
function dateBRtoDateUS($dateBR) {
    $dateArray = explode("/", $dateBR);
    $novaData = $dateArray[2] . "-" . $dateArray[1] . "-" . $dateArray[0];
    return $novaData;
}

//1982-02-10
function dateUStoDateBR($dateUS) {
    $dateArray = explode("-", $dateUS);
    $novaData = $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0];
    return $novaData;
}

?>
