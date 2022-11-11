<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/output.css" rel="stylesheet">
    <title>Tienda</title>
</head>

<body>
    <?php
    /**
     * En primer lugar, he empezado por mostrar los datos de la tabla artículos
     * y he continuado por las validaciones de los input al hacer las búsquedas.
     * 
     * He usado los if(isset) en la parte del $pdo para hacer más funcional la
     * parte de los criterios de búsqueda. Se ha añadido a auxiliar.php las 
     * funciones obtener_get.
     * 
     * Al ser un varchar en el .sql, no tiene sentido compararlos. Entonces se
     * usado la misma técnica que en la descripción para hacer la búsqueda.
     * Es decir, una búsqueda que contenga el código que se le introcude.
     * 
     * Hacer la función borrar.
     * 
     */
    require '../src/auxiliar.php';

    $hasta_codigo = obtener_get('hasta_codigo');
    $descripcion = obtener_get('descripcion');


    $pdo = conectar();
    $pdo->beginTransaction();
    $pdo->exec('LOCK TABLE articulos IN SHARE MODE');
    $where = [];
    $execute = [];
    if (isset($hasta_codigo) && $hasta_codigo != '') {
        $where[] = 'codigo LIKE :hasta_codigo';
        $execute[':hasta_codigo'] = "%$hasta_codigo%";
    }
    if (isset($descripcion) && $descripcion != '') {
        $where[] = 'lower(descripcion) LIKE lower(:descripcion)';
        $execute[':descripcion'] = "%$descripcion%";
    }
    $where = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
    $sent = $pdo->prepare("SELECT COUNT(*) FROM articulos $where");
    $sent->execute($execute);
    $total = $sent->fetchColumn();
    $sent = $pdo->prepare("SELECT * FROM articulos $where ORDER BY codigo");
    $sent->execute($execute);
    $pdo->commit();
    ?>
    <div>
        <form action="" method="get">
            <fieldset>
                <legend>Criterios de búsqueda</legend>
                <p>
                    <label>
                        Código:
                        <input type="text" name="hasta_codigo" size="8" value="<?= hh($hasta_codigo) ?>">
                    </label>
                </p>
                <p>
                    <label>
                        Descripcion:
                        <input type="text" name="descripcion" value="<?= hh($descripcion) ?>">
                    </label>
                </p>
                <button type="submit">Buscar</button>
            </fieldset>
        </form>
    </div>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <tr>
                    <th scope="col" class="py-3 px-6">Código</th>
                    <th scope="col" class="py-3 px-6">Descripcion</th>
                    <th scope="col" class="py-3 px-6">Precio</th>
                    <th scope="col" class="py-3 px-6 col-span-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6"><?= hh($fila['codigo']) ?></td>
                        <td class="py-4 px-6"><?= hh($fila['descripcion']) ?></td>
                        <td class="py-4 px-6"><?= hh($fila['precio']) ?></td>
                        <td class="py-4 px-6"><a href="confirmar_borrado.php?id=<?= hh($fila['id']) ?>">Borrar</a></td>
                        <td class="py-4 px-6"><a href="modificar.php?id=<?= hh($fila['id']) ?>">Modificar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <p>Número total de filas: <?= hh($total) ?></p>
    </div>
    <script src="js/flowbite.js"></script>
</body>

</html>