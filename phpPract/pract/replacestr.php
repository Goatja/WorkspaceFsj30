<?php 

//Reemplezar letras en una cadena de texto.

$txtToReplace = "examen extraordinario de expresividad";

function replaceStr($str): string{
    
   for($i = 0; $i < strlen($str); $i++){
        if($str[$i] === "x"){
            $str[$i] = "s"; /*Esto no esta bien ya que las cadenas en php son inmutables 
                                aunque en este caso es permitido pero puede llagar a causar algunos
                                problemas.
                                Por que me permite hacer un aparente cambio entonces?
                                Tecnicamente porque no se esta cambiando directamente la referencia del str sino una copia 
                                temporal mienstras existe la funcion.
                            */
        }
    }
    return $str;
}

$result = replaceStr($txtToReplace);//Puede resultar en algunos problemas

echo $result;
echo "\n";
echo str_replace("e", "a", $txtToReplace);//Esta seria una solucion bastante adecuada.



