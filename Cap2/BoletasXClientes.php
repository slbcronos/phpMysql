<!-- Pagina 97 del libro -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Boletas por Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    error_reporting(0);
    include "conexion.php";
    include "captura2.php";

    ?>
    <div class="container">
        <header>
            <h3>
                <center>Listado de Boletas por Cliente</center>
            </h3>

            <img src="clientes.jpg" class="img-fluid" alt="...">
            <br />
        </header>

        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table class="table table-bordered border-primary">
                    <tr>
                        <td>INGRESE EL CODIGO DEL CLIENTE</td>
                        <td> <input type="text" name="txtCodigo" maxlength="5" value="<?php echo getCodigo(); ?>"></td>
                        <td><input type="submit" value="CONSULTAR"></td>
                    </tr>
                </table>
            </form>
            <table class="table table-bordered border-primary">
                <tr>
                    <th>NO BOLETA</th>
                    <th>FECHA</th>
                    <th>CODIGO DE CLIENTE</th>
                    <th>NOMBRE DEL CLIENTE</th>
                    <th>SUBTOTAL</th>
                </tr>
                <?php
                $codigo = getCodigo();
                $sql1 = "SELECT B.NUM_BOLETA,B.FECHA,C.ID_CLIENTE,
                CONCAT(C.NOMBRES,' ',C.PATERNO,' ',C.MATERNO) AS NOMBRES,
                SUM(P.PRECIO*D.CANTIDAD)
	          FROM CLIENTE C
	          INNER JOIN BOLETA B ON C.ID_CLIENTE = B.ID_CLIENTE
	          INNER JOIN DETALLEBOLETA D ON D.NUM_BOLETA = B.NUM_BOLETA
	          INNER JOIN PRODUCTO P ON P.ID_PRODUCTO = D.ID_PRODUCTO
	          GROUP BY B.NUM_BOLETA,B.FECHA,C.ID_CLIENTE,
                         CONCAT(C.NOMBRES,' ',C.PATERNO,' ',C.MATERNO) AS NOMBRES,
	          HAVING C.ID_CLIENTE='$codigo'";

                //$rs = mysqli_query($sql1,$conexion);
                $resultado = $conexion->query($sql1);
                $Registro = $resultado->fetch_assoc();

            ?>

<?php foreach ( $resultado as $row ) { ?>
    
    <tr>  
        <td><?php echo $row['NUM_BOLETA']; ?></td>
        <td><?php echo $row['FECHA']; ?></td>
        <td><?php echo $row['ID_CLIENTE']; ?></td>
        <td><?php echo $row['NOMBRES']; ?></td>
        <td><?php echo $row['SUM(P.PRECIO*D.CANTIDAD)']; ?></td>

        
    </tr>

<?php } ?>

            </table>
        </section>


    </div>


</body>

</html>