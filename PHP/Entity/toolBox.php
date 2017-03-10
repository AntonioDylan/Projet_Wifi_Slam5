<?php

echo(macCheck("2A-3C-5a-f6-b6-f3"));

function macCheck($mac)
{

    if (preg_match('/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', $mac) || preg_match('/([a-fA-F0-9]{12})/', $mac)) {

        try {
            return macFormat($mac);
        } catch (Exception $e) {
            throw new Exception('Formatage impossible');
        }

  } else {
     throw new Exception('Le paterne ne correspond pas');

  }
}



function macFormat($mac){
    $macPur="";
    for($i = 0; $i<strlen($mac); $i++){
        $submac = substr($mac,$i,1);
        if(preg_match('/([a-fA-F0-9])/', $submac)){
            $macPur .= $submac;
        }
    }
    $macPur = strtolower($macPur);
    return $macPur;

} 

?>