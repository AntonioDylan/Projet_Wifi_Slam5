<?php
  function reserveAdresseDHCP($ipAddress, $mac,$description,$nom){
    $command = "Add-DhcpServerv4Reservation -ScopeId 10.10.0.0 -IPAddress 10.10.130.".$ipAddress." -ClientId ".$mac." -Description \"".$description."\" -Name \"".$nom."\"";
    $monfichier = fopen('scriptPS.txt', 'a');
    fwrite($monfichier, $command); // On écrit le nouveau nombre de pages vues.
    fwrite($monfichier, "\r\n");
    fclose($monfichier);
  }

  function supprimeAdresseDHCP($computerName, $mac){
    $command = "Remove-DhcpServerv4Reservation -ComputerName \"".$computerName."\" -ScopeId 10.10.0.0 -ClientId ".$mac;
    $monfichier = fopen('scriptPS.txt', 'a');
    fwrite($monfichier, $command); // On écrit le nouveau nombre de pages vues.
    fwrite($monfichier, "\r\n");
    fclose($monfichier);
  }

  function reserveAdresseCisco($mac){
    $command = "nvram set wlan0_ssid0_acl_list=".$mac.",unknown,1\;";
    $monfichier = fopen('scriptPS.txt', 'a');
    fwrite($monfichier, $command); // On écrit le nouveau nombre de pages vues.
    fwrite($monfichier, "\r\n");
    fclose($monfichier);
  }

  function supprimeAdresseCisco(){
    $command = "nvram set wlan0_ssid0_acl_list=,unknown,1\;";
    $monfichier = fopen('scriptPS.txt', 'a');
    fwrite($monfichier, $command); // On écrit le nouveau nombre de pages vues.
    fwrite($monfichier, "\r\n");
    fclose($monfichier);
  }

  reserveAdresseDHCP(111,534564156461,"test","test");
  supprimeAdresseDHCP("test",534564156461);
  reserveAdresseCisco(534564156461);
  supprimeAdresseCisco();
?>
