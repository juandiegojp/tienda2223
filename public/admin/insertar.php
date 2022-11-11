<?php

require "../../src/auxiliar.php";
require "../../src/admin-auxiliar.php";

$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$pdo = conectar();
$pdo->prepare("INSERT INTO articulos VALUES (:codigo, :descripcion, :precio)");


volver_admin();