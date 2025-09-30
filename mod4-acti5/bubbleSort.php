<?php
/* 
Problema de Ordenar Lista con Bubble Sort:
Escribe un programa que ordene una lista de números de forma descendente utilizando el algoritmo Bubble Sort. 
La lista puede contener duplicados y valores negativos. Asegúrate de manejar estos casos y muestra la lista antes y después de aplicar el algoritmo
*/

function bubbleSort($arr){
    if($arr === []) return $arr;

    $isSwapped = false;

    $len = count($arr);
    for($i = 0; $i < $len; $i++){
        for($j = 0; $j < $len - $i - 1; $j++){
            if($arr[$j] < $arr[$j+1]){

                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] =$temp;

                $isSwapped = true;
            }
        }

        if(!$isSwapped) break;
    }

    return $arr;
}

$arrayF = array(10,6,1,10,9,3,-5,5,2,7,9,8,4);

echo "Lista antes \n";
print_r( $arrayF);
echo "\n Lista ordenada \n"; 
print_r(bubbleSort($arrayF));