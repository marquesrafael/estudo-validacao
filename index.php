<?php
$get_cpf = $_REQUEST['cpf'];

// ejemplo CPF
echo validarCPF($get_cpf);

function validarCPF($cpf) {
    // borrando las variables
    $soma1 = 0;
    $soma2 = 0;
    $cpforiginal = $cpf;

    // eliminar puntos y guiones del CPF
    $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

    /*
    * PRIMER SUPERVISOR
    * Usando la variable $i para separar los caracteres CPF, por lo que contamos de 0 a 8, que es un total de 9 caracteres.
    * Usando la variable $v1 para hacer un decremento, contará de 10 a 2
    */
    for ($i = 0, $v1 = 10; $i <= 8, $v1 >= 2; $i++, $v1--) {
        $soma1 += $cpf[$i] * $v1;
    }
    // Resto de División
    $restoV1 = $soma1 % 11; 
    // Números de caracteres restados por el resto
    $verif1 = 11 - $restoV1; 

    /*
    * SEGUNDO ENCUESTADOR
    * Usando la variable $i para separar los caracteres CPF
    * Contando de 0 a 9 lo que es un total de 10 caracteres (SÍ TAMBIÉN ESTAMOS UTILIZANDO EL PRIMER CÓDIGO DE VALIDADOR CPF)
    * Usando la variable $v2 para hacer un decremento, contará de 11 a 2
    */
    for ($i = 0, $v2 = 11; $i <= 9, $v2 >= 2; $i++, $v2--) {
        $soma2 += $cpf[$i] * $v2;
    }
    // Resto de División
    $restoV2 = $soma2 % 11; 
    // Números de caracteres restados por el resto
    $verif2 = 11 - $restoV2;


    if ($verif1 == $cpf[9] AND $verif2 == $cpf[10]) {
        $result = "O CPF <b>" . $cpforiginal . "</b> é <b>válido</b>";
    } else {
        $result = "O CPF <b>" . $cpforiginal . "</b> é <b>inválido</b>";
    } 

    // Estos CPF no son válidos por ley
    if ($cpf == '00000000000' ||
    $cpf == '11111111111' ||
    $cpf == '22222222222' ||
    $cpf == '33333333333' ||
    $cpf == '44444444444' ||
    $cpf == '55555555555' ||
    $cpf == '66666666666' ||
    $cpf == '77777777777' ||
    $cpf == '88888888888' ||
    $cpf == '99999999999') {
        $result = "O CPF <b>" . $cpforiginal . "</b> é <b>inválido</b>";
    }

    return $result;
}
