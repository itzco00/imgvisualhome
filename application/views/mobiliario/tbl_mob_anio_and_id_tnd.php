<tr>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->numerodetienda; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->nombre; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->año; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->construccion; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->local; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->deptos; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->m2pisoventa; ?></th>
    <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $tiendas[0]->m2bodega; ?></th>
    <?php foreach ($resultados as $row) { ?>
        <th style="border: 1px solid black; padding: 8px; text-align: center; color: black;"><?php echo $row['suma_piezas']; ?></th>
    <?php } ?>
</tr>