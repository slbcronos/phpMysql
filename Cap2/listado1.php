<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Listado de Clientes</title>
</head>

<body>
    <header>
        <h1>Listado de Clientes</h1>
       
    </header>
    <section>
        <?php
        //conexion al servidor
        include "conexion.php";

        $rs = "SELECT * FROM cliente where ID_CLIENTE = 'C0001'";
        $resultado = $conexion->query($rs);
        $Registro = $resultado->fetch_assoc();
        ?>

        <table class="table table-bordered" border="2" width="550" cellspacing="0" cellpadding="0">
            <tr>
                <td>Codigo</td>
                <td><?php echo $Registro['ID_CLIENTE']; ?></td>
            </tr>

            <tr>
                <td>Nombre de Cliente</td>
                <td>
                    <?php echo $Registro['NOMBRES'] . ' ' . $Registro['PATERNO'] . ' ' . $Registro['MATERNO']; ?>
                </td>
            </tr>

            <tr>
                <td>Direccion</td>
                <td>
                    <?php echo $Registro['DIRECCION']; ?>
                </td>
            </tr>

            <tr>
                <td>Telefono</td>
                <td>
                    <?php echo $Registro['FONO']; ?>
                </td>
            </tr>

            <tr>
                <td>Codigo de Distrito</td>
                <td>
                    <?php echo $Registro['ID_DISTRITO']; ?>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <?php echo $Registro['EMAIL']; ?>
                </td>
            </tr>



        </table>

    </section>
    <footer>
   
        <h5>Derechos Reservados 2024</h5>
    </footer>
</body>

</html>