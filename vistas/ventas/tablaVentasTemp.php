<?php

session_start();
//print_r($_SESSION['tablaComprasTemp']);
?>

<div class="clearfix">
    <h4 class="pull-left">Hacer venta<br>
        <small><strong>
                <div id="nombreclienteVenta"></div>
            </strong></small>
    </h4>
    <div class="pull-right">
        <span class="btn btn-success" onclick="crearVenta()"> Generar venta
            <span class="glyphicon glyphicon-usd"></span>
        </span>
    </div>
</div>
<table class="table table-bordered table-hover table-condensed" style="text-align: center;">
    <thead>

        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Quitar</th>
        </tr>
    </thead>
    <?php
    $cantidad = 0;
    $total = 0; //esta variable tendra el total de la compra en dinero
    $cliente = ""; //en esta se guarda el nombre del cliente
    if (isset($_SESSION['tablaComprasTemp'])) :
        $i = 0;
        foreach (@$_SESSION['tablaComprasTemp'] as $key) {

            $d = explode("||", @$key);
            ?>

            <tr>
                <td><?php echo $d[1] ?></td>
                <td><?php echo $d[2] ?></td>
                <td><?php echo $d[3] ?></td>
                <td><?php echo 1; ?></td>
                <td>
                    <span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
                        <span class="glyphicon glyphicon-remove"></span>
                    </span>
                </td>
            </tr>

            <?php
            $cantidad += 1;
            $total += floatval($d[3]);
            $i++;
            $cliente = $d[4];
        }
    endif;
    ?>
    <tbody>
        <tr>
            <th colspan="2">Total de venta: </th>
            <td><?php echo "$" . $total; ?></td>
            <td><?php echo $cantidad ?></td>
            <td></td>
        </tr>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        nombre = "<?php echo @$cliente ?>";
        $('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
    });
</script>