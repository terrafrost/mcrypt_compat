--TEST--
Test mcrypt_encrypt() function : RC2 functionality
--FILE--
<?php

echo "*** Testing mcrypt : RC4 functionality ***\n";

$cipher = MCRYPT_ARCFOUR;
$mode = MCRYPT_MODE_STREAM;
$data = b'This is the secret message which must be encrypted';

// Test wrong mode opening.
mcrypt_encrypt($cipher, '12345678', $data, MCRYPT_MODE_CBC);

// keys up to 128 bits (16 bytes)
$keys = array(
   null,
   '',
   b'12345678',
   b'1234567890123456'
);
$ivs = array(
   null,
   '',
   b'12345678',
   b'1234567890123456',
   b'12345678901234567'
);


$iv = b'12345678';
echo "\n--- testing different key lengths\n";

foreach ($keys as $key) {
   echo "\nkey length=".strlen($key)."\n";
   $res = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_STREAM, $iv);
   var_dump(bin2hex($res));
   $res = mcrypt_decrypt($cipher, $key, $res, MCRYPT_MODE_STREAM, $iv);
   var_dump(bin2hex($res));
}

$key = b'1234567890123456';
echo "\n--- testing different iv lengths\n";
foreach ($ivs as $iv) {
   echo "\niv length=".strlen($iv)."\n";
   $res = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_STREAM, $iv);
   var_dump(bin2hex($res));
   $res = mcrypt_decrypt($cipher, $key, $res, MCRYPT_MODE_STREAM, $iv);
   var_dump(bin2hex($res));
}


?>
===DONE===
--EXPECTF--
*** Testing mcrypt : RC4 functionality ***

Warning: mcrypt_encrypt(): Module initialization failed in %s on line %d

--- testing different key lengths

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of size 1 to 256 supported in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Key of size 0 not supported by this algorithm. Only keys of size 1 to 256 supported in %s on line %d
string(0) ""

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of size 1 to 256 supported in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Key of size 0 not supported by this algorithm. Only keys of size 1 to 256 supported in %s on line %d
string(0) ""

key length=8
string(100) "ef9b50a729d8ad87845b6fefd5586bd717eabd24ac1b0ed43e7ef5c031c4800699ea0f15e4217589e0fd05b874789198a1b7"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

key length=16
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

--- testing different iv lengths

iv length=0
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

iv length=0
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

iv length=8
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

iv length=16
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"

iv length=17
string(100) "74d8fac2048cbfa967a97ac4fb91bc8bc07e1b1e8aadbce73302d4d688fd092ac6fafedb29a00a969d0c433fd062a72c6653"
string(100) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564"
===DONE===
