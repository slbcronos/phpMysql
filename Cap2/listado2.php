<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Listado 2</title>

</head>

<body>
    <header>
        <img src="clientes.jpg" width="1080" height="250" alt="">
        <h1>Listado de Clientes</h1>
    </header>
    <section>
        <?php
        //conexion al servidor
        include "conexion.php";

        //consulta al servidor
        $rs = "SELECT * FROM cliente";
        $resultado = $conexion->query($rs);
        $Registro = $resultado->fetch_assoc();

        //determinar el total de clientes
        $totalRegistros = mysqli_num_rows($resultado);
        //echo "Registros: " . $totalRegistros;
        ?>

        <table class="table table-bordered border-primary" border="0" width="940" cellspacing="0" cellpadding="0">
            <tr>
                <td><strong>CODIGO</strong></td>
                <td><strong>CLIENTE</strong></td>
                <td><strong>DIRECCION</strong></td>
                <td><strong>TELEFONO</strong></td>
                <td><strong>DISTRITO</strong></td>
                <td><strong>EMAIL</strong></td>
            </tr>

            <?php foreach ( $resultado as $row ) { ?>
    
                <tr>           
                    <td><?php echo $row['ID_CLIENTE']; ?></td>
                    <td><?php echo $row['NOMBRES'] . ' ' . $row['PATERNO'] . ' ' . $row['MATERNO']; ?></td>
                    <td><?php echo $row['DIRECCION']; ?></td>
                    <td><?php echo $row['FONO']; ?></td>
                    <td><?php echo $row['ID_DISTRITO']; ?></td>
                    <td><?php echo $row['EMAIL']; ?></td>
                </tr>

            <?php } ?>
            <tr>
                <td>
                    <br />
                   <strong><?php echo "Total de Clientes es: " . $totalRegistros; ?></strong> 
                </td>
            </tr>

        </table>
    </section>
    <footer>

        <h5>Derechos Reservados 2024</h5>
    </footer>

</body>

</html>