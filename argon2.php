<?php

$password="admin123";
$hash = "password_hash($password,PASSWORD_ARGON2ID)";

echo $hash.'<br>';

$result = password_verify($password, $hash);

echo $result;
?>