<?php
session_start();
if (isset($_SESSION['usuario'])) {

    ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>ventas</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>

        <div class="container">
            <div class="clearfix">
                <h1 class="pull-left">Venta de productos</h1>
                <div class="pull-right" style="padding-top: 10px">
                    <span class="btn btn-primary" id="ventaProductosBtn">Vender producto</span>
                    <span class="btn btn-success" id="ventasHechasBtn">Ventas hechas</span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div id="ventaProductos"></div>
                    <div id="ventasHechas"></div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#ventaProductosBtn').click(function() {
                esconderSeccionVenta();
                $('#ventaProductos').load('ventas/ventasDeProductos.php');
                $('#ventaProductos').show();
            });
            $('#ventasHechasBtn').click(function() {
                esconderSeccionVenta();
                $('#ventasHechas').load('ventas/ventasyReportes.php');
                $('#ventasHechas').show();
            });
        });

        function esconderSeccionVenta() {
            $('#ventaProductos').hide();
            $('#ventasHechas').hide();
        }
    </script>

<?php
} else {
    header("location:../index.php");
}
?>