--TEST--
Test mcrypt_encrypt() function : Twofish functionality
--FILE--
<?php

echo "*** Testing mcrypt : Twofish functionality ***\n";

$cipher = MCRYPT_TWOFISH;
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


$iv = b'1234567890123456';
echo "\n--- testing different key lengths\n";

foreach ($keys as $key) {
   echo "\nkey length=".strlen($key)."\n";
   $res = mcrypt_encrypt($cipher, $key, $data, MCRYPT_MODE_CBC, $iv);
   var_dump(bin2hex($res));
   $res = mcrypt_cbc($cipher, $key, $res, MCRYPT_DECRYPT, $iv);
   var_dump(bin2hex($res));
}

$key = b'1234567890123456';
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
*** Testing mcrypt : Twofish functionality ***

--- testing different key lengths

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 0 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

key length=0

Warning: mcrypt_encrypt(): Key of size 0 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 0 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

key length=8

Warning: mcrypt_encrypt(): Key of size 8 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Key of size 8 not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported in %s on line %d
string(0) ""

key length=16
string(128) "1cdb3bae9c325a8bff069b986ce51008a57b8afdae4378c3088f7d912c61919f88437ab67bee57d29dd69024121dd68478500b93882373589df38b2d16dc6a20"

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d
string(128) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e637279707465640000000000000000000000000000"

--- testing different iv lengths

iv length=0

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 0, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 0, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

iv length=0

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 0, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 0, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

iv length=8

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 8, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 8, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

iv length=16

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d
string(128) "1cdb3bae9c325a8bff069b986ce51008a57b8afdae4378c3088f7d912c61919f88437ab67bee57d29dd69024121dd68478500b93882373589df38b2d16dc6a20"
string(128) "546869732069732074686520736563726574206d657373616765207768696368206d75737420626520656e637279707465640000000000000000000000000000"

iv length=17

Deprecated: Function mcrypt_cbc() is deprecated in %s on line %d

Warning: mcrypt_cbc(): Received initialization vector of size 17, but size 16 is required for this encryption mode in %s on line %d
string(0) ""

Warning: mcrypt_decrypt(): Received initialization vector of size 17, but size 16 is required for this encryption mode in %s on line %d
string(0) ""
===DONE===
