<?php
require __DIR__ . '/vendor/autoload.php';

use ParagonIE\EasyRSA\KeyPair;
use ParagonIE\EasyRSA\EasyRSA;
use phpseclib\Crypt\RSA;


$message = "test";
$publicKey = "-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAyfz+onMDdLTgtdEPnEZA
5Uzb9pWtKxCpYjOUFxTiq/Or5NwQt89JE+x9fcxR2/G+pj4JzEv2Ng1kdl4EoIvK
OqwAoJiFi+msLYOvuGIeWbRoUYB+Ha5/N8OkBTAItJKl3e8vwLt12e7SCOUx812u
Afshl3KQWc5w15QqMPw2imGEK57XHWBwJupSrr9k5PCUSi6gzaSs2azu4HeCR4w9
r4wHPS86gN13FJyjYBctD2eiwFw7XUzZQt3mLrsl3gni0rQe5K5vuf0p0AXtuAr0
juXx4NQMoHTVqB2KMsS6di4CuE25vpvjseAs1AWXGminEpaTUhtGWexqL5twE9vE
L5Pi1xrS1LMxemQXX/0sbmni3Hg6njQWdvv7hQ6xhGTwocFW+kzouO2kQ7Q8kXdN
RTG7/aREJHIQxue8bgVRMhOUPo+etORNv6tOBnzAf9ZYt1WRzOXPIxYbm48dwGc1
jlAEV/nFT9pOZvN4UJDkUYot8sFd4Jp+3yQoI4Rb3vq6EVNkaCf53H7wIJlIa6vU
SPiFTBmACK1SDL5xGRtmvepvOL5olewWx0QMwlTlACF7WuFuF4iycHgzBRikMhRe
q5tjGyIqLu1Luw1FSAql+KrL2YZubZ0rbaze5nFugJcz+y25bFq8ZQFdRgpls40T
PRob1Zvl8PrFB+DjvKdKQqMCAwEAAQ==
-----END PUBLIC KEY-----";
$rsa = new RSA();

$clave = $rsa->setPublicKey($publicKey);


$ciphertext = EasyRSA::encrypt($message, $clave);

//$plaintext = EasyRSA::decrypt($ciphertext, $secretKey);