<?php

require "../../src/auxiliar.php";
require "../../src/admin-auxiliar.php";

$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$pdo = conectar();
$sent = $pdo->prepare("INSERT INTO articulos (codigo, descripcion, precio) VALUES (:codigo, :descripcion, :precio)");
$sent->execute([
    ':codigo' => $codigo,
    ':descripcion' => $descripcion,
    ':precio' => $precio
]);


volver_admin();