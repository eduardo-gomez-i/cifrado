<?php
require __DIR__ . '/vendor/autoload.php';

use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Math\BigInteger;

$private = RSA::createKey();
$public = $private->getPublicKey();

$plaintext = "elfoco";
echo '-----------------------';
$ciphertext = $private->getPublicKey()->encrypt($plaintext);
echo '<br><br/>';
echo $private->decrypt($ciphertext);