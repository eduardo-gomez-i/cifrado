<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

use phpseclib3\Crypt\RSA;

use ParagonIE\EasyRSA\KeyPair;
use ParagonIE\EasyRSA\EasyRSA;

$plaintext = $_POST['texto'];
$operacion = $_POST['operacion'];

if ($operacion == 1) {
    echo Codificar($plaintext);
}elseif ($operacion == 2) {
    echo Desifrar($plaintext);
} elseif ($operacion == 3) {
    getClaves();
}else{
    echo "operacion no valida";
}

function getClaves(){
    $keyPair = KeyPair::generateKeyPair(4096);

    $secretKey = $keyPair->getPrivateKey();
    $publicKey = $keyPair->getPublicKey();

    $_SESSION["clavePublica"] = $publicKey;
    $_SESSION["clavePrivada"] = $secretKey;

    $claves = [];
    $claves[0] = accessProtected($secretKey, 'keyMaterial');
    $claves[1] = accessProtected($publicKey, 'keyMaterial');

    echo json_encode($claves);
}

function accessProtected($obj, $prop)
{
    $reflection = new ReflectionClass($obj);
    $property = $reflection->getProperty($prop);
    $property->setAccessible(true);
    return $property->getValue($obj);
}

function Codificar($input)
{
    $publicKey = $_SESSION["clavePublica"];

    $ciphertext = EasyRSA::encrypt($input, $publicKey);

    echo $ciphertext;
}

function Desifrar($input)
{
    $secretKey = $_SESSION['clavePrivada'];
    $plaintext = EasyRSA::decrypt($input, $secretKey);

    echo $plaintext;
}