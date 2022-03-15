<?php
$texto = $_POST['texto'];
$saltos = $_POST['saltos'];
$operacion = $_POST['operacion'];

if ($operacion == 1) {
    echo Codificar($texto, $saltos);
}elseif ($operacion == 2) {
    echo Desifrar($texto, $saltos);
}else{
    echo "operacion no valida";
}

function Cifrar($ch, $key)
{
    if (!ctype_alpha($ch))
        return $ch;

    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Codificar($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cifrar($ch, $key);

    return $output;
}

function Desifrar($input, $key)
{
    return Codificar($input, 26 - $key);
}