<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    
function mask($val, $mask){
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++) {
   if($mask[$i] == '#') {
     if(isset($val[$k]))
       $maskared .= $val[$k++];
       } else {
       if(isset($mask[$i]))  
         $maskared .= $mask[$i];
       }
   }
 return $maskared;
}

function Mascara_string($mascara,$string){
    $string = str_replace(" ","",$string);
    for($i=0;$i<($string);$i++){
        $mascara[strpos($mascara,"#")] = $string[$i];
        return $mascara;
    }
}

