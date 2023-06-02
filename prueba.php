<?php
$prefijo = 'db_';
$db = '^basededatos';
$dbname = str_replace('^', $prefijo, $db);
echo $dbname;

$string = '51354 + 123';
$suma = '+';
@ $resultado = str_replace('+', +, $string);
echo $string;
echo $resultado;