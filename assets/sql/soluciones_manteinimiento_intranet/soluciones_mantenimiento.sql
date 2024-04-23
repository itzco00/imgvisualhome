1-2
1-3
1-11
2-4
2-5
2-13
4-2
4-12
5-2
5-4
5-5
5-6
6-7
7-7
7-8
7-9
13-2
13-14



insert into alka.rel_status_reporte_historial (status_actual, descripcion, status_cambia)
values
('1', 'Se genera orden de mantenimiento', '2'),
('1', 'Rechaza orden de mantenimiento', '3'),
('1', 'Se rechaza orden de mantenimiento', '3'),
('1', 'Cancela orden de mantenimiento', '11'),
('2', 'Manda a tienda la orden de mantenimiento', '4'),
('2', 'Manda a compras la orden de mantenimiento', '5'),
('2', 'Manda a KI la orden de mantenimiento', '13'),
('4', 'Regreso la solicitud a generado desde local', '2'),
('4', 'Se indica que fue atendida localmente la solicitud', '12'),
('5', 'Regreso la solicitud a generado desde cotizacion', '2'),
('5', 'Manda a tienda la orden de mantenimiento desde cotizacion', '4'),
('5', 'Manda datos de cotización menores a 50,000 pesos en orden de mantenimiento', '5'),
('5', 'Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento', '5'),
('5', 'Pide validación de la orden de mantenimiento', '5'),
('5', 'Autoriza orden de mantenimiento', '6'),
('6', 'Programa la orden de mantenimiento', '7'),
('7', 'Ingresa fecha de atención a la orden de mantenimiento', '7'),
('7', 'Acepta la orden de mantenimiento', '8'),
('7', 'No acepta la orden de mantenimiento', '9'),
('13', 'Regreso la solicitud a Ggenerado desde garantia KI', '2'),
('13', 'Se indica que fue atendida por KI la solicitud', '14')











select * from alka.historial
select * from alka.rel_status_reporte_historial
select * from alka.estatus_reportes_mantenimiento
insert into alka.rel_status_reporte_historial (status_actual, descripcion, status_cambia) values ('1', 'Aprueba orden de mantenimiento', '2')




UPDATE alka.historial
SET status_actual = 7, status_cambia = 9
WHERE detalles LIKE '%No acepta la orden de mantenimiento%';

UPDATE alka.historial
SET status_actual = 1, status_cambia = 2
WHERE detalles LIKE '%Aprueba orden de mantenimiento%'


SELECT * FROM alka.historial ORDER BY detalles


SELECT * FROM alka.historial
WHERE detalles LIKE '%Acepta la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%No acepta la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Aprueba orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Autoriza orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Cancela orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Ingresa fecha de atención a la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Manda a compras la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Manda a KI la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Manda a tienda la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Manda datos de cotización%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%aprobada automáticamente por sistema%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Pide validación de la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Programa la orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Rechaza orden de mantenimiento%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Regreso la solicitud a generado%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Se indica que fue atendida localmente la solicitud%'
order by detalles

SELECT * FROM alka.historial
WHERE detalles LIKE '%Se indica que fue atendida por KI la solicitud%'
order by detalles






SELECT * FROM alka.historial ORDER BY detalles


UPDATE alka.historial
SET id_ticket = SUBSTRING(detalles,
                          LOCATE('Rechaza orden de mantenimiento', detalles)
                          + LENGTH('Rechaza orden de mantenimiento') + 1)
WHERE detalles LIKE '%Rechaza orden de mantenimiento%';






SELECT *,
       SUBSTRING(detalles, 
                 LOCATE('Rechaza orden de mantenimiento', detalles) 
                 + LENGTH('Rechaza orden de mantenimiento') + 1) 
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Rechaza orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Acepta la orden de mantenimiento', detalles)
                 + LENGTH('Acepta la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Acepta la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Aprueba orden de mantenimiento', detalles)
                 + LENGTH('Aprueba orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Aprueba orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Autoriza orden de mantenimiento', detalles)
                 + LENGTH('Autoriza orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Autoriza orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Cancela orden de mantenimiento', detalles)
                 + LENGTH('Cancela orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Cancela orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Ingresa fecha de atención a la orden de mantenimiento', detalles)
                 + LENGTH('Ingresa fecha de atención a la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Ingresa fecha de atención a la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Manda a compras la orden de mantenimiento', detalles)
                 + LENGTH('Manda a compras la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Manda a compras la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Manda a KI la orden de mantenimiento', detalles)
                 + LENGTH('Manda a KI la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Manda a KI la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Manda a tienda la orden de mantenimiento', detalles)
                 + LENGTH('Manda a tienda la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Manda a tienda la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento', detalles)
                 + LENGTH('Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento%'
ORDER BY detalles;


UPDATE alka.historial
SET id_ticket = SUBSTRING(detalles,
                          LOCATE('Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento', detalles)
                          + LENGTH('Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento'))
WHERE detalles LIKE '%Manda datos de cotización mayores a 50,000 pesos en orden de mantenimiento%';



SELECT *,
       SUBSTRING(detalles,
                 LOCATE('por sistema', detalles)
                 + LENGTH('por sistema') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%por sistema%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Pide validación de la orden de mantenimiento', detalles)
                 + LENGTH('Pide validación de la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Pide validación de la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Programa la orden de mantenimiento', detalles)
                 + LENGTH('Programa la orden de mantenimiento') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Programa la orden de mantenimiento%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Regreso la solicitud a generado', detalles)
                 + LENGTH('Regreso la solicitud a generado') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Regreso la solicitud a generado%'
ORDER BY detalles;


SELECT *,
       SUBSTRING(detalles,
                 LOCATE('Se indica que fue atendida localmente la solicitud', detalles)
                 + LENGTH('Se indica que fue atendida localmente la solicitud') + 1)
       AS informacion_adicional
FROM alka.historial
WHERE detalles LIKE '%Se indica que fue atendida localmente la solicitud%'
ORDER BY detalles;