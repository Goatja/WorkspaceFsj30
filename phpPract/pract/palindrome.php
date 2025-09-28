<?php 

//Funcion que verfique si un palabra dada es palindromo

function isPalindrome($word):bool{

    //Podriamos usar un metodo de php que hace el trabajo de darle vuelta a una cadena.
    //strrev
    //En este caso se hara manual usando un for.
    $strRev = [];//Inicializado como arreglo vacio, aunque despues se volvera en cadena.
    for($i = strlen($word) - 1; $i >= 0; $i--){
        $strRev[] = $word[$i];
    }
    $strRev = implode($strRev);

    if($word === $strRev){
        return true;
    }
    return false;
}

if(!isPalindrome("madam")){
    echo "Is not a palindrome!";
}else{
    echo "Is Palindrome!";
}
