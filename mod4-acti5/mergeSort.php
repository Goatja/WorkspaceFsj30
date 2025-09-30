<?php

/* 
Problema de Ordenar Lista con Merge Sort:
Implementa una función que ordene una lista de palabras alfabéticamente utilizando el algoritmo Merge Sort. 
Muestra la lista antes y después de aplicar el algoritmo.
*/


function mergeSortDesc(array $arr): array {
    if (count($arr) <= 1) return $arr;

    $middle = intdiv(count($arr), 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    return mergeDesc(mergeSortDesc($left), mergeSortDesc($right));
}

function mergeDesc(array $left, array $right): array {
    $result = [];

    while (!empty($left) && !empty($right)) {
        if ($left[0] <= $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    return array_merge($result, $left, $right);
}

// Lista con duplicados y negativos
$arrayF = [10, 6, 1, 10, 9, 3, -5, 5, 2, 7, 9, 8, 4];

echo " Lista original:\n";
print_r($arrayF);

$sorted = mergeSortDesc($arrayF);

echo "\n Lista ordenada (descendente):\n";
print_r($sorted);

