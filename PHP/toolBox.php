<?php

echo(macCheck("aa:aa:aa:aa:aa:aa"));

function macCheck($mac)
{

    if (preg_match('/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', $mac) || preg_match('/^([0-9A-Fa-f]{12})$/', $mac)) {

        try {
            return macFormat($mac);
        } catch (Exception $e) {
            throw new Exception('Formatage impossible');
        }

  } else {
      return 'Le paterne ne correspond pas : ' . $mac;

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
