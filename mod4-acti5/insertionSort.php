

<?php
function insertionSortAlphabetical(array $arr): array {
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        while ($j >= 0 && strcmp($arr[$j], $key) > 0) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }

        $arr[$j + 1] = $key;
    }

    return $arr;
}


$nombres = ["Carlos", "Ana", "Luis", "Beatriz", "Pedrina", "Zoe", "Mila"];

echo " Lista original:\n";
print_r($nombres);

$ordenada = insertionSortAlphabetical($nombres);

echo "\n Lista ordenada (alfabéticamente):\n";
print_r($ordenada);
