<?php
$contraseña_plana = '12345tu';  // Cambia aquí la contraseña que quieres hashear
$hash = password_hash($contraseña_plana, PASSWORD_DEFAULT);
echo $hash;
