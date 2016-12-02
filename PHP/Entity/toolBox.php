<?php

function static macCheck($mac){
    if ( preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $mac) )
    {

        try{
            macFormat($mac);
        }
        catch{
            throw new Exeption('Formatage impossible');
        }
        
    } else {
        throw new Exeption('Le paterne ne correspond pas');
    }
}



function static macFormat($mac){
    for(int i = 0, i<strlen($mac, i++){
        $macPur="";
        if(substr($mac,i) == preg_match('/([a-fA-F0-9]/'){
            $macPur += substr($mac,i);
        }


    }

for(int i = 0, i<strlen($macPur, i++){
        if(substr($macPur,i) == preg_match( '/([A-F])/', $macPur)){
            substr_replace($macPur,strtolower(substr($macPur,i,1),0));
        }
}

    return $macPur;

} 

?>