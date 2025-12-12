<?php
$hash = password_hash("algo", PASSWORD_BCRYPT);
echo "$hash";

$hash2 = password_hash("algo", PASSWORD_BCRYPT);

$o = password_verify("algo", $hash);
echo "<br>";
echo "$o";
echo "<br>";
echo "$hash2"
?>