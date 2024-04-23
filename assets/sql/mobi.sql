select
    a.id as id_prod,
    a.nombre as nom_prod,
    b.nombre as nom_tnd,
    COALESCE(
        CASE
            WHEN SUM(c.pieza) - FLOOR(SUM(c.pieza)) = 0 THEN TRIM(
                TRAILING '.00'
                FROM
                    CAST(SUM(c.pieza) AS DECIMAL(10, 2))
            )
            ELSE ROUND(SUM(c.pieza), 2)
        END,
        '0'
    ) AS suma_piezas,
    COALESCE(c.tienda, 'SIN ORDEN') as nom_tnd_dt
from
    productos a
    cross join tienda b
    left join detallecompras c on a.id = c.idprincipalproducto2
    and b.id = c.idtienda
where
    b.id in (1, 614, 594, 592, 605)
GROUP BY
    b.nombre,
    a.nombre,
    a.departamentos,
    a.subdepartamentos
order by
    b.id,
    CASE
        a.departamentos
        WHEN 'entrada' THEN 1
        WHEN 'dama y caballero' THEN 2
        WHEN 'mujer hombre jr' THEN 3
        WHEN 'interior mujer' THEN 4
        WHEN 'infantil niño y niña' THEN 5
        WHEN 'toddler niño niña y bebes' THEN 6
        WHEN 'herrajes' THEN 7
        WHEN 'probadores' THEN 8
        WHEN 'paneles' THEN 9
        WHEN 'extras' THEN 10
        WHEN 'imagen' THEN 11
        WHEN 'otros' THEN 12
        ELSE 13
    END,
    CASE
        a.subdepartamentos
        WHEN 'no aplica' THEN 1
        WHEN 'mobiliario de piso' THEN 2
        WHEN 'mobiliario perimetral' THEN 3
        WHEN 'mobiliario perimetro jeans' THEN 4
        WHEN 'mobiliario perimetro licencias' THEN 5
        WHEN 'herraje' THEN 6
        WHEN 'pop' THEN 7
        WHEN 'maniquis' THEN 8
        ELSE 9
    END,
    a.id
    /*------------------------------------------*/
select
    distinct idtienda
from
    detallecompras (1, 614, 594, 592, 605)