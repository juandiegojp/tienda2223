# LUNES 14/11/22

* Abrir php desde la carpeta public. Comprobar las rutas.
* En principio, ya debería de funcionar.
* Crear carrito y tal.
* Clase Articulo.

# MARTES 15/11
* Crear las descripciones en el carrito.
* Borrado de los require innecesarios y el fichero admin-auxiliar.php

# JUEVES 17/11
npx tailwindcss -i ./src/input.css -o ./public/css/output.css --watch
* password_hash
* sudo -u postgres psql template1 (PLANTILLAS DE SQL)
* alter database template1 refresh collation version ; (si muestra un warning, este comando hace que desaparezca.)
* create extension pgcryto (añade la extension cryto)
* select crypt('pepe', gen_salt('bf', 10)); 

<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

Necesario para casa porque a veces no me funciona igual que en el cole.


# VIERNES 25 DE NOVIEMBRE

* Generar pdf. Dentro de las opciones del ususario, donde está el dashboard, crear un apartado que sea facturas o pedidos... y que genere,
  con un botón, una factura. 
* CRUD ADMIN. El admin puede insertar, eliminar y modificar los usuarios.


# LUNES 28 DE NOVIEMBRE

Solución al problema con el código de mi amigo Ricpelo:
* composer install
* añadir y actualizar todo lo que tiene en su repositorio
* npm install
* composer dump-autoload


# MARTES 29 DE NOVIEMBRE
* Registro terminado.
* Require carbono composer
* 