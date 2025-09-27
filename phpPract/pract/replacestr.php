<?php 

//Reemplezar letras en una cadena de texto.
$txtToReplace = "examen extraordinario de expresividad";

function replaceStr($str): string{
   for($i = 0; $i < strlen($str); $i++){
        if($str[$i] === "x"){
            $str[$i] = "s";
        }
    }
    return $str;
}

$result = replaceStr($txtToReplace);

echo $result;
echo str_replace("e", "a", $txtToReplace);

