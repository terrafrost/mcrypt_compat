--TEST--
Test mcrypt_encrypt() function : DES functionality
--FILE--
<?php

echo "*** Testing mcrypt : DES functionality ***\n";

$cipher = MCRYPT_DES;
$mode = MCRYPT_MODE_CBC;
$data = b'This is the secret message which must be encrypted';

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
   $res = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
   var_dump(bin2hex($res));
   $res = mcrypt_cbc($cipher, $key, $res, MCRYPT_DECRYPT, $iv);
   var_dump(bin2hex($res));
}

$key = b'12345678';
echo "\n--- testing different iv lengths\n";
foreach ($ivs as $iv) {
   echo "\niv length=".strlen($iv)."\n";
   $res = mcrypt_cbc($cipher, $key, $data, $mode, $iv);
   var_dump(bin2hex($res));
   $res = mcrypt_decrypt($cipher, $key, $res, MCRYPT_MODE_CBC, $iv);
   var_dump(bin2hex($res));
}

?>
===DONE===
--EXPECTF--
*** Testing mcrypt : DES functionality ***

--- testing different key lengths

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 0 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 0 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

key length=8
string(112) "082b437d039d09418e20dc9de1dafa7ed6da5c6335b78950968441da1faf40c1f886e04da8ca177b80b376811e138c1bf51cb48dae2e7939"

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d
string(112) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564000000000000"

key length=16

Warning: mcrypt_encrypt(): Key of size 16 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 16 not supported by this algorithm. Only keys of size 8 supported in %s on line %d
string(0) ""

--- testing different iv lengths

iv length=0

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 0, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 0, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

iv length=0

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 0, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 0, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

iv length=8

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d
string(112) "082b437d039d09418e20dc9de1dafa7ed6da5c6335b78950968441da1faf40c1f886e04da8ca177b80b376811e138c1bf51cb48dae2e7939"
string(112) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e63727970746564000000000000"

iv length=16

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 16, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 16, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

iv length=17

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 17, but size 8 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 17, but size 8 is required for this encryption mode in %s on line %d
string(0) ""
===DONE===
