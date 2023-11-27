<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cerveza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <h1>Eliminando Cerveza</h1>
        <br>
        <form method="post" action="/beer/delete" enctype="multipart/form-data">
            <input type="hidden" name="nombre" value="<?= $cerveza->nombre ?>">
            <p>¿Estás seguro de que quieres eliminar la cerveza "<?= $cerveza->nombre ?>"?</p>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a class="btn btn-default" href="http://localhost/Cerveza">Cancelar</a>
        </form>
    </div>
</body>

</html>
