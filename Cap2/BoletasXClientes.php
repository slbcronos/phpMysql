<!-- Pagina 97 del libro -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Boletas por Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    error_reporting(0);
    include "conexion.php";
    include "captura2.php";

    ?>
    <div class="container">
        <header>
            <h3><center>Listado de Boletas por Cliente</center></h3>

            <img src="clientes.jpg" class="img-fluid" alt="...">
        </header>

        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="table table-bordered border-primary" border="0" width="940" cellspacing="0" cellpadding="0">
                <tr>
                    <td>INGRESE EL CODIGO DEL CLIENTE</td>
                    <td><input type="text" name="cod_cliente" size="10" maxlength="5"</td>
                </tr>
            </table>
            
            </form>
        </section>


    </div>


</body>

</html>