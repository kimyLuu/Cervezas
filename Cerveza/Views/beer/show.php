<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de la cerveza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <h1>Detalle de la cerveza</h1>
        <br>
        <div class="container">
            <?php if ($cerveza): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Graduacion Alcoholica</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $cerveza->nombre ?></td>
                            <td><?= $cerveza->tipo ?></td>
                            <td><?= $cerveza->graduacionAlcoholica ?></td>
                            <td><?= $cerveza->pais ?></td>
                            <td><?= $cerveza->precio ?></td>
                            <td><img height="100px" src="data:image/png;base64 ,<?php echo base64_encode($cerveza->rutaImagen) ?>" alt="cerveza"></td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-info" href="http://localhost/Cerveza">Volver</a>
            <?php else: ?>
                <p>La cerveza no se encontró o hubo un problema al recuperarla.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
