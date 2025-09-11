<?php 

/* 
Resuelve los siguientes problemas utilizando estructuras de control y funciones en PHP. Asegúrate de proporcionar comentarios en tu código para explicar la lógica detrás de cada paso.

 

Problema de la serie Fibonacci:
Escribe una función llamada generar Fibonacci que reciba un número n como 
parámetro y genere los primeros n términos de la serie Fibonacci. La serie 
comienza con 0 y 1, y cada término subsiguiente es la suma de los dos anteriores.

*/



//sin recursividad
function fib($n): void{
    //Debemos de garantizar que si n es igual a cero o uno se devuellvan estos valores
    if($n === 0){ //Nos aseguramos que si n es igual a 0 o a 1 devolver estos valores y terminar la ajecucion del programa.
        echo 0;
        return;
    }elseif ($n === 1 ) {// /\
        # code...
        echo 1;
        return;
    }else{
        /* Nos dice que la seria es la suma de los dos numeros anteriores, para ello, declaramos e inicializamos un primer y segundo numero
        de 0 a 1
         */
        $primer_numero = 0;
        $segundo_numero = 1;
        $tercer_valor = 0;
        echo $tercer_valor . ' ';

        //Usando unas estructura repetitiva, en este caso el for el cual lo arrancamos desde el 2 ya que no necesitamos recorrer desde 0;
        for($i = 2; $i < $n; $i++){
            $tercer_valor = $primer_numero + $segundo_numero;//Aqui sumamos los dos numeros anteriores
            echo $tercer_valor . ' '; //mostramos la suma de estos
            $primer_numero = $segundo_numero; //actualizamos el primer valor en el segundo 

            $segundo_numero = $tercer_valor; //Actualizamos el segundo en la suma de los dos anterires
        }
    }
}




echo fib(10); //El resultado debe de ser 0 1 2 3 5 8 13 21 34, dado 10 como argumento.
//Otra forma de hacer esto mismo es usando la recursividad  ej../// fib($n - 1) + fib($n - 2);


/* //2. Problema de números Primos:
Crea una función llamada esPrimo que determine si un número dado es primo o no. 
Un número primo es aquel que solo es divisible por 1 y por sí mismo. */

function esPrimo($n){
    $nPrimo = "\n No es primo";
    $primo = "\n Es primo";

    if ($n < 2) return $nPrimo; //El eneunciado nos dice que todo numero menor que dos no es primo
    if ($n === 2) return $primo; //El dos es el unico numero divisibl2 por uno y por el mismo
    if ($n % 2 === 0) return $nPrimo; //tod numero mayor de dos  divisible entro dos nos es primo

    for($i = 3 ; $i < $n; $i++){ //arrancamos desde el 3 ya que ya evaluamos los digitos anterires
        if($n % $i == 0) return $nPrimo; //Verificamos ii se encuentra algún divisor → no es primo.
                                        //De lo contarrio es primo.
    }

    return $primo;
   
   
}

print esPrimo(3);//El resultado es que 3 si es primo.

/* 
Problema de Palíndromos:
Implementa una función llamada esPalindromo que determine si una cadena de texto dada es un palíndromo. 
Un palíndromo es una palabra, frase o secuencia que se lee igual en ambas direcciones.
*/

function esPalindromoFrase($texto){
    $limpio = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($texto));
    return $limpio === strrev($limpio) ? "\n Es un palíndromo." : "\n No es un palíndromo.";
}

echo esPalindromoFrase("Anita lava la tina");  // Es un palindromo.

