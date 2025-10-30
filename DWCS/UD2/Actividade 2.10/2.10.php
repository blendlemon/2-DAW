<?php

$no_permitidos = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
$permitidos = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
$eliminables = array(' ', ',', '.', ';', ':', '-', '´', '\"', '\'', '¡', '¿', '!', '?');

/* Completa la función  que reciba un string y devuelva un valor booleano indicando si se trata de un palíndromo o no
  Utiliza los  arrays de caracteres no permitidos que deberán ser reemplazados por su correspondiente carácter permitido (misma posición)
 * Los  símbolos eliminables podrán ser sustituidos por cadena vacía ""
 *  */

function es_palindromo($frase): bool {
    //Ayuda: Ámbito de las variables
    //https://www.php.net/manual/es/language.variables.scope.php
    global $no_permitidos, $permitidos, $eliminables;

    // Replace accented/invalid characters with allowed ones
    $s = str_replace($no_permitidos, $permitidos, $frase);
    // Remove eliminable symbols
    $s = str_replace($eliminables, '', $s);
    // Normalize case using multibyte safe function
    $s = mb_strtolower($s, 'UTF-8');

    // Split into multibyte characters, reverse and compare
    $chars = preg_split('//u', $s, -1, PREG_SPLIT_NO_EMPTY);
    $reversed = implode('', array_reverse($chars));

    if ($s === $reversed){
        return true;
    }else{
        return false;
    }
}
