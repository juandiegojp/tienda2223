DROP TABLE IF EXISTS articulos CASCADE;

CREATE TABLE articulos (
    id bigserial PRIMARY KEY,
    codigo varchar(255) NOT NULL UNIQUE,
    descripcion varchar(255) NOT NULL,
    precio numeric(7, 2) NOT NULL
);

-- CARGA INICIAL DE DATOS DE PRUEBA:
INSERT INTO articulos (codigo, descripcion, precio)
    VALUES ('100', 'YOGUR PIÑA', 200.50), ('202', 'TIGRETÓN', 50.10), ('300', 'DISCO DURO SSD 500 GB', 150.30);

