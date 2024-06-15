<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Clientes X Distrito</title>
</head>

<body>
    <header>
        <div class="card mb-3">
            <img src="clientes.jpg" class="card-img-top" alt="...">
            <div class="card-body">

            </div>
    </header>

    <section>
        <?php
        error_reporting(0);
        include "conexion.php";
        include "captura.php";

        ?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
            <table class="table table-success table-striped" border="0" width="500" cellspacing="1" celppading="1">
                <tr>
                    <td><strong>Seleccione Distrito</strong></td>
                    <td><select name="selDistrito">
                            <?php
                            $rs = "SELECT DISTINCT C.ID_DISTRITO,D.DESCRIPCION FROM CLIENTE C INNER JOIN DISTRITO D ON C.ID_DISTRITO = D.ID_DISTRITO";
                            $resultado = $conexion->query($rs);
                            $Registro = $resultado->fetch_assoc();

                            $totalRegistros = mysqli_num_rows($resultado);

                            foreach ($resultado as $row) {
                                $codigo = $row['ID_DISTRITO'];
                                $distrito = $row['DESCRIPCION'];
                                echo "<option value='$codigo'>$distrito</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="submit" class="btn btn-primary" name="btnListar" value="LISTAR DISTRITO"></td>
                </tr>
            </table>

            <?php
            $codigo = getDistrito();
            $consulta = "SELECT DESCRIPCION FROM distrito WHERE ID_DISTRITO = '$codigo'";
            $distrito = $conexion->query($consulta);

            // implementando la consulta
            $sql = "SELECT C.ID_CLIENTE, CONCAT(C.NOMBRES,' ',C.PATERNO,' ',C.MATERNO) AS NOMBRES, C.FONO,D.DESCRIPCION FROM CLIENTE C INNER JOIN DISTRITO D ON C.ID_DISTRITO=D.ID_DISTRITO WHERE C.ID_DISTRITO= '$codigo'";
            //realizando la consulta en la base al distrito seleccionado
            $rsC = $conexion->query($sql);
            //determinar le total de clientes
            $total = mysqli_num_rows($rsC);

            ?>

            <p>
                <center><strong>CLIENTES DEL DISTRITO: </strong> <?php echo $distrito->fetch_assoc()['DESCRIPCION']; ?>
                </center>
            </p>



            <table class="table table-bordered border-primary" border="0" width="700" cellspacing="1" cellpadding="1">
                <tr>
                    <td><strong>CODIGO</strong></td>
                    <td><strong>CLIENTE</strong></td>
                    <td><strong>TELEFONO</strong></td>
                    <td><strong>DISTRITO</strong></td>
                </tr>

                <?php
                foreach ($rsC as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['ID_CLIENTE']; ?></td>
                        <td><?php echo $row['NOMBRES']; ?></td>
                        <td><?php echo $row['FONO']; ?></td>
                        <td><?php echo $row['DESCRIPCION']; ?></td>
                    </tr>

                <?php } ?>

            </table>
            <br />

            <h6>Total de Registros: <?php echo $total; ?></h6>

        </form>
    </section>

    <footer>
        <br />
        <h5></h5>
    </footer>

</body>

</html>