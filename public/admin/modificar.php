<?php
session_start();
require "../../src/auxiliar.php";
require "../../src/admin-auxiliar.php";

$id = obtener_post('id');
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];


$pdo = conectar();
$sent = $pdo->prepare("UPDATE articulos
SET codigo = :codigo,
    descripcion = :descripcion,
    precio = :precio
WHERE id = :id");
$sent->execute([
    ':id' => $id,
    ':codigo' => $codigo,
    ':descripcion' => $descripcion,
    ':precio' => $precio
]);

$_SESSION['exito'] = 'El artículo se ha borrado correctamente.';

return volver_admin();
